<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Mission;
use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Missions where status != published and selected_provider_id is set
        $missions = Mission::where('status', '!=', 'published')
            ->whereNotNull('selected_provider_id')
            ->where(function($q) use ($user) {
                $q->where('requester_id', $user->id)
                  ->orWhere('selected_provider_id', optional($user->serviceProvider)->id);
            })
            ->get();

        // Fetch all conversations for this user (as requester or provider)
        $conversations = Conversation::with('mission')
            ->where('requester_id', $user->id)
            ->orWhereHas('provider', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->latest('last_message_at')
            ->get();

        return view('dashboard.private-msg', compact('conversations', 'user', 'missions'));
    }

    public function list(Request $request)
    {
        $user = Auth::user();
        $conversations = Conversation::with('mission')
            ->where('requester_id', $user->id)
            ->orWhereHas('provider', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->latest('last_message_at')
            ->get();

        return response()->json($conversations);
    }

    public function show(Conversation $conversation)
    {
        $conversation->load(['mission', 'messages.sender']);
        return response()->json($conversation);
    }

    public function messages(Conversation $conversation)
    {
        $messages = $conversation->messages()->with('sender')->orderBy('created_at')->get();
        return response()->json($messages);
    }

    public function sendMessage(Request $request, Conversation $conversation)
    {
        $request->validate(['body' => 'required|string']);
        $user = Auth::user();

        $message = $conversation->messages()->create([
            'sender_id' => $user->id,
            'body' => $request->body,
            'is_read' => false,
        ]);

        $conversation->last_message_at = now();
        $conversation->save();

        // Broadcast event (for real-time)
        broadcast(new \App\Events\MessageSent($message))->toOthers();
        return response()->json($message->load('sender'));
    }

    public function start(Request $request)
    {
        $request->validate([
            'mission_id' => 'required|exists:missions,id',
        ]);
        $user = Auth::user();
        $mission = Mission::findOrFail($request->mission_id);
        $provider = ServiceProvider::findOrFail($mission->selected_provider_id);
        // Only requester or provider can start
        if ($user->id !== $mission->requester_id && $user->id !== $provider->user_id) {
            abort(403);
        }

        $conversation = Conversation::firstOrCreate([
            'mission_id' => $mission->id,
            'requester_id' => $mission->requester_id,
            'provider_id' => $provider->id,
        ]);

        return response()->json($conversation);
    }

    public function status(Conversation $conversation)
    {
        // Example: check if provider is online (using cache or last seen)
        $providerUserId = $conversation->provider->user_id;
        $isOnline = cache()->has('user-is-online-' . $providerUserId);
        return response()->json(['online' => $isOnline]);
    }
}

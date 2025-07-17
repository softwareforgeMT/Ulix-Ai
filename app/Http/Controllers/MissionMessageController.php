<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissionMessage;
use App\Models\Mission;

class MissionMessageController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);
        $mission = Mission::findOrFail($id);

        $msg = MissionMessage::create([
            'mission_id' => $mission->id,
            'user_id' => auth()->id(),
            'message' => $request->message
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Message posted.',
            'data' => [
                'user' => [
                    'name' => $msg->user->name,
                    'profile_photo' => $msg->user->profile_photo ?? null,
                ],
                'message' => $msg->message,
                'created_at' => $msg->created_at->diffForHumans()
            ]
        ]);
    }

    public function list($id)
    {
        $messages = MissionMessage::where('mission_id', $id)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        $data = $messages->map(function($msg) {
            return [
                'user' => [
                    'name' => $msg->user->name,
                    'profile_photo' => $msg->user->profile_photo ?? null,
                ],
                'message' => $msg->message,
                'created_at' => $msg->created_at->diffForHumans()
            ];
        });

        return response()->json(['status' => 'success', 'messages' => $data]);
    }
}

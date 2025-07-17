@extends('admin.dashboard.index')

@section('admin-content')
<h2 class="text-2xl font-bold text-blue-900 mb-6">All Users</h2>
<table class="min-w-full bg-white rounded-xl shadow mb-8">
    <thead>
        <tr>
            <th class="px-4 py-2 text-left text-blue-700">ID</th>
            <th class="px-4 py-2 text-left text-blue-700">Name</th>
            <th class="px-4 py-2 text-left text-blue-700">Email</th>
            <th class="px-4 py-2 text-left text-blue-700">Role</th>
            <th class="px-4 py-2 text-left text-blue-700">Status</th>
            <th class="px-4 py-2 text-left text-blue-700">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $user->id }}</td>
            <td class="px-4 py-2">{{ $user->name }}</td>
            <td class="px-4 py-2">{{ $user->email }}</td>
            <td class="px-4 py-2">{{ $user->user_role }}</td>
            <td class="px-4 py-2">{{ $user->status }}</td>
            <td class="px-4 py-2">
                <form method="POST" action="{{ route('admin.secret-login', $user->id) }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs font-semibold">Secret Login</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{ $users->links() }}
</div>
@if(session('admin_id'))
    <form method="POST" action="{{ route('admin.restore-admin') }}">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded font-semibold mt-4">Return to Admin</button>
    </form>
@endif
@endsection

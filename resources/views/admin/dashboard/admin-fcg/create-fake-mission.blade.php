@extends('admin.dashboard.index')

@section('admin-content')
<div class="max-w-lg mx-auto py-8">
    <h2 class="text-xl font-bold mb-4">Create Fake Mission</h2>
    <form method="POST" action="{{ route('admin.fake-content.create') }}" class="bg-white p-6 rounded shadow space-y-4">
        @csrf
        <input type="hidden" name="type" value="mission">
        <div>
            <label class="block font-semibold mb-1">Requester User ID</label>
            <input name="requester_id" class="border rounded px-3 py-2 w-full" required>
        </div>
        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input name="title" class="border rounded px-3 py-2 w-full">
        </div>
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <input name="description" class="border rounded px-3 py-2 w-full">
        </div>
        <div>
            <label class="block font-semibold mb-1">Country</label>
            <input name="location_country" class="border rounded px-3 py-2 w-full">
        </div>
        <div>
            <label class="block font-semibold mb-1">City</label>
            <input name="location_city" class="border rounded px-3 py-2 w-full">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create</button>
    </form>
</div>
@endsection

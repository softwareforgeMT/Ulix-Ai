@extends('admin.dashboard.index')

@section('admin-content')
<div class="mx-auto py-8 p-2">
    <h2 class="text-xl font-bold mb-4">Create Fake Requester</h2>
    <form id="createFakeRequesterForm" class="bg-white p-6 rounded shadow space-y-4">
        @csrf
        <input type="hidden" name="type" value="requester">
        <div>
            <label class="block font-semibold mb-1">Full Name</label>
            <input name="name" class="border rounded px-3 py-2 w-full" required>
        </div>
        <div>
            <label class="block font-semibold mb-1">Email (optional)</label>
            <input name="email" class="border rounded px-3 py-2 w-full">
        </div>
        <div>
            <label class="block font-semibold mb-1">Gender</label>
            <select name="gender" class="border rounded px-3 py-2 w-full" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create</button>
        <div id="fakeRequesterMsg" class="mt-2 text-sm"></div>
    </form>

    <div class="mt-10">
        <h3 class="text-lg font-semibold mb-3">All Fake Requesters</h3>
        <table class="min-w-full bg-white rounded shadow mb-4">
            <thead>
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Full Name</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">Gender</th>
                    <th class="px-3 py-2">Status</th>
                </tr>
            </thead>
            <tbody id="fakeRequestersTable">
                @foreach(\App\Models\User::where('is_fake', true)->where('user_role', 'service_requester')->get() as $user)
                <tr>
                    <td class="px-3 py-2">{{ $user->id }}</td>
                    <td class="px-3 py-2">{{ $user->name }}</td>
                    <td class="px-3 py-2">{{ $user->email }}</td>
                    <td class="px-3 py-2">{{ $user->gender ?? '-' }}</td>
                    <td class="px-3 py-2">
                        <span class="inline-block px-2 py-1 rounded bg-blue-100 text-blue-800 text-xs font-semibold">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
document.getElementById('createFakeRequesterForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = this;
    const msg = document.getElementById('fakeRequesterMsg');
    msg.textContent = '';
    msg.className = 'mt-2 text-sm';

    fetch("{{ route('admin.fake-content.create') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            type: 'requester',
            name: form.name.value,
            email: form.email.value,
            gender: form.gender.value
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success || data.status === 'success') {
            msg.textContent = 'Fake requester created!';
            msg.classList.add('text-green-600');
            // Add new row to table
            const table = document.getElementById('fakeRequestersTable');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="px-3 py-2">${data.user?.id ?? '-'}</td>
                <td class="px-3 py-2">${form.name.value}</td>
                <td class="px-3 py-2">${form.email.value}</td>
                <td class="px-3 py-2">${form.gender.value}</td>
                <td class="px-3 py-2">
                    <span class="inline-block px-2 py-1 rounded bg-blue-100 text-blue-800 text-xs font-semibold">Active</span>
                </td>
            `;
            table.prepend(row);
            form.reset();
        } else {
            msg.textContent = data.message || 'Failed to create requester.';
            msg.classList.add('text-red-600');
        }
    })
    .catch(() => {
        msg.textContent = 'Failed to create requester.';
        msg.classList.add('text-red-600');
    });
});
</script>
@endsection

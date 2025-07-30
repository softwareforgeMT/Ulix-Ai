<aside class="w-64 bg-white border-r border-gray-200 shadow-lg flex-shrink-0">
    <div class="p-6">
        <h2 class="text-lg font-bold text-blue-700 mb-6">Admin Panel</h2>
        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                <i class="fas fa-home w-5 h-5"></i>
                <span>Dashboard Home</span>
            </a>
            <a href="{{ route('admin.users')}}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.users') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                <i class="fas fa-users w-5 h-5"></i>
                <span>Manage Users</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50">
                <i class="fas fa-briefcase w-5 h-5"></i>
                <span>Service Requests</span>
            </a>

            <a href="{{ route('admin.transactions') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.transactions') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                <i class="fas fa-home w-5 h-5"></i>
                <span>Transactions</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50">
                <i class="fas fa-cogs w-5 h-5"></i>
                <span>Settings</span>
            </a>
        </nav>
    </div>
</aside>
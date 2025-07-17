<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - ULIXAI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Admin Navbar -->
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="/images/headerlogo.png" alt="Logo" class="w-10 h-10 object-contain" />
            <span class="font-bold text-blue-700 text-xl">ULIXAI Admin</span>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded font-semibold">Logout</button>
        </form>
    </nav>
    <!-- Admin Layout with Sidebar -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('admin.dashboard.sidebar')
        <!-- Main Content Area -->
        <main class="flex-1 p-8">
            {{-- Child admin components will load here --}}
            @yield('admin-content')
            {{-- Admin Dashboard Main Content --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                <!-- Commission Settings -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-lg font-bold text-blue-700 mb-4">Commission Settings</h3>
                    <form method="POST" action="{{ route('admin.commission.update') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1">Client-side commission (%)</label>
                            <input type="number" step="0.01" min="0" max="100" name="client_fee" value="{{ config('ulixai.fees.client', 5) }}" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1">Provider-side commission (%)</label>
                            <input type="number" step="0.01" min="0" max="100" name="provider_fee" value="{{ config('ulixai.fees.provider', 15) }}" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-1">Affiliate commission (%)</label>
                            <input type="number" step="0.01" min="0" max="100" name="affiliate_fee" value="{{ config('ulixai.fees.affiliate', 30) }}" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-700">Update Commissions</button>
                    </form>
                </div>
                <!-- Transaction Summary -->
                <div class="bg-white rounded-xl shadow p-6 col-span-2">
                    <h3 class="text-lg font-bold text-blue-700 mb-4">Recent Transactions</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-xs text-left">
                            <thead>
                                <tr>
                                    <th class="px-2 py-2">Date</th>
                                    <th class="px-2 py-2">Mission</th>
                                    <th class="px-2 py-2">Provider</th>
                                    <th class="px-2 py-2">Amount</th>
                                    <th class="px-2 py-2">Client Fee</th>
                                    <th class="px-2 py-2">Provider Fee</th>
                                    <th class="px-2 py-2">Status</th>
                                    <th class="px-2 py-2">Stripe Txn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $txn)
                                <tr class="border-t">
                                    <td class="px-2 py-2">{{ $txn->created_at->format('Y-m-d') }}</td>
                                    <td class="px-2 py-2">{{ $txn->mission->title ?? '-' }}</td>
                                    <td class="px-2 py-2">{{ $txn->provider->first_name ?? '-' }}</td>
                                    <td class="px-2 py-2">{{ number_format($txn->amount_paid, 2) }} €</td>
                                    <td class="px-2 py-2">{{ number_format($txn->client_fee, 2) }} €</td>
                                    <td class="px-2 py-2">{{ number_format($txn->provider_fee, 2) }} €</td>
                                    <td class="px-2 py-2">{{ ucfirst($txn->status) }}</td>
                                    <td class="px-2 py-2">{{ $txn->stripe_session_id }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($transactions->isEmpty())
                            <div class="text-gray-500 text-center py-6">No transactions found.</div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- KYC/Stripe Status Alerts -->
            <div class="bg-white rounded-xl shadow p-6 mb-10">
                <h3 class="text-lg font-bold text-blue-700 mb-4">Provider Stripe/KYC Status</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-xs text-left">
                        <thead>
                            <tr>
                                <th class="px-2 py-2">Provider</th>
                                <th class="px-2 py-2">Email</th>
                                <th class="px-2 py-2">Stripe Account</th>
                                <th class="px-2 py-2">Charges Enabled</th>
                                <th class="px-2 py-2">Payouts Enabled</th>
                                <th class="px-2 py-2">KYC Status</th>
                                <th class="px-2 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($providers as $provider)
                            <tr class="border-t">
                                <td class="px-2 py-2">{{ $provider->first_name }} {{ $provider->last_name }}</td>
                                <td class="px-2 py-2">{{ $provider->email }}</td>
                                <td class="px-2 py-2">{{ $provider->stripe_account_id ?? '-' }}</td>
                                <td class="px-2 py-2">
                                    @if($provider->stripe_charges_enabled)
                                        <span class="text-green-600 font-bold">Yes</span>
                                    @else
                                        <span class="text-red-600 font-bold">No</span>
                                    @endif
                                </td>
                                <td class="px-2 py-2">
                                    @if($provider->stripe_payouts_enabled)
                                        <span class="text-green-600 font-bold">Yes</span>
                                    @else
                                        <span class="text-red-600 font-bold">No</span>
                                    @endif
                                </td>
                                <td class="px-2 py-2">
                                    {{ $provider->kyc_status ?? 'pending' }}
                                </td>
                                <td class="px-2 py-2">
                                    @if(!$provider->stripe_charges_enabled || !$provider->stripe_payouts_enabled)
                                        <form method="POST" action="{{ route('admin.stripe.kyc.remind', $provider->id) }}">
                                            @csrf
                                            <button type="submit" class="bg-yellow-400 text-white px-3 py-1 rounded text-xs">Remind KYC</button>
                                        </form>
                                    @else
                                        <span class="text-green-600 text-xs">OK</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($providers->isEmpty())
                        <div class="text-gray-500 text-center py-6">No providers found.</div>
                    @endif
                </div>
            </div>
            <!-- Affiliate Program Summary -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-bold text-blue-700 mb-4">Affiliate Program</h3>
                <div class="flex flex-col gap-2">
                    <div>Affiliate Rate: <span class="font-semibold">{{ config('ulixai.fees.affiliate', 30) }}%</span></div>
                    <div>Eligibility Period: <span class="font-semibold">30 days</span></div>
                    <div>Affiliate Role: <span class="font-semibold">All</span></div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

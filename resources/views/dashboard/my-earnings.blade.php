@extends('dashboard.layouts.master')

@section('title', 'My Earnings')

@section('content')
@php
    if ($user->user_role === 'service_provider') {
        $missionsEarnings = \App\Models\Mission::with('transactions')
            ->where('selected_provider_id', $user->serviceprovider->id)
            ->where('status', 'completed')
            ->where('payment_status', 'released')
            ->get();

        $totalEarnings = $missionsEarnings->flatMap->transactions->sum('amount_paid');
        $providerEarnings = round($totalEarnings * 0.80, 2); // deduct 20%
    }

    $canWithdraw = ($user->pending_affiliate_balance >= 50) || ($balance['available'] ?? 0) > 50;
@endphp

<div class="flex-1 p-4 sm:p-6 flex flex-col min-h-screen bg-gradient-to-br from-blue-50 to-white">

    <!-- Header Section -->
    <div class="mb-10">
        <div class="text-center mb-8">
            <div class="inline-block">
                <h1 class="text-blue-800 text-3xl md:text-4xl font-bold mb-3">My Earnings Dashboard</h1>
                <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-blue-300 mx-auto rounded-full"></div>
            </div>
            <p class="text-blue-600 mt-4 text-sm md:text-base">Track your financial progress and manage withdrawals</p>
        </div>
    </div>

    <!-- Main Balance Card -->
    <div class="flex justify-center mb-10">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-8 text-center relative overflow-hidden border border-blue-100">
            <!-- Background decoration -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-blue-50 to-transparent rounded-full opacity-60"></div>
            <div class="absolute -top-6 -left-6 w-24 h-24 bg-gradient-to-br from-blue-100 to-transparent rounded-full opacity-40"></div>
            
            <div class="relative z-10">
                <!-- Balance icon -->
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                
                <h2 class="text-blue-700 text-lg font-semibold mb-2">Total Available Balance</h2>
                <div class="text-5xl font-extrabold text-blue-800 mb-2">
                    €{{ number_format(
                        $user->user_role === 'service_provider'
                            ? ($balance['available'] ?? 0.00)
                            : ($user->pending_affiliate_balance ?? 0.00),
                        2
                    ) }}
                </div>
                <div class="text-blue-600 text-sm">Ready for withdrawal</div>
            </div>
        </div>
    </div>

    <!-- Earnings Breakdown Section -->
    <div class="mb-10">
        <div class="flex items-center justify-center mb-8">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
                <h2 class="text-blue-700 text-2xl md:text-2xl font-semibold">Earnings Breakdown</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 max-w-6xl mx-auto">
            <!-- Affiliate Commission Card -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 relative overflow-hidden border border-blue-100 transform hover:-translate-y-1">
                <!-- Background decoration -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-50 to-transparent rounded-bl-full opacity-60"></div>
                
                <!-- Icon -->
                <div class="absolute right-6 top-6 w-14 h-14 bg-gradient-to-br from-green-400 to-green-500 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                
                <div class="pr-20">
                    <div class="mb-4">
                        <h3 class="text-blue-900 font-bold mb-2 text-lg">
                            @if($user->user_role === 'service_provider')
                                Affiliate Commission
                            @else
                                Affiliate Balance
                            @endif
                        </h3>
                        <div class="w-16 h-0.5 bg-gradient-to-r from-green-400 to-green-300"></div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="text-3xl font-bold text-green-700 mb-1">
                            €{{ number_format($user->pending_affiliate_balance, 2) }}
                        </div>
                        <div class="text-green-600 text-sm">
                            @if($user->user_role === 'service_provider')
                                From referrals & commissions
                            @else
                                Total affiliate earnings
                            @endif
                        </div>
                    </div>
                    
                    <!-- Status indicator -->
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 rounded-full {{ $user->pending_affiliate_balance >= 50 ? 'bg-green-400' : 'bg-yellow-400' }}"></div>
                        <span class="text-xs font-medium {{ $user->pending_affiliate_balance >= 50 ? 'text-green-600' : 'text-yellow-600' }}">
                            {{ $user->pending_affiliate_balance >= 50 ? 'Available for withdrawal' : 'Minimum €50 required' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Missions Earnings Card -->
            @if($user->user_role === 'service_provider')
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 relative overflow-hidden border border-blue-100 transform hover:-translate-y-1">
                <!-- Background decoration -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-50 to-transparent rounded-bl-full opacity-60"></div>
                
                <!-- Icon -->
                <div class="absolute right-6 top-6 w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                
                <div class="pr-20">
                    <div class="mb-4">
                        <h3 class="text-blue-900 font-bold mb-2 text-lg">Mission Earnings</h3>
                        <div class="w-16 h-0.5 bg-gradient-to-r from-purple-400 to-purple-300"></div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="text-3xl font-bold text-purple-700 mb-1">
                            €{{ number_format($providerEarnings ?? 0.00, 2) }}
                        </div>
                        <div class="text-purple-600 text-sm">From completed missions</div>
                    </div>
                    
                    <!-- Additional info -->
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 rounded-full bg-purple-400"></div>
                        <span class="text-xs font-medium text-purple-600">
                            {{ $missionsEarnings->count() ?? 0 }} completed missions
                        </span>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Withdrawal Section -->
    <div class="mb-8">
        <div class="flex items-center justify-center mb-6">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h2 class="text-blue-700 text-xl md:text-2xl font-semibold">Withdrawal</h2>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-6 border border-blue-100">
                @if($canWithdraw)
                    <div class="text-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-green-700 font-semibold mb-2">Withdrawal Available</h3>
                        <p class="text-gray-600 text-sm mb-4">You can withdraw your available balance</p>
                    </div>
                    
                    <form method="POST" action="{{ route('affiliate.withdraw') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="withdraw_all_balances" value="true">
                        <button class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                            <span class="flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                <span>Withdraw My Earnings</span>
                            </span>
                        </button>
                    </form>
                @else
                    <div class="text-center">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-gray-600 font-semibold mb-2">Withdrawal Not Available</h3>
                        <p class="text-gray-500 text-sm mb-4">Minimum withdrawal amount is €50</p>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <div class="text-gray-600 text-sm">
                                Current balance: €{{ number_format(
                                    $user->user_role === 'service_provider'
                                        ? ($balance['available'] ?? 0.00)
                                        : ($user->pending_affiliate_balance ?? 0.00),
                                    2
                                ) }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
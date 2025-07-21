<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(Request $request) {
        return view('dashboard.account.my-account');
    }


    public function personalInfo(Request $request) {
        return view('dashboard.account.my-personal-info');
    }


    public function myDocuments(Request $request) {
        return view('dashboard.account.my-documents');
    }


    public function pointCalculation(Request $request) {
        return view('dashboard.account.points-calculation');
    }

    public function uploadPicture(Request $request) {
        return view('dashboard.account.upload-picture');
    }

    public function uploadDocument(Request $request) {
        return view('dashboard.account.upload-document');
    }

    public function affiliationAccounts(Request $request) {
        $user = Auth::user();
        if($user) {
            $affiliates = $user->referrals()->get() ?? [];
            return view('dashboard.my-affiliate-account', compact('affiliates', 'user'));
        }
    }


}

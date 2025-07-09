<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index(Request $request) {
        return view('dashboard.service.service-requests');
    } 

    public function viewServiceRequest(Request $request) {
        return view('dashboard.service.view-request');
    }

    public function ongoingServiceRequest(Request $request) {
        return view('dashboard.service.ongoing-service-requests');
    }
}

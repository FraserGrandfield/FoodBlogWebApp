<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function get()
    {
        $notification = Auth::user()->unreadNotifications;
        return $notification;
    }

    public function read(Request $request)
    {
        Auth::user()->unreadNotifications->find($request->id)->markAsRead();

        return 'success';
    }
}

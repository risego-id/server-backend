<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscribeEmailController extends Controller
{
    /**
     * Auth Login
     * Allowed role CLIENT, CARER 
     */
    public function index()
    {
        return view('subscribe');
    }

    public function postSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Your email is in the list, we will notify you later, thank you!');
    }
}

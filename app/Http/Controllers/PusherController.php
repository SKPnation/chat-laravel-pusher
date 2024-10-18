<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class PusherController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function broadcast(Request $request)
    {
        $message = (string) $request->get('message'); // Provide a default empty string if null

        broadcast(new PusherBroadcast($message))->toOthers();
    
        return view('broadcast', ['message' => $message]);
    }

    public function receive(Request $request)
    {
        return View('receive', ['message' => $request->get('message')]);
    }
}

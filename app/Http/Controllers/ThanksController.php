<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThanksController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        return view('thanks', ['id' => $id]);
    }
}

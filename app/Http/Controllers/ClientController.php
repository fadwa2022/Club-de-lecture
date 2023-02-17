<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function profile()
    {
        // dd(request()->tag);or Request('tag')
        return view('client\profile');
    }

}

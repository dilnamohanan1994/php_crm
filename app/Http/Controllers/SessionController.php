<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success','Logout successfully');
    }
}

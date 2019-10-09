<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function panel(Request $request)
    {
        $user = $request->user();
        return  view('admin.index', compact('user'));
    }
}

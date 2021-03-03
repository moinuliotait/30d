<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsPortalController extends Controller
{


    public function index()
    {
        return view('NewsPortal.index');
    }
}

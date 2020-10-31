<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function index()
    {
        $page_title = __('lang.dialogitemtypename');
        $page_description = 'This is datatables test page';
        $windowId = Str::random(36);

        return view('dashboard.index', compact('page_title', 'page_description', 'windowId'));
    }
    
}

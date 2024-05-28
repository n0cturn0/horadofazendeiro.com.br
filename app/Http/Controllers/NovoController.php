<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NovoController extends Controller
{
    public function index()
    {
        return view('novo.index');
    }
}

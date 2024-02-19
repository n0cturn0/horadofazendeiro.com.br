<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return view('site.index');
    }
    public function logintemp()
    {
        return view('site.registro');
    }
    public function formulario()
    {
        return view('site.formulario');
    }

    public function profiletemp()
    {
        return view('site.profile');
    }
}

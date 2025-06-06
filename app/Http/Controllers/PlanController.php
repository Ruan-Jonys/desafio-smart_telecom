<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        // Retorna a página de planos
        return view('plans.index');
    }
}
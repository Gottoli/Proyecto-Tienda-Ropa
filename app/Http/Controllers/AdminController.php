<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usuarios = User::count();
        $productos = Product::count();

        return view('backend.admin.dashboard', compact('usuarios', 'productos'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    public function index()
    {
        return view('consultas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'email'    => 'required|email|max:150',
            'motivo'   => 'required|string|max:200',
            'consulta' => 'required|string|min:10|max:1000',
        ], [
            'nombre.required'   => 'El nombre es obligatorio.',
            'email.required'    => 'El email es obligatorio.',
            'email.email'       => 'Formato de email inválido.',
            'motivo.required'   => 'El motivo es obligatorio.',
            'consulta.required' => 'La consulta es obligatoria.',
            'consulta.min'      => 'Debe tener al menos 10 caracteres.',
        ]);

        Consulta::create([
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'motivo'   => $request->motivo,
            'consulta' => $request->consulta,
        ]);

        return redirect()->back()->with('success', 'Tu consulta fue enviada correctamente.');
    }
}
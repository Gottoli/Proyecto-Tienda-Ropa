<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;

class NewsletterController extends Controller
{
    public function suscribir(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:150',
        ]);

        NewsletterSubscriber::firstOrCreate(['email' => $request->email]);

        if ($request->wantsJson()) {
            return response()->json(['message' => '¡GRACIAS POR SUSCRIBIRTE!']);
        }

        return redirect()->back()->with('success', 'Te suscribiste correctamente.');
    }
}

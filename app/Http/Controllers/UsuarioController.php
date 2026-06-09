<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarPerfilRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    public function getActualizar(): View
    {
        return view('usuario.actualizar');
    }

    public function postActualizar(ActualizarPerfilRequest $request): RedirectResponse
    {
        $usuario = Auth::user();

        $usuario->name = $request->name;

        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->save();

        return redirect('/')
            ->with('correcto', 'Su perfil ha sido actualizado correctamente');
    }
}
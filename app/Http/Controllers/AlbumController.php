<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index()
    {
        $albumes = Album::where('user_id', Auth::id())->get();

        return view('album.index', compact('albumes'));
    }

    public function create()
    {
        return view('album.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable'
        ]);

        Album::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('albumes.index')
            ->with('success', 'Álbum creado correctamente');
    }

    public function edit($id)
    {
        $album = Album::findOrFail($id);

        return view('album.edit', compact('album'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable'
        ]);

        $album = Album::findOrFail($id);

        $album->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('albumes.index')
            ->with('success', 'Álbum actualizado correctamente');
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);

        $album->delete();

        return redirect()->route('albumes.index')
            ->with('success', 'Álbum eliminado correctamente');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;

class FotoController extends Controller
{
    public function index($id)
    {
        $album = Album::findOrFail($id);

        $fotos = Foto::where('album_id', $id)->get();

        return view('album.fotos', compact('album', 'fotos'));
    }
}
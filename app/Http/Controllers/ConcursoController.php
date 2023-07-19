<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use App\Models\Concurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConcursoController extends Controller
{


    public function index(Postulante $postulante)
    {
        $this->authorize('update', $postulante);

        $concursos = $postulante->concursos;

        return view('concursos.index', compact('postulante', 'concursos'));
    }


    public function create(Postulante $postulante)
    {
        $this->authorize('update', $postulante);

        return view('concursos.create', compact('postulante'));
    }

    public function store(Request $request, Postulante $postulante)
    {
        $this->authorize('update', $postulante);

        $request->validate([
            'expediente' => 'required|string|max:255',
            'caratula' => 'required|string|max:255',
        ]);

        $concurso = new Concurso([
            'expediente' => $request->expediente,
            'caratula' => $request->caratula,
            'postulante_id' => $postulante->id,
        ]);

        $concurso->save();

        return redirect()->route('postulantes.show', $postulante->id)->with('success', 'Concurso creado exitosamente.');
    }

    public function edit(Postulante $postulante, Concurso $concurso)
    {
        $this->authorize('update', $postulante);

        return view('concursos.edit', compact('postulante', 'concurso'));
    }

    public function update(Request $request, Postulante $postulante, Concurso $concurso)
    {
        $this->authorize('update', $postulante);

        $request->validate([
            'expediente' => 'required|string|max:255',
            'caratula' => 'required|string|max:255',
        ]);

        $concurso->update([
            'expediente' => $request->expediente,
            'caratula' => $request->caratula,
        ]);

        return redirect()->route('postulantes.show', $postulante->id)->with('success', 'Concurso actualizado exitosamente.');
    }

    public function destroy(Postulante $postulante, Concurso $concurso)
    {
        $this->authorize('update', $postulante);

        $concurso->delete();

        return redirect()->route('postulantes.show', $postulante->id)->with('success', 'Concurso eliminado exitosamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostulanteController extends Controller
{
    public function index()
    {
        $postulantes = Auth::user()->postulantes;
        $postulantes = Postulante::with('concursos')->get();
        return view('postulantes.index')->with('postulantes',$postulantes);
    }

    public function create()
    {
        return view('postulantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'apellido' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:15',
            'fecha_matricula' => 'required|date',
            'domicilio' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);

        $request['user_id'] = Auth::id();

        // dd($request);

        $postulante = new Postulante([
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
            'dni' => $request->dni,
            'fecha_matricula' => $request->fecha_matricula,
            'domicilio' => $request->domicilio,
            'user_id' => $request->user_id
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('postulantes');
            $postulante->foto = $path;
        }

        $postulante->save();

        return redirect()->route('postulantes.index')->with('success', 'Postulante creado exitosamente.');
    }

    public function show(Postulante $postulante)
    {
        $this->authorize('view', $postulante);

        return view('postulantes.show', compact('postulante'));
    }

    public function edit(Postulante $postulante)
    {
        $this->authorize('update', $postulante);

        return view('postulantes.edit', compact('postulante'));
    }

    public function update(Request $request, Postulante $postulante)
    {
        $this->authorize('update', $postulante);

        $request->validate([
            'apellido' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:15',
            'fecha_matricula' => 'required|date',
            'domicilio' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $postulante->update([
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
            'dni' => $request->dni,
            'fecha_matricula' => $request->fecha_matricula,
            'domicilio' => $request->domicilio,
        ]);

        if ($request->hasFile('foto')) {
            if ($postulante->foto) {
                Storage::delete($postulante->foto);
            }
            $path = $request->file('foto')->store('postulantes');
            $postulante->foto = $path;
            $postulante->save();
        }

        return redirect()->route('postulantes.show', $postulante->id)->with('success', 'Postulante actualizado exitosamente.');
    }

    public function destroy(Postulante $postulante)
    {
        $this->authorize('delete', $postulante);

        if ($postulante->foto) {
            Storage::delete($postulante->foto);
        }

        $postulante->delete();

        return redirect()->route('postulantes.index')->with('success', 'Postulante eliminado exitosamente.');
    }
}

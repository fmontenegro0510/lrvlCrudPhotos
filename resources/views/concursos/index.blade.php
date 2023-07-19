@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Concursos del Postulante</h1>

        <a href="{{ route('concursos.create', $postulante->id) }}" class="btn btn-primary mb-3">Crear Concurso</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número de Expediente</th>
                    <th>Carátula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($postulante->concursos as $concurso)
                    <tr>
                        <td>{{ $concurso->id }}</td>
                        <td>{{ $concurso->expediente }}</td>
                        <td>{{ $concurso->caratula }}</td>
                        <td>
                            <a href="{{ route('concursos.show', [$postulante->id, $concurso->id]) }}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{ route('concursos.edit', [$postulante->id, $concurso->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('concursos.destroy', [$postulante->id, $concurso->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este concurso?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Concursos for Postulante {{ $postulante->apellido }}, {{ $postulante->nombre }}</h1>

        <a href="{{ route('concursos.create', $postulante->id) }}" class="btn btn-primary mb-3">Create Concurso</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Expediente</th>
                    <th>Carátula</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($postulante->concursos as $concurso)
                    <tr>
                        <td>{{ $concurso->id }}</td>
                        <td>{{ $concurso->expediente }}</td>
                        <td>{{ $concurso->caratula }}</td>
                        <td>
                            <a href="{{ route('concursos.edit', [$postulante->id, $concurso->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('concursos.destroy', [$postulante->id, $concurso->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

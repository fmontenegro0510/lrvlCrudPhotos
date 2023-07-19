@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Concurso</h1>

        <div class="row">
            <div class="col-md-6">
                <p><strong>Número de Expediente:</strong> {{ $concurso->expediente }}</p>
                <p><strong>Carátula:</strong> {{ $concurso->caratula }}</p>
            </div>
        </div>

        <a href="{{ route('concursos.edit', [$postulante->id, $concurso->id]) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('concursos.destroy', [$postulante->id, $concurso->id]) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este concurso?')">Eliminar</button>
        </form>
    </div>
@endsection

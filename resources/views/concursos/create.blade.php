@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Concurso</h1>

        <form action="{{ route('concursos.store', $postulante->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="expediente" class="form-label">Número de Expediente</label>
                <input type="text" name="expediente" id="expediente" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="caratula" class="form-label">Carátula</label>
                <input type="text" name="caratula" id="caratula" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
@endsection

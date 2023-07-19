@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Concurso</h1>

        <form action="{{ route('concursos.update', [$postulante->id, $concurso->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="expediente" class="form-label">Expediente</label>
                <input type="text" name="expediente" id="expediente" class="form-control" value="{{ $concurso->expediente }}" required>
            </div>

            <div class="mb-3">
                <label for="caratula" class="form-label">Carátula</label>
                <input type="text" name="caratula" id="caratula" class="form-control" value="{{ $concurso->caratula }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

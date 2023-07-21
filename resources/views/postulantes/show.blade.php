@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Postulante</h1>

        <div class="row">
            <div class="col-md-6">
                <p><strong>Apellido:</strong> {{ $postulante->apellido }}</p>
                <p><strong>Nombre:</strong> {{ $postulante->nombre }}</p>
                <p><strong>DNI:</strong> {{ $postulante->dni }}</p>
                <p><strong>Fecha Matrícula:</strong> {{ $postulante->fecha_matricula }}</p>
                <p><strong>Domicilio:</strong> {{ $postulante->domicilio }}</p>
            </div>
            <div class="col-md-6">
                @if ($postulante->foto)
                    <img src="{{ asset('postulantes/' . $postulante->foto) }}" alt="Foto de {{ $postulante->nombre }}" class="img-thumbnail" style="max-height: 200px;">
                @else
                    <p>Sin foto</p>
                @endif
            </div>
        </div>

        <a href="{{ route('postulantes.edit', $postulante->id) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('postulantes.destroy', $postulante->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este postulante?')">Eliminar</button>
        </form>
    </div>
@endsection


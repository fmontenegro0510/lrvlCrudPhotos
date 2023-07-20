@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Postulantes</h1>

        <a href="{{ route('postulantes.create') }}" class="btn btn-primary mb-3">Crear Postulante</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Fecha Matrícula</th>
                    <th>Domicilio</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($postulantes as $postulante)
                    <tr>
                        <td>{{ $postulante->id }}</td>
                        <td>{{ $postulante->apellido }}</td>
                        <td>{{ $postulante->nombre }}</td>
                        <td>{{ $postulante->dni }}</td>
                        <td>{{ $postulante->fecha_matricula }}</td>
                        <td>{{ $postulante->domicilio }}</td>
                        <td>
                            @if ($postulante->foto)
                                <img src="{{ asset('storage/' . $postulante->foto) }}" alt="Foto de {{ $postulante->nombre }}" class="img-thumbnail" style="max-height: 100px;">
                            @else
                                Sin foto
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('postulantes.show', $postulante->id) }}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{ route('postulantes.edit', $postulante->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('postulantes.destroy', $postulante->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este postulante?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

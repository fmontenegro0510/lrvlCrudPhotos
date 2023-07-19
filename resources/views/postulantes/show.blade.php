@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Postulante Details</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>Apellido:</th>
                    <td>{{ $postulante->apellido }}</td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $postulante->nombre }}</td>
                </tr>
                <tr>
                    <th>DNI:</th>
                    <td>{{ $postulante->dni }}</td>
                </tr>
                <tr>
                    <th>Fecha Matrícula:</th>
                    <td>{{ $postulante->fecha_matricula }}</td>@extends('layouts.app')

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
                    <img src="{{ asset('storage/' . $postulante->foto) }}" alt="Foto de {{ $postulante->nombre }}" class="img-thumbnail" style="max-height: 200px;">
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

                </tr>
                <tr>
                    <th>Domicilio:</th>
                    <td>{{ $postulante->domicilio }}</td>
                </tr>
                <tr>
                    <th>Foto:</th>
                    <td>
                        @if ($postulante->foto)
                            <img src="{{ asset($postulante->foto) }}" alt="Foto del postulante">
                        @else
                            No photo available
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('postulantes.edit', $postulante->id) }}" class="btn btn-primary">Edit</a>

        <!-- Otras acciones como eliminar el postulante -->
    </div>
@endsection

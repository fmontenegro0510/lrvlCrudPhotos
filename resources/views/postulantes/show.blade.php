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
                    <td>{{ $postulante->fecha_matricula }}</td>
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

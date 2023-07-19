@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Postulante</h1>

        <form action="{{ route('postulantes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" name="dni" id="dni" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fecha_matricula" class="form-label">Fecha Matrícula</label>
                <input type="date" name="fecha_matricula" id="fecha_matricula" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio</label>
                <input type="text" name="domicilio" id="domicilio" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

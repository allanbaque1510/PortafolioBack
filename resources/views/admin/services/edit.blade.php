@extends('layouts.admin')

@section('title', 'Editar Servicio: ' . $service->name)

@section('content')
    <div class="page-header">
        <h1>Editar Servicio</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Servicios
        </a>
    </div>

    <div class="content-card">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Importante para las actualizaciones --}}

            {{-- Incluye el partial del formulario, pasando la variable $service --}}
            @include('admin.services.form', ['service' => $service])

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-sync-alt"></i> Actualizar Servicio
                </button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-danger">
                    <i class="fas fa-times-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
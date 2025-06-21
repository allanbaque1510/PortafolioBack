@extends('layouts.admin')

@section('title', 'Crear Nuevo Servicio')

@section('content')
    <div class="page-header">
        <h1>Crear Nuevo Servicio</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Servicios
        </a>
    </div>

    <div class="content-card">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Incluye el partial del formulario. No pasamos $service aquí porque no existe aún. --}}
            @include('admin.services.form')

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar Servicio
                </button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-danger">
                    <i class="fas fa-times-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
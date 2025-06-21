@extends('layouts.admin')

@section('title', 'Crear Nuevo Proyecto')

@section('content')
    <div class="page-header">
        <h1>Crear Nuevo Proyecto</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Proyectos
        </a>
    </div>

    <div class="content-card">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('admin.projects.form')

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar Proyecto
                </button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">
                    <i class="fas fa-times-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
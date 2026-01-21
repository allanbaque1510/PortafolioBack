@extends('layouts.admin')

@section('title', 'Editar Proyecto: ' . $project->title)

@section('content')
    <div class="page-header">
        <h1>Editar Proyecto</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Proyectos
        </a>
    </div>

    <div class="content-card">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 

            @include('admin.projects.form', ['project' => $project]) {{-- Pasa la variable $project al partial --}}

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-sync-alt"></i> Actualizar Proyecto
                </button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">
                    <i class="fas fa-times-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
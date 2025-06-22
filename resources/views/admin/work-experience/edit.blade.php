@extends('layouts.admin')

@section('title', 'Editar Experiencia Laboral: ' . $workExperience->job_title . ' en ' . $workExperience->company_name)

@section('content')
    <div class="page-header">
        <h1>Editar Experiencia Laboral</h1>
        <a href="{{ route('admin.work-experience.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Experiencia Laboral
        </a>
    </div>

    <div class="content-card">
        <form action="{{ route('admin.work-experience.update', $workExperience) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Importante para las actualizaciones --}}

            {{-- Incluye el partial del formulario, pasando la variable $workExperience --}}
            @include('admin.work-experience.form', ['workExperience' => $workExperience])

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-sync-alt"></i> Actualizar Experiencia
                </button>
                <a href="{{ route('admin.work-experience.index') }}" class="btn btn-danger">
                    <i class="fas fa-times-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
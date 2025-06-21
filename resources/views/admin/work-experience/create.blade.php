@extends('layouts.admin')

@section('title', 'Añadir Nueva Experiencia Laboral')

@section('content')
    <div class="page-header">
        <h1>Añadir Nueva Experiencia Laboral</h1>
        <a href="{{ route('admin.work-experience.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Experiencia Laboral
        </a>
    </div>

    <div class="content-card">
        <form action="{{ route('admin.work-experience.store') }}" method="POST">
            @csrf

            {{-- Incluye el partial del formulario. No pasamos $workExperience aquí porque no existe aún. --}}
            @include('admin.work-experience.form')

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar Experiencia
                </button>
                <a href="{{ route('admin.work-experience.index') }}" class="btn btn-danger">
                    <i class="fas fa-times-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
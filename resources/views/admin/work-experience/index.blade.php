@extends('layouts.admin')

@section('title', 'Gestionar Experiencia Laboral')

@section('content')
    <div class="page-header">
        <h1>Experiencia Laboral</h1>
        <a href="{{ route('admin.work-experience.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Añadir Nueva Experiencia
        </a>
    </div>

    <div class="content-card">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Empresa</th>
                        <th>Puesto</th>
                        <th>Periodo</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($workExperiences as $experience)
                    <tr>
                        <td>
                                  @if($experience->company_logo)
                                {{-- Asegúrate de que tu storage link esté funcionando: php artisan storage:link --}}
                                <img src="{{ $experience->company_logo }}" alt="{{ $experience->company_name }}" class="table-img">
                            @else
                                <span class="text-muted">No Imagen</span>
                            @endif
                        </td>
                        <td>{{ $experience->company_name }}</td>
                        <td>{{ $experience->position }}</td>
                        <td>
                            {{ $experience->start_date->format('M Y') }} -
                            {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Actual' }}
                        </td>
                        <td>{{ Str::limit($experience->description, 70) }}</td>
                        <td class="actions-column">
                            <a href="{{ route('admin.work-experience.edit', $experience) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.work-experience.destroy', $experience) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar esta experiencia?');">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-briefcase fa-2x text-muted mb-3"></i>
                            <p class="text-muted">No hay experiencia laboral registrada aún.</p>
                            <a href="{{ route('admin.work-experience.create') }}" class="btn btn-primary btn-sm mt-2">
                                <i class="fas fa-plus"></i> Añadir la primera experiencia
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
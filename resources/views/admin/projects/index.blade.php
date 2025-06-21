@extends('layouts.admin')

@section('title', 'Gestionar Proyectos')

@section('content')
    <div class="page-header">
        <h1>Proyectos</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Crear Nuevo Proyecto
        </a>
    </div>

    {{-- Contenedor de la tabla con estilos de card y responsive --}}
    <div class="content-card"> {{-- Usa la clase content-card que ya definimos en admin.blade.php y sus estilos en admin.css --}}
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Imagen Principal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ Str::limit($project->description, 70) }}</td> {{-- Limita la descripción para que no sea muy larga --}}
                        <td>
                            @if($project->image)
                                {{-- Asegúrate de que tu storage link esté funcionando: php artisan storage:link --}}
                                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="table-img">
                            @else
                                <span class="text-muted">No Imagen</span>
                            @endif
                        </td>
                        <td class="actions-column">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar este proyecto?');">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="fas fa-box-open fa-2x text-muted mb-3"></i>
                            <p class="text-muted">No hay proyectos registrados aún.</p>
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm mt-2">
                                <i class="fas fa-plus"></i> Añadir el primer proyecto
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


@endsection

@push('scripts')
    {{-- Scripts específicos para esta vista (opcional) --}}
@endpush
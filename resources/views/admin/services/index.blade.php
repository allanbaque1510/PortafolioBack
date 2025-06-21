@extends('layouts.admin')

@section('title', 'Gestionar Servicios')

@section('content')
    <div class="page-header">
        <h1>Servicios</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Crear Nuevo Servicio
        </a>
    </div>

    <div class="content-card">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ Str::limit($service->description, 70) }}</td>
                        <td>
                            @if($service->image)
                                {{-- Asegúrate de que tu storage link esté funcionando: php artisan storage:link --}}
                                <img src="{{ $service->image }}" alt="{{ $service->title }}" class="table-img">
                            @else
                                <span class="text-muted">No Imagen</span>
                            @endif
                        </td>
                        <td class="actions-column">
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar este servicio?');">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="fas fa-tools fa-2x text-muted mb-3"></i>
                            <p class="text-muted">No hay servicios registrados aún.</p>
                            <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm mt-2">
                                <i class="fas fa-plus"></i> Añadir el primer servicio
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
<div class="form-group">
    <label for="language_id">Idioma</label>
    <select name="language_id" id="language_id" class="form-control" required>
        <option value="1" {{ old('language_id', $project->language_id ?? '') == 1 ? 'selected' : '' }}>Español</option>
        <option value="2" {{ old('language_id', $project->language_id ?? '') == 2 ? 'selected' : '' }}>Inglés</option>
    </select>
</div>


<div class="form-group">
    <label for="title">Título del Proyecto <span class="required">*</span></label>
    {{-- Aquí, si $project no existe o $project->title es null, usa una cadena vacía --}}
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title ?? '') }}" required>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Descripción del Proyecto <span class="required">*</span></label>
    {{-- Igual aquí para el textarea --}}
    <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $project->description ?? '') }}</textarea>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="main_image">Imagen Principal</label>
    <input type="file" name="main_image" id="main_image" class="form-control-file">
    {{-- Usamos isset($project) para verificar si la variable $project existe antes de intentar acceder a sus propiedades --}}
    @if(isset($project) && $project->main_image_path)
        <div class="current-image">
            <p>Imagen Actual:</p>
            <img src="{{ asset('storage/' . $project->main_image_path) }}" alt="Imagen actual del proyecto" class="img-preview">
            <div class="form-check">
                <input type="checkbox" name="remove_main_image" id="remove_main_image" value="1" class="form-check-input">
                <label class="form-check-label" for="remove_main_image">Eliminar imagen actual</label>
            </div>
        </div>
    @endif
    @error('main_image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

{{-- Campos para URL y etiquetas --}}
<div class="form-group">
    <label for="project_url">URL del Proyecto (Opcional)</label>
    <input type="url" name="project_url" id="project_url" class="form-control" value="{{ old('project_url', $project->project_url ?? '') }}" placeholder="https://ejemplo.com">
    @error('project_url')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="github_url">URL GitHub (Opcional)</label>
    <input type="url" name="github_url" id="github_url" class="form-control" value="{{ old('github_url', $project->github_url ?? '') }}" placeholder="https://github.com/usuario/repo">
    @error('github_url')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="start_date">Fecha de Inicio (Opcional)</label>
    {{-- Para fechas, también asegúrate de que el formato sea correcto si existe --}}
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', (isset($project) && $project->start_date) ? $project->start_date->format('Y-m-d') : '') }}">
    @error('start_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="end_date">Fecha de Fin (Opcional)</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', (isset($project) && $project->end_date) ? $project->end_date->format('Y-m-d') : '') }}">
    @error('end_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="order">Orden para Visualización (Opcional)</label>
    <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $project->order ?? '') }}" min="0">
    @error('order')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="language_id">Idioma</label>
    <select name="language_id" id="language_id" class="form-control" required>
        <option value="1" {{ old('language_id', $project->language_id ?? '') == 1 ? 'selected' : '' }}>Español</option>
        <option value="2" {{ old('language_id', $project->language_id ?? '') == 2 ? 'selected' : '' }}>Inglés</option>
    </select>
</div>

<div class="form-group">
    <label for="title">Título del Proyecto <span class="required">*</span></label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title ?? '') }}" required>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Descripción del Proyecto <span class="required">*</span></label>
    <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $project->description ?? '') }}</textarea>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Imagen Principal</label>
    {{-- CAMBIADO: 'main_image' a 'image' para que coincida con el modelo --}}
    <input type="file" name="image" id="image" class="form-control-file">
    {{-- Usamos isset($project) para verificar si la variable $project existe --}}
    {{-- $project->image ahora contendrá la URL completa que guardaste --}}
    @if(isset($project) && $project->image)
        <div class="current-image">
            <p>Imagen Actual:</p>
            {{-- La ruta ahora es una URL completa, no necesitas asset('storage/') --}}
            <img src="{{ $project->image }}" alt="Imagen actual del proyecto" class="img-preview">
            <div class="form-check">
                <input type="checkbox" name="remove_image" id="remove_image" value="1" class="form-check-input">
                <label class="form-check-label" for="remove_image">Eliminar imagen actual</label>
            </div>
        </div>
    @endif
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

{{-- Campos para URL y etiquetas --}}
<div class="form-group">
    <label for="url">URL del Proyecto (Opcional)</label>
    {{-- CAMBIADO: 'project_url' a 'url' para que coincida con el modelo --}}
    <input type="url" name="url" id="url" class="form-control" value="{{ old('url', $project->url ?? '') }}" placeholder="https://ejemplo.com">
    @error('url')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

{{-- Campos para las etiquetas y URLs de GitHub --}}
<div class="form-group">
    <label for="first_label">Etiqueta Principal (GitHub/Backend) (Opcional)</label>
    <input type="text" name="first_label" id="first_label" class="form-control" value="{{ old('first_label', $project->first_label ?? '') }}" placeholder="Ej: Ver en GitHub, Demostración">
    @error('first_label')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="first_url_gihub">URL GitHub / Enlace 1 (Opcional)</label>
    {{-- CAMBIADO: 'github_url' a 'first_url_gihub' para que coincida con el modelo --}}
    <input type="url" name="first_url_gihub" id="first_url_gihub" class="form-control" value="{{ old('first_url_gihub', $project->first_url_gihub ?? '') }}" placeholder="https://github.com/usuario/repo o https://demo.com">
    @error('first_url_gihub')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="second_label">Etiqueta Secundaria (GitHub/Frontend) (Opcional)</label>
    <input type="text" name="second_label" id="second_label" class="form-control" value="{{ old('second_label', $project->second_label ?? '') }}" placeholder="Ej: Otro enlace, Más información">
    @error('second_label')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="second_url_gihub">URL GitHub / Enlace 2 (Opcional)</label>
    <input type="url" name="second_url_gihub" id="second_url_gihub" class="form-control" value="{{ old('second_url_gihub', $project->second_url_gihub ?? '') }}" placeholder="https://github.com/usuario/otro-repo o https://otro-demo.com">
    @error('second_url_gihub')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="start_date">Fecha de Inicio (Opcional)</label>
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

{{-- Si tienes un campo 'status' en tu modelo y quieres un checkbox para él --}}
<div class="form-group">
    <div class="form-check">
        <input type="checkbox" name="status" id="status" class="form-check-input" value="1" {{ old('status', $project->status ?? 0) ? 'checked' : '' }}>
        <label class="form-check-label" for="status">Activo / Publicado</label>
    </div>
    @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="language_id">Idioma</label>
    <select name="language_id" id="language_id" class="form-control" required>
        <option value="1" {{ old('language_id', $service->language_id ?? '') == 1 ? 'selected' : '' }}>Español</option>
        <option value="2" {{ old('language_id', $service->language_id ?? '') == 2 ? 'selected' : '' }}>Inglés</option>
    </select>
</div>

<div class="form-group">
    <label for="name">Nombre del Servicio <span class="required">*</span></label>
    {{-- $service->name ?? '' para manejar la creación --}}
    <input type="text" name="title" id="title" class="form-control" value="{{ old('name', $service->title ?? '') }}" required>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Descripción del Servicio <span class="required">*</span></label>
    {{-- $service->description ?? '' para manejar la creación --}}
    <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $service->description ?? '') }}</textarea>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="icon">Clase de Ícono (Font Awesome) <span class="required">*</span></label>
    <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon', $service->icon ?? '') }}" placeholder="Ej: fas fa-code o fab fa-laravel" required>
    <small class="form-text text-muted">Puedes encontrar íconos en <a href="https://fontawesome.com/icons" target="_blank" rel="noopener noreferrer">Font Awesome</a>. Ej: `fas fa-code`</small>
    @error('icon')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="order">Orden para Visualización (Opcional)</label>
    <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $service->order ?? '') }}" min="0">
    @error('order')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Imagen del Servicio</label>
    <input type="file" name="image" id="image" class="form-control-file">
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

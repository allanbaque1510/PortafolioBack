<div class="form-group">
    <label for="language_id">Idioma</label>
    <select name="language_id" id="language_id" class="form-control" required>
        <option value="1" {{ old('language_id', $workExperience->language_id ?? '') == 1 ? 'selected' : '' }}>Español</option>
        <option value="2" {{ old('language_id', $workExperience->language_id ?? '') == 2 ? 'selected' : '' }}>Inglés</option>
    </select>
</div>


<div class="form-group">
    <label for="position">Puesto de Trabajo <span class="required">*</span></label>
    <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $workExperience->position ?? '') }}" required>
    @error('position')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="company_name">Nombre de la Empresa <span class="required">*</span></label>
    <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $workExperience->company_name ?? '') }}" required>
    @error('company_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="company_logo">Logo de la Empresa (Opcional)</label>
    <input type="file" name="company_logo" id="company_logo" class="form-control-file">
    {{-- Asumo que 'company_logo' guarda una URL completa como 'image' en Projects --}}
    @if(isset($workExperience) && $workExperience->company_logo)
        <div class="current-image mt-2">
            <p>Logo Actual:</p>
            <img src="{{ $workExperience->company_logo }}" alt="Logo de la empresa" class="img-preview" style="max-width: 150px; height: auto;">
            <div class="form-check mt-1">
                <input type="checkbox" name="remove_company_logo" id="remove_company_logo" value="1" class="form-check-input">
                <label class="form-check-label" for="remove_company_logo">Eliminar logo actual</label>
            </div>
        </div>
    @endif
    @error('company_logo')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="company_website">Sitio Web de la Empresa (Opcional)</label>
    <input type="url" name="company_website" id="company_website" class="form-control" value="{{ old('company_website', $workExperience->company_website ?? '') }}" placeholder="https://ejemplo.com">
    @error('company_website')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="company_location">Ubicación de la Empresa (Opcional)</label>
    <input type="text" name="company_location" id="company_location" class="form-control" value="{{ old('company_location', $workExperience->company_location ?? '') }}" placeholder="Ej: Guayaquil, Ecuador">
    @error('company_location')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="start_date">Fecha de Inicio <span class="required">*</span></label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', (isset($workExperience) && $workExperience->start_date) ? $workExperience->start_date->format('Y-m-d') : '') }}" required>
    @error('start_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="end_date">Fecha de Fin (Dejar vacío si es actual)</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', (isset($workExperience) && $workExperience->end_date) ? $workExperience->end_date->format('Y-m-d') : '') }}">
    @error('end_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <div class="form-check">
        <input type="checkbox" name="is_current" id="is_current" class="form-check-input" value="1" {{ old('is_current', $workExperience->is_current ?? 0) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_current">Actualmente Trabajo Aquí</label>
    </div>
    @error('is_current')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Descripción del Puesto <span class="required">*</span></label>
    <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $workExperience->description ?? '') }}</textarea>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="achievements">Logros / Responsabilidades (Opcional)</label>
    <textarea name="achievements" id="achievements" class="form-control" rows="5">{{ old('achievements', $workExperience->achievements ?? '') }}</textarea>
    <small class="form-text text-muted">Puedes usar viñetas o una lista para los logros.</small>
    @error('achievements')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="order">Orden para Visualización (Opcional)</label>
    <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $workExperience->order ?? '') }}" min="0">
    @error('order')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <div class="form-check">
        <input type="checkbox" name="status" id="status" class="form-check-input" value="1" {{ old('status', $workExperience->status ?? 0) ? 'checked' : '' }}>
        <label class="form-check-label" for="status">Activo / Publicado</label>
    </div>
    @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
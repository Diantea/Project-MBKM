<div class="form-group mb-3">
    <label for="form-{{ $field }}" class="form-label">{{ $label }}</label>
    <input
        id="form-{{ $field }}"
        name="{{ $field }}"
        type="text"
        class="form-control date {{ $errors->first($field) ? 'is-invalid' : ''}}"
        placeholder="{{ $label }}"
        value="{{ old($field) ?? ($item ? $item[$field] : '') }}"
    />
    @if($errors->first($field))
        <div class="invalid-feedback">{{ $errors->first($field) }}</div>
    @endif
</div>

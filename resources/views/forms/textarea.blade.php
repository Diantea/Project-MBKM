<div class="form-group mb-3">
    <label class="form-label" for="form-{{ $field }}">{{ $label }}</label>
    <textarea
        class="form-control {{ $errors->first($field) ? 'is-invalid' : ''}}"
        id="form-{{ $field }}"
        placeholder="{{ $label }}"
        name="{{ $field }}"
        rows="6"
    >{{ old($field) ?? ($item ? $item[$field] : '') }}</textarea>
    @if($errors->first($field))
        <div class="invalid-feedback">{{ $errors->first($field) }}</div>
    @endif
</div>

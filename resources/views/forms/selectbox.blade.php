<div class="form-group mb-3">
    <label class="form-label" for="form-{{ $field }}">{{ $label }}</label>
    <select
        name="{{ $field }}"
        id="form-{{ $field }}"
        class="form-control {{ $errors->first($field) ? 'is-invalid' : ''}}"
        {{ isset($is_disabled) ? 'disabled' : '' }}
    >
        @foreach($choices as $choice)
            <option value="{{$choice['value']}}" {{ $choice['value'] === (old($field) ?? ($item ? $item[$field] : '')) ? 'selected' : '' }}>{{$choice['label']}}</option>
        @endforeach
    </select>
    @if($errors->first($field))
        <div class="invalid-feedback">{{ $errors->first($field) }}</div>
    @endif
</div>

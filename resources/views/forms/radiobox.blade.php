<div class="form-group mb-3">
    <label class="form-label">{{ $label }}</label>

    @foreach($choices as $key => $choice)
        <div class="form-check form-check mb-50">
            <input {{ $choice['value'] === (old($field) ?? ($item ? $item[$field] : '')) ? 'checked' : ($key === 0 ? 'checked' : '') }} type="radio" name="{{$field}}" id="form-{{$field}}-{{$key}}" value="{{$choice['value']}}" class="form-check-input"/>
            <label class="form-check-label" for="form-{{$field}}-{{$key}}">{{$choice['label']}}</label>
        </div>
    @endforeach

@if($errors->first($field))
        <div class="invalid-feedback">{{ $errors->first($field) }}</div>
    @endif
</div>

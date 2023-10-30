<div class="form-group mb-3">
    <label class="form-label" for="form-{{ $field }}">{{ $label }}</label>

    @if($item)
        @if(isset($item[$field . '_type']) && !in_array($item[$field . '_type'], ['png', 'jpg', 'jpeg', 'svg', 'gif']))
            @if($item[$field])
                <div class="mb-3">
                    <a href="{{ $item[$field . '_url'] }}" download="{{ $item[$field . '_name'] }}.{{ $item[$field . '_type'] }}" class="btn btn-primary waves-effect waves-light">
                        <span class="ti-xs ti ti-download me-1"></span>Download file
                    </a>
                </div>
            @endif
        @else
            @if(isset($field_url))
                <img src="{{ $field_url }}" class="mb-3" alt="image" style="height: 100px; display: block; background-color: #ddd;">
            @else
                @if($item[$field])
                    <img src="{{ $item[$field . '_url'] }}" class="mb-3" alt="image" style="height: 100px; display: block; background-color: #ddd;">
                @endif
            @endif
        @endif
    @endif

    @if($item)
        <label class="form-label" for="form-{{ $field }}">Ubah {{$label}}</label>
    @endif

        <input
        type="file"
        class="form-control {{ $errors->first($field) ? 'is-invalid' : ''}}"
        id="form-{{ $field }}"
        placeholder="{{ $label }}"
        name="{{ $field }}"
    />
    @if($errors->first($field))
        <div class="invalid-feedback">{{ $errors->first($field) }}</div>
    @endif
</div>

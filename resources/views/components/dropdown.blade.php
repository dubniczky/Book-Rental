<label for="{{ $name }}" class="form-label">{{ $title }}</label>
<select name="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror"
        required>

    @foreach ($options as $o)
        <option value="{{ $o }}"
            @if ($init($name) == $o) selected @endif>
            {{ $o }}
        </option>
    @endforeach

</select>

@error($name)
<div class="invalid-feedback">
    {{$message}}
</div>
@enderror

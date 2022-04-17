<label for="{{ $name }}" class="form-label">{{ $title }}</label>
<select name="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror"
        required
        value="{{ $init($name) }}">

    @foreach ($options as $o)
        <option value="{{ $o }}">{{ $o }}</option>
    @endforeach

</select>

@error($name)
<div class="invalid-feedback">
    {{$message}}
</div>
@enderror

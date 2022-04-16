<label for="{{ $name }}" class="form-label">{{ $title }}</label>
<input type="{{ $type }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" required>
<label for="genres" class="form-label">Genres</label>
<div class="mb-3">
    @foreach ($genres as $g)
    <div class="btn btn-outline-{{$g['style']}}">
        <input type="checkbox" name="genres[]" value={{$g['id']}}>
        <label>{{$g['name']}}</label>
    </div>
    @endforeach
</div>
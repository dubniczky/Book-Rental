<div class="list-inline">
    @foreach ($genres as $g)
    <a class="btn btn-outline-{{ $g['style'] }}"
    href="{{ route('genres.show', ['genre'=>$g['id']]) }}">
    {{ $g['name'] }}
    </a>
    @endforeach
</div>
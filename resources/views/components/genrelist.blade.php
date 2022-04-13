@foreach ($genres as $g)
<div class="list-inline">
    <a class="btn btn-outline-{{ $g['style'] }}"
    href="{{ route('genres.show', ['genre'=>$g['id']]) }}">
    {{ $g['name'] }}
    </a>
</div>
@endforeach
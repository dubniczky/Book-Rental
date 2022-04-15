<table class="table">
    <thead>
        <td>Title</td>
        <td>Author</td>
        <td>Rented at</td>
        <td>Deadline</td>
        <td>Details</td>
    </thead>
    @foreach ($borrows as $b)
    <tr>
        <td>{{ $b->book['title'] }}</td>
        <td>{{ $b->book['authors'] }}</td>
        <td>{{ $b['created_at']->format('d/m/Y') }}</td>
        <td>{{ $b['deadline'] ? $b['deadline']->format('d/m/Y') : '' }}</td>
        <td><a href="/borrows/{{ $b['id'] }}" class="btn btn-primary">details</a></td>
    </tr>
    @endforeach
</table>
<!-- booklist -->
<div class="container d-flex align-items-center justify-content-center mt-5">
    <div class="row row-cols-3">

        @foreach ($books as $book)
        <div class="card mb-3 mr-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src={{ URL::asset( $book['cover_image'] ) }} class="card-img" alt={{ URL::asset( $book['title'] ) }}>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book['title'] }}</h5>
                        <p class="card-text">{{ Str::substr($book['description'], 0, 200) }}...</p>
                        <p class="card-text"><small class="text-muted">{{ $book['in_stock'] }} available for rent</small></p>
                        <a href="/book/details/{{ $book['id'] }}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<!-- /booklist -->
@include('book.formfield', [ 'title'=>'Title', 'name'=>'title', 'type'=>'text', 'init'=>$init])
@include('book.formfield', [ 'title'=>'Authors', 'name'=>'authors', 'type'=>'text', 'init'=>$init ])
@include('book.formfield', [ 'title'=>'Release Date', 'name'=>'released_at', 'type'=>'date', 'init'=>$init ])
@include('book.formfield', [ 'title'=>'Pages', 'name'=>'pages', 'type'=>'number', 'init'=>$init ])
@include('book.formfield', [ 'title'=>'ISBN', 'name'=>'isbn', 'type'=>'text', 'init'=>$init ])

@include('book.formarea', [ 'title'=>'description', 'name'=>'description', 'init'=>$init ])
@include('book.formgenres', [ 'genres'=>$genres, 'init'=>$init ])

@include('book.formfield', [ 'title'=>'In Stock', 'name'=>'in_stock', 'type'=>'number', 'init'=>$init ])
@include('components.formfield', [ 'title'=>'Title', 'name'=>'title', 'type'=>'text', 'init'=>$init])
@include('components.formfield', [ 'title'=>'Authors', 'name'=>'authors', 'type'=>'text', 'init'=>$init ])
@include('components.formfield', [ 'title'=>'Release Date', 'name'=>'released_at', 'type'=>'date', 'init'=>$init ])
@include('components.formfield', [ 'title'=>'ISBN', 'name'=>'isbn', 'type'=>'text', 'init'=>$init ])
@include('components.formfield', [ 'title'=>'Pages', 'name'=>'pages', 'type'=>'number', 'init'=>$init ])

@include('components.formarea', [ 'title'=>'description', 'name'=>'description', 'init'=>$init ])
@include('book.formgenres', [ 'genres'=>$genres, 'init'=>$init ])

@include('components.formfield', [ 'title'=>'In Stock', 'name'=>'in_stock', 'type'=>'number', 'init'=>$init ])
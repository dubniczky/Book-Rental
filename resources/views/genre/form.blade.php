@include('components.formfield', [ 'title'=>'Name', 'name'=>'name', 'type'=>'text', 'init'=>$init ])
@include('components.dropdown', [
    'title'=>'Style',
    'name'=>'style',
    'init'=>$init,
    'options'=>$styles ])
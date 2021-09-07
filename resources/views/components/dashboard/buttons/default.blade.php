@isset( $route )
<a href="{{$route}}" {{$attributes->merge(['class' => 'btn btn-primary float-right'])}}>{{$title ?? 'Save'}}</a>
@endif

<div>
    @foreach($_fields as $field_name => $type)
        <hr/>
        @if($type != 'image')
            <strong>{{ucwords($field_name)}}</strong>
        @endif
        <p class="text-muted">
            @switch($type)
                @case('relationship')
                    {{$_data->$field_name->name}}
                @break
                @case('image')
                <img alt="Image" width="250" src="{{$_data->$field_name}}">
                @break
                @default
                {{$_data->$field_name}}
            @endswitch
        </p>
    @endforeach
</div>

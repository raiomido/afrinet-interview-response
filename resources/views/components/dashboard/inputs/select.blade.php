@isset($name, $collection)
    <div {{ $attributes->merge(['class' => 'form-group']) }}>
        <label for="{{$name}}">{{ucwords($name)}}</label>
            <select id="{{$name}}" name="{{$name}}" class="form-control">
                <option value="0">--Select {{$title ?? ucwords($name)}}--</option>
                @foreach($collection as $itm)
                    <option value="{{$itm->id}}" {{(old($name) && old($name) == $itm->id) || (isset($model) && $model->$name == $itm->id) ? 'selected="selected"' : ''}}>{{$itm->title ?? $itm->name}}</option>
                @endforeach
            </select>
        @error($name)
        <p class="text-sm text-danger mt-3 mb-0">
            {{ $message }}
        </p>
        @enderror
    </div>
@endisset

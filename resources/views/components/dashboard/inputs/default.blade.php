<div {{ $attributes->merge(['class' => 'form-group']) }}>
    <label for="{{$name}}">{{ucwords($name)}}</label>
    <input type="{{$type ?? 'text'}}" name="{{$name}}" class="form-control" id="{{$name}}" placeholder="Enter {{$name}}" value="{{old($name) ?? (isset($model) ? $model->$name : '')}}">
    @error($name)
    <p class="text-sm text-danger mt-3 mb-0">
        {{ $message }}
    </p>
    @enderror
</div>

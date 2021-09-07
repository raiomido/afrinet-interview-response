<div {{ $attributes->merge(['class' => 'form-group']) }}>
    <label for="{{$name}}">{{ucwords($name)}}</label>
    <input type="file" name="image" class="form-control" id="{{$name}}" accept="image/*" placeholder="Select {{$name}}" >
    @error($name)
    <p class="text-sm text-danger mt-3 mb-0">
        {{ $message }}
    </p>
    @enderror
    @if(isset($model) && $link = $model->getFirstMediaUrl($name))
        <img alt="{{$model->name}}" width="250" src="{{$link}}">
    @endif
</div>

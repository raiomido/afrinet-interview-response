@extends('layouts.dashboard')
@section('action')
    <x-dashboard.buttons.default :route="route('dashboard.companies.index')" title="View all companies"/>
@endsection
@section('content')
<form action="{{route('dashboard.companies.store')}}" method="post" class="" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-2 gap-6">
        <x-dashboard.inputs.default name="name"/>
        <x-dashboard.inputs.default name="email" type="email"/>
        <x-dashboard.inputs.default name="website"/>
        <x-dashboard.inputs.image name="logo"/>
    </div>
    <x-dashboard.buttons.submit/>
</form>
@endsection

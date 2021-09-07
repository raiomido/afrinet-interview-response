@extends('layouts.dashboard')
@section('action')
    <x-dashboard.buttons.default :route="route('dashboard.companies.index')" title="View all companies"/>
@endsection
@section('content')
<form action="{{route('dashboard.companies.update', $data)}}" method="post" class="" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 gap-6">
        <x-dashboard.inputs.default :model="$data" name="name"/>
        <x-dashboard.inputs.default :model="$data" name="email" type="email"/>
        <x-dashboard.inputs.default :model="$data" name="website"/>
        <x-dashboard.inputs.image :model="$data" name="logo"/>
    </div>
    <x-dashboard.buttons.submit/>
</form>
@endsection

@extends('layouts.dashboard')
@section('action')
    <x-dashboard.buttons.default :route="route('dashboard.employees.index')" title="View all employees"/>
@endsection
@section('content')
<form action="{{route('dashboard.employees.update', $data)}}" method="post" class="" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 gap-6">
        <x-dashboard.inputs.default :model="$data" name="firstname"/>
        <x-dashboard.inputs.default :model="$data" name="lastname"/>
        <x-dashboard.inputs.default :model="$data" name="email" type="email"/>
        <x-dashboard.inputs.default :model="$data" name="phone" type="tel"/>
        <x-dashboard.inputs.select :model="$data" name="company_id" title="Company" :collection="$collection"/>
    </div>
    <x-dashboard.buttons.submit/>
</form>
@endsection

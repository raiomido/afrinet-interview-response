@extends('layouts.dashboard')
@section('action')
    <x-dashboard.buttons.default :route="route('dashboard.employees.index')" title="View all employees"/>
@endsection
@section('content')
<form action="{{route('dashboard.employees.store')}}" method="post" class="" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-2 gap-6">
        <x-dashboard.inputs.default name="firstname"/>
        <x-dashboard.inputs.default name="lastname"/>
        <x-dashboard.inputs.default name="email" type="email"/>
        <x-dashboard.inputs.default name="phone" type="tel"/>
        <x-dashboard.inputs.select name="company_id" title="Company" :collection="$collection"/>
    </div>
    <x-dashboard.buttons.submit/>
</form>
@endsection

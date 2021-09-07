@extends('layouts.dashboard')
@section('action')
    <x-dashboard.buttons.default :route="route('dashboard.employees.create')" title="Add new Employee"/>
@endsection
@section('content')
<x-dashboard.table :columns="$columns" :data="$data" route-prefix="dashboard.employees"/>
@endsection

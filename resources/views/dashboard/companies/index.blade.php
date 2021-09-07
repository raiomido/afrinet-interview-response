@extends('layouts.dashboard')
@section('action')
    <x-dashboard.buttons.default :route="route('dashboard.companies.create')" title="Add new Company"/>
@endsection
@section('content')
<x-dashboard.table :columns="$columns" :data="$data" route-prefix="dashboard.companies"/>
@endsection

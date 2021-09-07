@extends('layouts.dashboard')
@section('action')
    <x-dashboard.buttons.default :route="route('dashboard.companies.create')" title="Add new Company"/>
@endsection
@section('content')
<x-dashboard.show :fields="$fields" :data="$data" route-prefix="dashboard.companies"/>
@endsection

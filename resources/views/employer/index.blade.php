@extends('layouts.custom')

@section('content')
    <p>Employer Dashboard</p>
    <p>Hi {{$user->name}}</p>

    <a href="#" >See Posted JObs</a>

    @can('create-job')
        <p>This user can create a job</p>
        <a href="{{route('create-job')}}" >Add a job</a>
    @endcan

@endsection

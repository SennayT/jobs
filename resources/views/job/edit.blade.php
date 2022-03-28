@extends('layouts.custom')

@section('content')
    <job-form
        href="{{route('update-job')}}"
        title_prop="{{$job->title}}"
        email_prop="{{$job->email}}"
        address_prop="{{$job->address}}"
        deadline_prop="{{$job->deadline}}"
        details="{!! $job->details !!}"
    >
        @CSRF
        <input type="hidden" name="user_id" value="{{$user_id}}"/>
        <input type="hidden" name="job_id" value="{{$job->id}}"/>

    </job-form>
@endsection

@extends('layouts.custom')

@section('content')

    @if ($errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <job-form
        href="{{route('post_job')}}"
        {{--       emailProp="{{old('email')}}"--}}
        {{--       jobTitleProp="{{old('title')}}"--}}
        {{--       addressProp="{{old('address')}}"--}}
        {{--       detailsProp="{{old('details')}}"--}}
    >
        @CSRF
        <input type="hidden" name="user_id" value="{{$user_id}}" />
    </job-form>
@endsection

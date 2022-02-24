@extends('layouts.custom')

@section('content')


    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <v-container>

        <v-row>
            <v-col cols="10">
                @foreach($jobs as $job)
                    <job-card
                    title="{{$job->title}}"
                    link="/jobs/{{$job->id}}/applicants"
                    link-text="Applicants"
                    >
                        {!! $job->details !!}
                    </job-card>
                @endforeach
{{--                <v-simple-table>--}}
{{--                    <template v-slot:default>--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th class="text-left">Title</th>--}}
{{--                            <th class="text-left">Details</th>--}}
{{--                            <th class="text-left">Address</th>--}}
{{--                            <th class="text-left">Deadline</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($jobs as $job)--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <a href="/jobs/{{$job->id}}/applicants" >{{$job->title}}</a>--}}
{{--                                </td>--}}
{{--                                <td> {!! \Illuminate\Support\Str::limit($job->details,50) !!}</td>--}}
{{--                                <td>{{$job->address}}</td>--}}
{{--                                <td>{{$job->deadline}}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </template>--}}
{{--                </v-simple-table>--}}
            </v-col>
        </v-row>


        <v-row>
            {{$jobs->links()}}
        </v-row>

    </v-container>


{{--    <v-container>--}}
{{--        <v-row>--}}
{{--            <v-col cols="12" >--}}
{{--                <v-card>--}}
{{--                    <v-card-title>--}}
{{--                        {{__('Dashboard')}}--}}
{{--                    </v-card-title>--}}
{{--                    <v-card-text>--}}
{{--                        @if(session('status'))--}}
{{--                            <v-alert type="success">--}}
{{--                                {{session('status')}}--}}
{{--                            </v-alert>--}}
{{--                            @endif--}}
{{--                            {{ __('You are logged in!') }}--}}
{{--                        <p>Hi {{$user->name}}</p>--}}

{{--                        @if(session('error'))--}}
{{--                            <p>{{session('error')}}</p>--}}
{{--                            @endif--}}


{{--                    </v-card-text>--}}
{{--                </v-card>--}}
{{--            </v-col>--}}
{{--        </v-row>--}}
{{--    </v-container>--}}
@endsection

@extends('layouts.custom')

@section('content')

<v-container>
    <v-row>
        <v-col cols="8" >
            <v-alert
            type="success"
            >
               {{$job->title}}
            </v-alert>
        </v-col>
    </v-row>

    <v-row>
        <v-col cols="12">
            {!! $job->details !!}
        </v-col>
    </v-row>

    <v-btn color="success" link href="/jobs/apply/{{$job->id}}" >Apply</v-btn>
</v-container>

@endsection

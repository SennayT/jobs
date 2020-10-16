@extends('layouts.custom')

@section('content')


    <v-container>
        <v-row>
            <v-col cols="12" >
                <v-card>
                    <v-card-title>
                        {{__('Dashboard')}}
                    </v-card-title>
                    <v-card-text>
                        @if(session('status'))
                            <v-alert type="success">
                                {{session('status')}}
                            </v-alert>
                            @endif
                            {{ __('You are logged in!') }}
                        <p>Hi {{$user->name}}</p>

                        @if(session('error'))
                            <p>{{session('error')}}</p>
                            @endif


                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
@endsection

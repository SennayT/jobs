@extends('layouts.custom')

@section('content')

    <application-form address="/jobs/apply" >
        @CSRF
        <input type="hidden" name="job_id" value="{{$id}}" />
        <v-row>
            <v-col cols="12" >
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <v-row>
                            <v-col cols="12">
                                <v-alert type="error">{{ $error }}</v-alert>
                            </v-col>
                        </v-row>
                    @endforeach
                @endif
            </v-col>
        </v-row>
    </application-form>

{{--    <v-container>--}}
{{--        <v-form method="post" action="/jobs/apply/{{$id}}"  >--}}

{{--            <v-row>--}}
{{--                <v-col cols="6" >--}}
{{--                    <v-text-field--}}
{{--                        title="First Name"--}}
{{--                        name="first_name"--}}
{{--                        placeholder="Enter First Name"--}}
{{--                    ></v-text-field>--}}
{{--                </v-col>--}}

{{--                <v-col cols="6" >--}}
{{--                    <v-text-field--}}
{{--                        title="Last Name"--}}
{{--                        name="last_name"--}}
{{--                        placeholder="Enter Last Name"--}}
{{--                    ></v-text-field>--}}
{{--                </v-col>--}}
{{--            </v-row>--}}

{{--            <v-row>--}}
{{--                <v-col cols="6" >--}}
{{--                    <v-text-field--}}
{{--                        title="Email"--}}
{{--                        name="email"--}}
{{--                        placeholder="Enter Email"--}}
{{--                        type="email"--}}
{{--                    ></v-text-field>--}}
{{--                </v-col>--}}

{{--                <v-col cols="6" >--}}
{{--                    <v-text-field--}}
{{--                        title="phone"--}}
{{--                        name="phone"--}}
{{--                        placeholder="Enter Phone"--}}
{{--                        type="number"--}}
{{--                    ></v-text-field>--}}
{{--                </v-col>--}}
{{--            </v-row>--}}

{{--            <v-row>--}}
{{--                <v-col cols="6" >--}}
{{--                    <v-text-field--}}
{{--                    title="age"--}}
{{--                    name="age"--}}
{{--                    placeholder="Age"--}}
{{--                    type="number"--}}
{{--                    ></v-text-field>--}}
{{--                </v-col>--}}

{{--                <v-col cols="6" >--}}
{{--                    <v-select--}}
{{--                    :items="['Male','Female']"--}}
{{--                    name="gender"--}}
{{--                    placeholder="Gender"--}}
{{--                    >--}}

{{--                    </v-select>--}}
{{--                </v-col>--}}
{{--            </v-row>--}}

{{--            <v-row>--}}
{{--                <v-col></v-col>--}}
{{--            </v-row>--}}


{{--            <v-row>--}}
{{--                <v-col cols="6" >--}}
{{--                    <v-btn>Submit</v-btn>--}}
{{--                </v-col>--}}
{{--            </v-row>--}}

{{--        </v-form>--}}
{{--    </v-container>--}}

@endsection

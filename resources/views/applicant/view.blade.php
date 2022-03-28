@extends('layouts.custom')

@section('content')
    <h1>Personal Information</h1>
    <v-simple-table>
        <template v-slot:default >
            <tbody>
            <tr>
                <td>First Name</td>
                <td>{{$applicant->first_name}}</td>
            </tr>

            <tr>
                <td>Last Name</td>
                <td>{{$applicant->last_name}}</td>
            </tr>

            <tr>
                <td>Email</td>
                <td>{{$applicant->email}}</td>
            </tr>

            <tr>
                <td>Phone</td>
                <td>{{$applicant->phone}}</td>
            </tr>

            <tr>
                <td>Age</td>
                <td>{{$applicant->age}}</td>
            </tr>

            <tr>
                <td>Gender</td>
                <td>{{$applicant->gender}}</td>
            </tr>

            <tr>
                <td>Maximum Education</td>
                <td>{{$applicant->maximum_education}}</td>
            </tr>
            </tbody>
        </template>
    </v-simple-table>


    <h2>Education History</h2>
    <v-simple-table>
        <template v-slot:default>
            <thead>
            <tr>
                <th class="text-left">
                    Name
                </th>
                <th class="text-left">
                    From
                </th>
                <th>
                    To
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($education as $edu)
                <tr>
                    <td>{{$edu->name}}</td>
                    <td>{{$edu->from}}</td>
                    <td>{{$edu->to}}</td>
                </tr>
            @endforeach
            </tbody>
        </template>
    </v-simple-table>

    <h2>Training History</h2>
    <v-simple-table>
        <template v-slot:default>
            <thead>
            <tr>
                <th class="text-left">
                    Name
                </th>
                <th class="text-left">
                    From
                </th>
                <th>
                    To
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($training as $edu)
                <tr>
                    <td>{{$edu->name}}</td>
                    <td>{{$edu->from}}</td>
                    <td>{{$edu->to}}</td>
                </tr>
            @endforeach
            </tbody>
        </template>
    </v-simple-table>

    <h2>Work History</h2>
    <v-simple-table>
        <template v-slot:default>
            <thead>
            <tr>
                <th class="text-left">
                    Name
                </th>
                <th class="text-left">
                    From
                </th>
                <th>
                    To
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($work as $edu)
                <tr>
                    <td>{{$edu->name}}</td>
                    <td>{{$edu->from}}</td>
                    <td>{{$edu->to}}</td>
                </tr>
            @endforeach
            </tbody>
        </template>
    </v-simple-table>



    <v-row>
        <v-col cols="4">
            <form method="post" action="{{route('accept',$applicant->id)}}">
                @CSRF
                <v-btn type="submit" color="primary">Accept</v-btn>
            </form>
        </v-col>
        <v-col cols="4">
            <delete-dialog action="/delete/applicant/{{$applicant->id}}">
                @CSRF
            </delete-dialog>
        </v-col>

{{--        <v-col cols="4">--}}
{{--            <v-btn color="error">Reject</v-btn>--}}
{{--        </v-col>--}}

    </v-row>

@endsection

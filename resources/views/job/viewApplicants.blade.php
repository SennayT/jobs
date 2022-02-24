@extends('layouts.custom')

@section('content')

    <v-container>
        <v-row>
            <v-col cols="10">
                <v-simple-table>
                    <template v-slot:default>
                        <thead>
                        <tr>
                            <th class="text-left">First Name</th>
                            <th class="text-left">Last Name</th>
                            <th class="text-left">Gender</th>
                            <th class="text-left">Email</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($applicants as $applicant)
                            <tr>
                                <td>
                                    <a href="/applicant/{{$applicant->id}}" >{{$applicant->first_name}}</a>
                                </td>
                                <td>{{$applicant->last_name}}</td>
                                <td>{{$applicant->gender}}</td>
                                <td>{{$applicant->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>
    </v-container>

@endsection

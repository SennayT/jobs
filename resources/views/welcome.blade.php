@extends('layouts.custom')

@section('content')

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <v-container>

        <v-row>
            <v-col cols="10">
                <v-simple-table>
                    <template v-slot:default>
                        <thead>
                        <tr>
                            <th class="text-left">Title</th>
                            <th class="text-left">Details</th>
                            <th class="text-left">Address</th>
                            <th class="text-left">Deadline</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->title}}</td>
                                <td> {{\Illuminate\Support\Str::limit($job->details,50)}}</td>
                                <td>{{$job->address}}</td>
                                <td>{{$job->deadline}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>

        <v-row>
            {{$jobs->links()}}
        </v-row>

    </v-container>



@endsection





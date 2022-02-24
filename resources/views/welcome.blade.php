@extends('layouts.custom')

@section('content')

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <v-container>

        <v-row>
            <v-col cols="10">
                @foreach($jobs as $job)
                    <job-card
                        title="{{$job->title}}"
                        link="/jobs/{{$job->id}}"
                        link-text="Details"
                    >{!! $job->details !!}</job-card>
                @endforeach
            </v-col>
        </v-row>

{{--        <v-row>--}}
{{--            <v-col cols="12">--}}
{{--                <job-form href="{{route('save-job')}}">--}}
{{--                    @csrf--}}
{{--                </job-form>--}}
{{--            </v-col>--}}
{{--        </v-row>--}}


        <v-row>
            {{$jobs->links()}}
        </v-row>

    </v-container>



@endsection


<script>
    import JobForm from "../js/components/JobForm";
    export default {
        components: {JobForm}
    }
</script>

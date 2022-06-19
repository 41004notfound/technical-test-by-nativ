@extends('layout.app')

@section('content')
    <v-btn
        href="/appointments/create"
        depressed
        x-large
        color="primary"
    >
        Appuyer pour réserver
    </v-btn>
@endsection

@section('script')
    <script>
        import {VBtn} from "../../public/js/app";
        export default {
            components: {VBtn}
        }
    </script>
@endsection

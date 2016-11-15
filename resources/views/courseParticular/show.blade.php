@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">{{ $courseParticular->courseName }}</div>

                    <div class="panel-body">

                        {{$courseParticular->courseDescription}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
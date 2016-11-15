@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Course Overview</div>

                    <div class="panel-body">

                        <table class="table">
                            <tr>
                            <tr>Name</tr>
                            </tr>
                            @foreach($courseParticulars as $courseParticular)
                                <tr>
                                    <td>{{ link_to_route('courseParticular.show',$courseParticular->courseName,[$courseParticular->courseID]) }}</td>
                                    <td>
                                        {!! Form::open(array('route'=>['courseParticular.destroy',$courseParticular->courseID],'method'=>'DELETE')) !!}
                                        {{ link_to_route('courseParticular.edit','Edit',[$courseParticular->courseID],['class'=>'btn btn-primary']) }}
                                        {{--|--}}
                                        {{--{!! Form::button('Delete',['class'=>'btn btn-danger', 'type'=>'submit']) !!}--}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                {{--{{ link_to_route('courseParticular.create','Add course Particular',null,['class'=>'btn btn-success']) }}--}}
            </div>
        </div>
    </div>
@endsection
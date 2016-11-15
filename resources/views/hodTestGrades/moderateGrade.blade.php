@extends('home')


@section('content')

    <div class="row">
        {{--@if(Session::has('error'))--}}
        {{--<div class="alert alert-danger">{{ Session::get('error') }}</div>--}}
        {{--@endif--}}
        <div class="col-md-2"></div>
        <h3><b> Set Moderate Grade </b></h3>
        <div class="col-md-8">
            {{ Form::open(['url' => array('hod_grades_details_moderate/store', $testID)]) }}
            <div class="form-group">
                {!! Form::label('title', 'Enter percentage increase') !!}
                {{ Form::text('valueID', null,['class'=>'form-control'])}}
            </div>
            {{ Form::button('submit', ['type'=>'submit','class'=>'btn btn-success']) }}
            {!! Form::close() !!}
            {{--@foreach($lecturerParticulars as $lecturerParticular)--}}
            {{--<tr>--}}
            {{--<td>{{ link_to_route('lecturerParticular.show',$lecturerParticular->lecturerName,[$lecturerParticular->lecturerID]) }}</td>--}}
            {{--<td>--}}
            {{--{!! Form::open(array('route'=>['lecturerParticular.destroy',$lecturerParticular->lecturerID],'method'=>'DELETE')) !!}--}}
            {{--{{ link_to_route('lecturerParticular.edit','Edit',[$lecturerParticular->lecturerID],['class'=>'btn btn-primary']) }}--}}
            {{--|--}}
            {{--{!! Form::button('Delete',['class'=>'btn btn-danger', 'type'=>'submit']) !!}--}}
            {{--{!! Form::close() !!}--}}
            {{--</td>--}}
            {{--</tr>--}}
            {{--@endforeach--}}
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
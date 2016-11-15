@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Course Particular</div>

                    <div class="panel-body">
                        {!! Form::open(array('route'=>'courseParticular.store')) !!}
                            <div class="form-group">
                                {!! Form::label('id', 'Enter id') !!}
                                {!! Form::text('courseID', null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('name', 'Enter Name') !!}
                                {!! Form::text('courseName', null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Enter description') !!}
                                {!! Form::text('courseDescription', null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('lecturerid', 'Enter lecturerID') !!}
                                {!! Form::text('lecturerID', null,['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::button('Create', ['type'=>'submit','class'=>'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
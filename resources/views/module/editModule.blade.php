@extends('home')


@section('content')

	<div class="row">
        @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
		<div class="col-md-2"></div>
		<div class="col-md-8">
			@foreach($editmodule as $module)

				{{ Form::model($editmodule, array('route' => array('module.update', $module->moduleID), 'method' => 'PUT')) }}

                <div class="form-group">
                    {!! Form::label('module_id', 'Module ID:', ['class' => 'control-label']) !!}
                    {!! Form::text('module_id', $module->moduleID, ['readonly', 'class' => 'form-control']) !!}
                </div>

				<div class="form-group">
					{!! Form::label('module_name', 'Module Name:', ['class' => 'control-label']) !!}
					{!! Form::text('module_name', $module->moduleName, ['required', 'class' => 'form-control']) !!}
				</div>

                <div class="form-group">
                    {!! Form::label('module_course', 'Module Course:', ['class' => 'control-label']) !!}
                    {!! Form::text('module_course', $module->courseID, ['readonly','required', 'class' => 'form-control']) !!}
                </div>


				<div class="form-group">
					{!! Form::label('module_lecturer', 'Lecturer In-Charge:') !!}
					<select class="form-control" name="module_lecturer">
						<option value="{{ $module->lecturerID }}">{{ $module->lecturerName }}</option>
                        @foreach($viewlecturer as $lecturer)
                            <option value="{{ $lecturer->lecturerID }}">{{ $lecturer->lecturerName }}</option>
                        @endforeach
					</select>
				</div>

				{!! Form::submit('Update Module', ['class' => 'btn btn-success']) !!}
                {{ Form::close() }}
			@endforeach


		</div>
		<div class="col-md-2"></div>
	</div>
@endsection
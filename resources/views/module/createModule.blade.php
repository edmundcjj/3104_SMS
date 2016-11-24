@extends('home')
<!--@ section('stylesheet')-->

@section('content')

    <div class="row">
        @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        <h3><b> Create Module </b></h3>
        {!! Form::open(['url'=>'create_module/store/'.$retrieveid]) !!}
        <div class="table-responsive">
            <table class="table table-bordered"  id="createTable">
                <tr>
                    <th>Module ID</th>
                    <th>Module Name</th>
                    <th>Lecturer In-Charge</th>
                    <th>Credit Unit</th>
                    <th>Trimester</th>
                    <th width="50px"> </th>
                </tr>

                <tr>
                    <td>
                        {!! Form::text('module_id', null, ['required', 'placeholder' => 'Enter Module ID' ,'class' => 'form-control']) !!}
                    </td>

                    <td>
                        {!! Form::text('module_name', null, ['required', 'placeholder' => 'Enter Module Name' ,'class' => 'form-control']) !!}
                    </td>

                    <td>
                        <select class="form-control" name="module_lecturer">
                            <option value="" disabled selected>Select Lecturer</option>
                            @foreach($viewlecturer as $lecturer)
                                <option value="{{ $lecturer->lecturerID }}">{{ $lecturer->lecturerName }}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        {!! Form::text('module_credit', null, ['required', 'placeholder' => 'Enter Module Credit' ,'class' => 'form-control']) !!}
                    </td>

                    <td>
                        {!! Form::text('module_trimester', null, ['required', 'placeholder' => 'Enter Module Trimester' ,'class' => 'form-control']) !!}
                    </td>

                    {{ Form::hidden('module_course', $retrieveid) }}

                    <td>
                        {{Form::submit('Create Module', array('class' => 'btn btn-success btn-lg btn-block',  'style' => 'display:inline')) }}
                    </td>

                </tr>
            </table>

        </div> <!-- End of table-responsive -->

        {!! Form::close() !!}

    </div> <!-- End of Top row -->

@endsection
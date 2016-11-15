@extends('home')

<!--@ section('stylesheet')-->

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        @foreach($retrievecourse as $course)
            <h3><b>{{$course->courseName}}</b></h3>
        @endforeach

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="moduleTable">
                <thead>
                <tr>
                    <th width="80" style="text-align:center;">No.</th>
                    <th style="text-align:center;" class="numberWidth">Module ID</th>
                    <th style="text-align:center;">Module Name</th>
                    <th style="text-align:center;" class="nameWidth">Lecturer In-Charge</th>
                    <th style="text-align:center;" width="150">Options </th>
                </tr>
                </thead>

                <tbody>
                @foreach($viewmodule as $modules)
                    <tr>
                        <td class="label_num" style="text-align:center;"> </td>
                        <td style="text-align:center;">{!! $modules->moduleID !!}</td>
                        <td>{!! $modules->moduleName !!}</td>
                        <td style="text-align:center;">{!! $modules->lecturerName !!}</td>
                        <td>
                        <a class="btn btn-primary" href="{{ route('module.edit', $modules->moduleID) }}" >Edit</a>

                        {!! Form::open(['route'=>['module.destroy',$modules->moduleID], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete' , ['class' => 'btn btn-danger'])!!}
                        {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div> <!-- End of table-responsive -->

        <div>
            @foreach($retrievecourse as $course)
                <a href="{{url('create_module/'.$course->courseID)}}" class="btn btn-success">Add New Module</a>
            @endforeach
        </div>
    </div> <!-- End of Top row -->

@endsection
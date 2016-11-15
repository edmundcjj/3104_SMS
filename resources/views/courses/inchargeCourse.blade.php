@extends('home')

<!--@ section('stylesheet')-->

@section('content')

    <div class="row">

        <h3><b> In-Charge Course </b></h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="courseTable">
                <thead>
                <tr>
                    <th width="80" style="text-align:center;">No.</th>
                    <th class="numberWidth" style="text-align:center;">Course ID</th>
                    <th style="text-align:center;">Course Name </th>
                    <th width="200" style="text-align:center;">Option </th>
                </tr>
                </thead>

                <tbody>
                @foreach($inchargecourse as $courses)
                    <tr>
                        <td class="label_num" style="text-align:center;"> </td>
                        <td style="text-align:center;">{!! $courses->courseID !!}</td>
                        <td>{!! $courses->courseName !!}</td>
                        <td style="text-align:center;">
                            <a href="{{url('view_module/'.$courses->courseID)}}" class="btn btn-primary">View Module</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div> <!-- End of table-responsive -->

    </div> <!-- End of Bottom row -->

@endsection
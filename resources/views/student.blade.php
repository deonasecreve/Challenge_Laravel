@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Je bent student
                    <table class="table table-bordered table-hover">
					    <tr>
					        <th>Examen</th>
					        <th>Datum</th>
					    </tr>

					    @foreach ($exams as $exam)
					        <tr>
					            <td>{{ $exam->name }}</td>
					            <td>{{ $exam->time }}</td>
					        </tr>
					    @endforeach
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
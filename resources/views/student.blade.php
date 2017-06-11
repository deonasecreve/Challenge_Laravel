@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has("status"))
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p class="alert alert-danger">{{ Session::get("status") }}</p>
		</div>
	</div>
@endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }} (Student)</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover">
					    <tr>
					        <th>Examen</th>
					        <th>Datum</th>
					        <th colspan="2">Status</th>
					    </tr>

					    @foreach ($exams as $exam)
					        <tr>
					            <td>{{ $exam->name }}</td>
					            <td>{{ $exam->time }}</td>
					            @if ($exam->pivot->accepted == $status::UNKNOWN)
									<td>
						            	<a href="exam/{{ $exam->id }}/accept">Accepteren</a>
						            </td>
	    							<td>
	    								<a href="exam/{{ $exam->id }}/reject">Afwijzen</a>
	    							</td>
					            @else
					            	<td>
					            		{{ $exam->pivot->accepted == $status::ACCEPTED ? "Geaccepteerd" : "Afgewezen" }}
					            	</td>
					            @endif
					        </tr>
					    @endforeach
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
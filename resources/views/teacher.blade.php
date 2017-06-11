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
                <div class="panel-heading">Docent</div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Examen</th>
                            <th>Datum</th>
                            <th>Actie:</th>
                        </tr>

                        @foreach ($exams as $exam)
                            <tr>
                                <td>{{ $exam->name }}</td>
                                <td>{{ $exam->time }}</td>
                                <td>
                                    <a href="edit/{{ $exam->id }}">Bewerken/Cijfers</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Studenten</div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Wachtwoord</th>
                            <th>Actie:</th>
                        </tr>

                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    *********
                                </td>
                                <td>
                                    <a href="edit/student/{{ $student->id }}">Bewerken/Verwijderen</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <a href="new/student">Nieuwe student aanmaken</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
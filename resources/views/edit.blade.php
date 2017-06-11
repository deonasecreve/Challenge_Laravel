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
                            <th>Naam</th>
                            <th>Geaccepteerd</th>
                            <th>Cijfer</th>
                        </tr>
                    @foreach ($results as $result)
                        <tr>
                            <td>{{ $result->name }}</td>
                            <td>{{ $result->pivot->accepted ? "Ja" : "Nee" }}</td>
                            <td>
                                @if ($result->pivot->result)
                                    {{ $result->pivot->result }}
                                @else
                                    <i>Geen cijfer bekend</i>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
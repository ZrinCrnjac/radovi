@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Uređivanje korisnika
                </div>
                <div class="card-body">
                    <form method="post" action="{{  route('update') }}" >
                        <input type="hidden" name="userId" value="{{ $data->id}}">
                        {{ csrf_field() }}
                        <table class="table table-striped project-table">
                                <thead>
                                    <th>Ime</th>
                                    <th>E-mail</th>
                                    <th>Uloga</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-text"><div>{{ $data->name }}</div></td>
                                        <td class="table-text"><div>{{ $data->email }}</div></td>
                                        <td>
                                            <select class="form-control" name="role">
                                                <option value="admin" 
                                                @if ($data->role=='admin')selected="selected" 
                                                @endif>admin</option>

                                                <option value="student"
                                                @if ($data->role=='student')selected="selected"
                                                @endif>student</option>

                                                <option value="nastavnik"
                                                @if ($data->role=='nastavnik')selected="selected"
                                                @endif>nastavnik</option>

                                            </select>
                                        </td>
                                </tbody>
                        </table>
                        <button type="submit" name="submit" class="btn btn-success">Spremi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Nastavnik dashboard</div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <form method="POST" action="{{ route('nastavnik.task') }}" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Naziv rada</label>
                        <div class="col-sm-6">
                            <input type="text" name="naziv_rada" id="task-name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task-name-en" class="col-sm-6 control-label">Naziv rada na engleskom</label>
                        <div class="col-sm-6">
                            <input type="text" name="naziv_rada_en" id="task-name-en" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Zadatak rada</label>
                        <div class="col-sm-6">
                            <input type="text" name="zadatak_rada" id="task" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="task-type" class="col-sm-3 control-label">Tip studija</label>
                        <div class="col-sm-6">
                            <select name="tip_studija">
                                <option value="preddiplomski" selected="selected">Preddiplomski</option>
                                <option value="diplomski">Diplomski</option>
                                <option value="stručni">Stručni</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">Dodaj rad</button>
                        </div>
                    </div>

                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif

                    @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}">
                            {!! session('message.content') !!}
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Vaši objavljeni radovi
            </div>
            <div class="card-body">
                <table class="table table-striped project-table">
                    <thead>
                        <th>Naziv rada</th>
                        <th>Naziv rada (engleski)</th>
                        <th>Odabrani student</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($data as $task)
                            <tr>
                                <td class="table-text"><div>{{ $task->naziv_rada }}</div></td>
                                <td class="table-text"><div>{{ $task->naziv_rada_en }}</div></td>
                                <td class="table-text"><div>{{ $task->assignee }}</div></td>
                                <td><a href="{{ route('nastavnik.task.students', $task->id) }}">
                                    <button class="btn btn-success">Odaberi studenta</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
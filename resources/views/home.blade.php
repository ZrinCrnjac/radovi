@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Popis radova</div>

                <div class="card-body">
                    @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}">
                            {!! session('message.content') !!}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('student.task') }}">
                        {{ csrf_field() }}
                        <table class="table table-striped project-table">
                            <thead>
                                <th>Naziv rada</th>
                                <th>Naziv rada (engleski)</th>
                                <th>Zadatak rada</th>
                                <th>Tip studija</th>
                                <th>Nastavnik</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($data as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->naziv_rada }}</div></td>
                                        <td class="table-text"><div>{{ $task->naziv_rada_en }}</div></td>
                                        <td class="table-text"><div>{{ $task->zadatak_rada }}</div></td>
                                        <td class="table-text"><div>{{ $task->tip_studija }}</div></td>
                                        <td class="table-text"><div>{{ $task->nastavnik }}</div></td>
                                        <td class="table-text">
                                            @if ($task->disabled)
                                                <button type="submit" class="btn btn-danger col-md-12"
                                                    name="detach" value={{ $task->id }}>Ukloni prijavu
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-primary col-md-12"
                                                    name="attach" value={{ $task->id }}>Odaberi rad
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

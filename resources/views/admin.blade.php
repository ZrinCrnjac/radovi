@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Adminsko sučelje - korisnici
                </div>
                <div class="card-body">
                    <table class="table table-striped project-table">
                        <thead>
                            <th>Ime</th>
                            <th>E-mail</th>
                            <th>Uloga</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td class="table-text"><div>{{ $user->name }}</div></td>
                                    <td class="table-text"><div>{{ $user->email }}</div></td>
                                    <td class="table-text"><div>{{ $user->role }}</div></td>
                                    <td><a href="{{ route('edit', $user->id) }}">
                                        <button class="btn btn-success col-md-12">Uredi</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
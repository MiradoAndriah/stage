@extends('layout');
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<h3 class="text-dark text-center">List of appart</h3>
    <table class="fl-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name of building</th>
                <th>Floor</th>
                <th>Logement</th>
                <th>rent in Ar</th>
                <th>Created at</th>
                <th>Update at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apparts as $appart)    
            <tr>
                <td>{{$appart ->id}}</td>
                <td>{{$appart ->batiment->nom_de_batiment ?? '-'}}</td>
                <td>{{$appart ->etage}}</td>
                <td>{{$appart ->logement}}</td>
                <td>{{$appart ->loyer}}</td>
                <td>{{$appart ->created_at}}</td>
                <td>{{$appart ->updated_at}}</td>
                <td>
                    <a href="{{ route('appart.edit',$appart->id) }}" type="submit" class="btn border btn-primary mt-1">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@extends('layout');
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<h3 class="text-dark text-center">List of Contract</h3>
    <table class="fl-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>type</th>
                <th>Name of locataire</th>
                <th>Name of building</th>
                <th>Name of appart</th>
                <th>floor</th>
                <th>Address</th>
                <th>Ville</th>
                <th>Loyer</th>               
                <th>Facture</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($occuped as $liste)
            <tr>
                <td>{{$liste ->id}}</td>
                <td>{{$liste->locataire->type ?? '—'}} </td>
                <td>{{$liste->locataire->nom ?? '—'}}</td>
                <td>{{$liste->batiment->nom_de_batiment ?? '—'}}</td>
                <td>{{$liste->appart->logement ?? '—'}}</td>
                <td>{{$liste->appart->etage ?? '—'}}</td>
                <td>{{ $liste->adresse }} </td>
                <td>{{ $liste->ville }} </td>
                <td>{{ $liste->appart->loyer ?? '-' }} </td>
                <td><a href="{{ route('facture.create') }}" class="btn border border-primary mt-1">Create</a></td>
                <td>
                    <div class="flex">
                    <a href="{{ route('occuped.edit',$liste->id) }}" type="submit" class="btn border btn-primary mt-1">Edit</a>
                    <form action="{{ route('occuped.destroy',$liste->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger border ms-1 mt-1" onclick="return confirm('confirm DELETE')">Delete</button>
                    </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
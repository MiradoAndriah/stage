@extends('layout')
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<h3 class="text-dark text-center">List of locataire</h3>

<table class="fl-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Mail</th>
            <th>Cin</th>
            <th>Nif</th>
            <th>Stat</th>
            <th>Address</th>
            <th>Statut</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($locataires as $locataire)
        <tr>
            <td>{{$locataire->id}}</td>
            <td>{{$locataire->type}}</td>
            <td>{{$locataire->nom}}</td>
            <td>{{$locataire->contact}}</td>
            <td>{{$locataire->mail ?? '-'}}</td>
            <td>{{$locataire->cin ?? '-'}}</td>
            <td>{{$locataire->nif ?? '-'}}</td>
            <td>{{$locataire->stat ?? '-'}}</td>
            <td>{{$locataire->adresse ?? '-'}}</td>
            <td>@if ($locataire->statut === 'actif')
                    <span class="badge bg-success">Actif</span>
                @elseif ($locataire->statut === 'inactif')
                    <span class="badge bg-secondary">Inactif</span>
                @else
                    <span class="badge bg-danger">Blacklist</span>
                @endif
            </td>
            <td>
                <a href="{{ route('home.edit', $locataire->id) }}" type="submit" class="btn border btn-primary mt-1">Edit</a>
                <a href="{{ route('home.show',$locataire ->id )}}" type="submit" class="btn ms-1 mt-1">Show</a>
                    
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
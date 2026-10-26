@extends('layout');
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<h3 class="text-dark text-center">List of building</h3>
    <table class="fl-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Update</th>
                <th>Action</th>
            </tr>
        <tbody>
            @foreach ($batiments as $batiment)
                <tr>
                    <td>{{$batiment->id}}</td>
                    <td>{{$batiment->nom_de_batiment}}</td>
                    <td>{{$batiment->created_at}}</td>
                    <td>{{$batiment->updated_at}}</td>
                    <td>
                        <a href="{{ route('batiment.edit',$batiment->id) }}" type="submit" class="btn border btn-primary mt-1">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
@endsection
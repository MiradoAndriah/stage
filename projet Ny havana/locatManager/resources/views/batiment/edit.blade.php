@extends('layout')
@section('content')
<h3 class="text-center">Edit a batiment</h3>
    <form action="{{ route('batiment.update',$batiment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom" class="form-label">Name of batiment</label>
        <input type="text" class="form-control" name="nom_de_batiment" value="{{ old('nom_de_batiment') ?? $batiment->nom_de_batiment }}">
        @error('nom_de_batiment')
            <li class="smal text-danger list-unstyled">{{$message}}</li>
        @enderror
        <button type="submit" class="btn border mt-3 bg-primary text-white">update</button>
    </form>
@endsection
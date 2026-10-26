@extends('layout')
@section('content')
    <h3 class="text-center">insert a batiment</h3>
    <form action="{{ route('batiment.store') }}" method="POST">
        @csrf
        <label for="nom" class="form-label">name of batiment</label>
        <input type="text" class="form-control" name="nom_de_batiment">
        @error('nom_de_batiment')
            <li class="smal text-danger list-unstyled">{{$message}}</li>            
        @enderror
        <button type="submit" class="btn border mt-3 bg-primary text-white">insert</button>
    </form>
@endsection
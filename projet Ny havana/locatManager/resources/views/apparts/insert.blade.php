@extends('layout');
@section('content')
    <h3 class="text-center">insert appartement </h3>

    <form action="{{ route('appart.store') }}" method="POST">
        @csrf
        <label for="id_batiment" class="form-label mt-3">select your building</label>
        <select name="id_batiment" id="id_batiment" class="form-control">
            <option value="" disabled {{ old('id_batiment') ? :'selected'}}>
                -- Chose --
            </option>
            @foreach ($batiments as $batiment)
                <option value="{{ $batiment->id }}">{{$batiment->nom_de_batiment}}</option>
            @endforeach
        </select>
        <div>
            <label for="etage" class="form-label mt-3">floor</label>
            <input type="number" name="etage"class="form-control" id="etage" requiered value="{{ old('etage') }}">
        </div>
        <div>
            <label for="logement" class="form-label mt-3">housing</label>
            <input type="text" name="logement"class="form-control @error('logement')border border-danger @enderror" id="logement" requiered value="{{ old('logement') }}">
            @error('logement')
                <li class="smal text-danger list-unstyled">{{$message}}</li>
            @enderror
        </div>

        <div>
            <label for="loyer" class="form-label mt-3">Rent</label>
            <input type="number" name="loyer"class="form-control" id="loyer" requiered value="{{ old('loyer') }}">
        </div>

        <button type="submit" class="btn border border-1 mt-3 bg-primary text-white">insert</button>
    </form>
@endsection
@extends('layout');
@section('content')
    <h3 class="text-center">Update a Contract</h3>
    <form action="{{ route('occuped.update',$contract->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="id_locataire" class="form-labels mt-3">insert locataire :</label>
        <select name="id_locataire" id="id_locataire" class="form-control">
            @foreach ($locataires as $locataire)
                <option {{ old('id_locataire',$contract->id_locataire) == $locataire->id ? 'selected' : '' }} value="{{ $locataire->id }}">{{$locataire ->nom}}</option>
            @endforeach
        </select>

        <label for="id_batiment" class="form-labels mt-3">insert building :</label>
        <select name="id_batiment" id="id_batiment" class="form-control" value="{{ old('id_batiment') }}">
            @foreach ($batiments as $batiment)
                <option {{ old('id_batiment', $contract->id_batiment) == $batiment->id ? 'selected' : '' }} value="{{ $batiment ->id }}">{{$batiment ->nom_de_batiment}}</option>
            @endforeach
        </select>

        <div>
        <label for="id_appart" class="form-labels mt-3">insert appartement :</label>
        <select name="id_appart" id="id_appart" class="form-control @error('id_appart') border border-danger @enderror">
            @foreach ($apparts as $appart)
                <option {{ old('id_appart', $contract->id_appart) == $appart->id ? 'selected' : '' }} value="{{ $appart ->id }}">{{$appart ->logement}}</option>
            @endforeach
        </select>
        @error('id_appart')
            <li class="smal text-danger list-unstyled">{{$message}}</li>
        @enderror
        </div>

        <button class="btn border mt-3 bg-primary">update</button>
    </form>
@endsection
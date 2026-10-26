@extends('layout');
@section('content')
    <h3 class="text-center">insert the facture</h3>
   <form action="{{ route('facture.store') }}" method="POST">
    @csrf
        <label for="locataire_id" class="form-label mt-3">insert locataire</label>
        <select name="locataire_id" id="locataire_id" class="form-control" required>
            <option value="" selected disabled>--Cose a locataire--</option>
            @foreach ($locataires as $locataire)               
                <option value="{{ $locataire ->id }}">{{$locataire ->nom}}</option>
            @endforeach
        </select>

         <label for="loyer" class="form-label mt-3">insert monthly rent</label>
        {{--<input type="number" name="loyer" id="loyer" class="form-control" required> --}}
        <select name="loyer" id="loyer" class="form-control">
            <option value="" selected disabled>select appart</option>
            @foreach ($apparts as $appart)
            <option value="{{ $appart->loyer }}">{{ $appart->logement}}</option>
            @endforeach
                
        </select>

        <label for="charge_commune" class="form-label mt-3">common load</label>
        <input type="number" name="charge_commune" id="charge_commune" class="form-control" required>

        <button class="btn mt-3 border bg-primary">insert</button>
   </form>
@endsection
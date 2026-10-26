@extends('layout')
@section('content')
<h3 class="text-dark text-center">Edit a locataire</h3>
    <form action="{{ route('home.update',$locataires->id) }}" method="POST">
    @csrf
    @method('PUT')
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-control" required>
            <option value="" {{old('type')?'selected': $locataires->type}} disabled>--Select type--</option>
            <option value="personne" {{old('type') == 'personne' ? 'selected' : ''}}>Personne</option>
            <option value="entreprise" {{old('type') == 'entreprise' ? 'selected' : ''}}>Entreprise</option>
        </select>

        <div>
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="name" class="form-control" required value="{{ old('nom') ?? $locataires->nom}}">
        </div>

        <div>
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" name="prenom" id="prenom" class="form-control"value="{{ old('prenom') ?? $locataires->prenom}}">
            @error('prenom')               
                <li class="smal text-danger list-unstyled">{{$message}}</li>
            @enderror
        </div>

        <div>
            <label for="contact" class="form-label">Contact</label>
            <input type="text" name="contact" id="contact" class="form-control" required value="{{ old('contact') ?? $locataires->contact}}">
        </div>

        <div>
            <label for="mail" class="form-label">Email</label>
            <input type="email" name="mail" id="mail" class="form-control" value="{{ old('mail')?? $locataires->mail }}">
        </div>

        <div>
            <label for="cin" class="form-label">CIN</label>
            <input type="number" name="cin" id="cin" class="form-control @error('cin')border border-danger @enderror" value="{{ old('cin') ?? $locataires->cin}}">
            @error('cin')               
                <li class="smal text-danger list-unstyled">{{$message}}</li>
            @enderror
        </div>

        <div>
            <label for="nif" class="form-label">Nif</label>
            <input type="number" name="nif" id="nif" class="form-control @error('nif')border border-danger @enderror" value="{{ old('nif') ?? $locataires->nif}}">
            @error('nif')               
                <li class="smal text-danger list-unstyled">{{$message}}</li>
            @enderror
        </div>

        <div>
            <label for="stat" class="form-label">Stat</label>
            <input type="number" name="stat" id="stat" class="form-control @error('stat')border border-danger @enderror" value="{{ old('stat') ?? $locataires->stat}}">
            @error('stat')               
                <li class="smal text-danger list-unstyled">{{$message}}</li>
            @enderror
        </div>

        <div>
            <label for="adresse" class="form-label">Address</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse')?? $locataires->adresse}}">
        </div>
        <button type="submit" class="btn mt-3 border rounded-2 bg-primary text-white"> Update</button>
    </form>
@endsection
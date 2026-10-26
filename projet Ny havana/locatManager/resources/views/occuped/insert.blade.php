@extends('layout');
@section('content')
    <h3 class="text-center">insert Contract</h3>
    <form action="{{ route('occuped.store') }}" method="POST">
        @csrf
        
        <label for="id_locataire" class="form-labels mt-3">insert locataire :</label>
        <select name="id_locataire" id="id_locataire" class="form-control">
            <option value="" disabled {{ old('id_locataire') ? '' : 'selected' }}>--Chose locataire--</option>
            @foreach ($locataires as $locataire)
                <option {{ old('id_locataire') == $locataire->id ? 'selected' : '' }} value="{{ $locataire->id }}">{{$locataire ->nom}}</option>
            @endforeach
        </select>

        <label for="id_batiment" class="form-labels mt-3">insert building :</label>
        <select name="id_batiment" id="id_batiment" class="form-control" value="{{ old('id_batiment') }}">
            <option value="" disabled {{old('id_batiment')?'':'selected'}}>--Chose building--</option>
            @foreach ($batiments as $batiment)
                <option {{ old('id_batiment')? 'selected' : '' }} value="{{ $batiment ->id }}">{{$batiment ->nom_de_batiment}}</option>
            @endforeach
        </select>

        <div>
        <label for="id_appart" class="form-labels mt-3">insert appartement :</label>
        <select name="id_appart" id="id_appart" class="form-control @error('id_appart') border border-danger @enderror">
            <option value="" {{old('id_appart') ? :'selected'}} disabled>--Chose appart--</option>
            @foreach ($apparts as $appart)
                <option {{ old('id_appart')? 'selected' : '' }} value="{{ $appart ->id }}">{{$appart ->logement}}</option>
            @endforeach
        </select>
        @error('id_appart')
            <li class="smal text-danger list-unstyled">{{$message}}</li>
        @enderror
        </div>

        <label for="adresse" class="form-label mt-3">Address</label>
        <select name="adresse" id="adresse" class="form-control">
            <option value="" disabled selected>-- Select an address --</option>

<option value="Immeuble 67 Ha">Immeuble 67 Ha</option>
<option value="Ankorondrano">Ankorondrano</option>
<option value="Analamahitsy">Analamahitsy</option>
<option value="18 Avenue de l’Indépendance, Analakely">18 Avenue de l’Indépendance, Analakely</option>
<option value="20 Avenue de l’Indépendance, Analakely">20 Avenue de l’Indépendance, Analakely</option>
<option value="Ambatomena">Ambatomena</option>
<option value="Ambohibao">Ambohibao</option>
<option value="Ambohimangakely">Ambohimangakely</option>
<option value="Ankadifotsy">Ankadifotsy</option>
<option value="Itaosy">Itaosy</option>
<option value="Ambohitrimanjaka">Ambohitrimanjaka</option>

<option value="Antsiranana">Antsiranana</option>
<option value="Mahajanga">Mahajanga</option>
<option value="Antsirabe">Antsirabe</option>
<option value="Sambava">Sambava</option>
<option value="Toamasina">Toamasina</option>
<option value="Moramanga">Moramanga</option>

        </select>

        <label for="ville" class="form-label mt-3">Country</label>
        <select name="ville" id="ville" class="form-control">
            <option value="" disabled selected>-- Select a city --</option>

<option value="Antananarivo">Antananarivo</option>
<option value="Antsirabe">Antsirabe</option>
<option value="Moramanga">Moramanga</option>
<option value="Toamasina">Toamasina</option>
<option value="Mahajanga">Mahajanga</option>
<option value="Antsiranana">Antsiranana</option>
<option value="Sambava">Sambava</option>

        </select>

        <button class="btn border mt-3 bg-primary">insert</button>
    </form>

<script>
const adresseVille = {
    "Immeuble 67 Ha": "Antananarivo",
    "Ankorondrano": "Antananarivo",
    "Analamahitsy": "Antananarivo",
    "18 Avenue de l’Indépendance, Analakely": "Antananarivo",
    "20 Avenue de l’Indépendance, Analakely": "Antananarivo",
    "Ambatomena": "Antananarivo",
    "Ambohibao": "Antananarivo",
    "Ambohimangakely": "Antananarivo",
    "Ankadifotsy": "Antananarivo",
    "Itaosy": "Antananarivo",
    "Ambohitrimanjaka": "Antananarivo",

    "Antsiranana": "Antsiranana",
    "Mahajanga": "Mahajanga",
    "Antsirabe": "Antsirabe",
    "Sambava": "Sambava",
    "Toamasina": "Toamasina",
    "Moramanga": "Moramanga"
};

document.getElementById("adresse").addEventListener("change", function () {
    const villeSelect = document.getElementById("ville");
    villeSelect.innerHTML = '<option value="" disabled>-- Select a city --</option>';

    const ville = adresseVille[this.value];
    if (ville) {
        villeSelect.innerHTML += `<option value="${ville}" selected>${ville}</option>`;
    }
});
</script>

@endsection
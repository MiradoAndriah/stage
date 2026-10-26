@extends('layout')
@section('content')
 <h3 class="text-center">Insert a payment</h3>
    <form action="{{ route('payment.store') }}" method="POST">
        @csrf

        <label for="locataire_id" class="form-label mt-3">Id locat</label>
        <select name="locataire_id" id="locataire_id" class="form-control">
            <option value="" selected disabled>Select locat</option>
            @foreach ($locataires as $locataire)
            <option value="{{ $locataire->id }}">{{$locataire->nom}}</option>
            @endforeach
        </select>

        <label for="appart_id" class="form-label mt-3">appart</label>
        <select name="appart_id" id="appart_id" class="form-control">
            <option value="" selected disabled>Select appart</option>
            @foreach ($apparts as $appart)
            <option value="{{ $appart->id }}">{{$appart->logement}}</option>
            @endforeach
        </select>
                
        <label for="amount" class="form-label mt-3">Amount</label>
        <input type="number" class="form-control" name="amount">
        @error('amount')
            <li class="smal text-danger list-unstyled">{{$message}}</li>            
        @enderror

        <label for="payment_date" class="form-label mt-3"> payment_date</label>
        <input type="date" class="form-control" name="payment_date">
        @error('payment_date')
            <li class="smal text-danger list-unstyled">{{$message}}</li>            
        @enderror

        <label for="payment_method" class="form-label mt-3">Payment method</label>
        <input type="text" class="form-control" name="payment_method">
        @error('payment_method')
            <li class="smal text-danger list-unstyled">{{$message}}</li>            
        @enderror

        <label for="month" class="form-label mt-3">Month</label>
        <select name="month" id="month" class="form-control">
            <option value="Janvier">Janvier</option>
            <option value="Fevrier">Février</option>
            <option value="Mars">Mars</option>
            <option value="Avril">Avril</option>
            <option value="Mai">Mai</option>
            <option value="Juin">Juin</option>
            <option value="Juillet">Juillet</option>
            <option value="Août">Août</option>
            <option value="Septembre">Septembre</option>
            <option value="Octobre">Octobre</option>
            <option value="Novembre">Novembre</option>
            <option value="Decembre">Décembre</option>
        </select>

        <label for="year" class="form-label mt-3">year</label>
        <input type="number" class="form-control" name="year">

        <label for="status" class="form-label mt-3">status</label>
        <input type="text" class="form-control" name="status">
        @error('status')
            <li class="smal text-danger list-unstyled">{{$message}}</li>            
        @enderror
        <button type="submit" class="btn border mt-3 bg-primary text-white">insert</button>
    </form>
@endsection
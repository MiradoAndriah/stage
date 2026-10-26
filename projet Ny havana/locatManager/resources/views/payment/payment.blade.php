@extends('layout')
@section('content')
<h3 class="text-dark text-center">List of Payment</h3>
<table class="fl-table">
    <thead>
        <th>id</th>
        <th>id_locat</th>
        <th>appart</th>
        <th>Amount</th>
        <th>Payment date</th>
        <th>Payment method</th>
        <th>month</th>
        <th>year</th>
        <th>status</th>

    </thead>
    <tbody>
        @foreach ($payments as $payment)
        <tr>

            <td>{{ $payment->id }} </td>
            <td>{{ $payment->locataire_id }} </td>
            <td>{{ $payment->appart->logement ?? '-' }}</td>
            <td>{{ $payment->amount }}</td>
            <td>{{ $payment->payment_date }}</td>
        <td>{{ $payment->payment_method }}</td>
        <td>{{ $payment->month }}</td>
        <td>{{ $payment->year }}</td>
        <td>{{ $payment->status }}</td>
    </tr>
        
        @endforeach
    </tbody>
</table>
<div class="flex">
    <a href="{{ route('payment.create') }}" class='nav-link border w-10 text-center bg-primary text-white'>+</a>
    <a href="" class='nav-link border ms-2 text-center bg-primary text-white'>year</a>
    <a href="" class='nav-link border ms-2 text-center bg-primary text-white'>month</a>
    <a href="" class='nav-link border ms-2 text-center bg-primary text-white'>appart</a>
</div>
@endsection
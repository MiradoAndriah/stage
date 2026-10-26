@extends('layout')
@section('content')
<div>
    <span class="fw-bold">Id : </span>
    <span class="text-success">{{$show->id}}</span>
</div>

<div>
    <span class="fw-bold">Name : </span>
    <span class="text-success">{{ $show ->nom }}</span>
</div>

<div>
    <span class="fw-bold">First name : </span>
    <span class="text-success">{{ $show ->prenom }}</span>
</div>

<div>
    <span class="fw-bold">Contact : </span>
    <span class="text-success">{{ $show ->contact }}</span>
</div>

<div>
    <span class="fw-bold">Email : </span>
    <span class="text-success">{{ $show ->mail }}</span>
</div>

<div>
    <span class="fw-bold">CIN : </span>
    <span class="text-success">{{ $show ->cin }}</span>
</div>

<div>
    <span class="fw-bold">Nif : </span>
    <span class="text-success">{{ $show ->nif }}</span>
</div>

<div>
    <span class="fw-bold">Stat : </span>
    <span class="text-success">{{ $show ->stat }}</span>
</div>

<div>
    <span class="fw-bold">Address : </span>
    <span class="text-success">{{ $show ->adresse }}</span>
</div>
@endsection
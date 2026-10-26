@extends('layout');
@section('content')
    <table class="fl-table">
        <thead>
            <tr>
                <th>id</th>
                <th>type</th>
                <th>nom de locataire</th>
                <th>loyer</th>
                <th>charge commune</th>
                <th>TVA</th>
                <th>TOTAL</th>
                <th>fait le</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factures as $facture)
                <tr>
                    <td>{{$facture ->id}}</td>
                    <td>{{$facture->locataires->type }} </td>
                    <td>{{$facture ->locataires->nom}}</td>
                    <td>{{$facture ->loyer}}</td>
                    <td>{{$facture ->charge_commune}}</td>
                    <td>{{$facture ->tva}}</td>
                    <td>{{$facture ->total}}</td>
                    <td>{{$facture ->created_at}}</td>
                    <td>
                        <div class="flex">
                            <a href="{{ route('facture.edit',$facture->id) }}" type="submit" class="btn border btn-primary mt-1">Edit</a>
                            <form action="{{ route('facture.destroy',$facture->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete?')" type="submit" class="btn btn-danger border ms-1 mt-1">Delete</button>
                            </form>
                            <a href="{{ route('facture.show',$facture->id) }}" type="submit" class="btn ms-1 mt-1">Show</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
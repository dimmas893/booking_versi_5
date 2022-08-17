@extends('layouts.template')

@section('content')  
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Expandable Table</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <th>NO INVOICE</th>
                        <th>NAME</th>
                        <th>KAMAR</th>
                        <th>JUMLAH KAMAR</th>
                        <th>TAGIHAN</th>
                        <th>BUKTI BAYAR</th>
                        <th>STATUS</th>
                        <th>TANGGAL</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        @foreach ($booking as $p)
                            <tr>
                                <td>{{ $p->no_invoice }}</td>
                                <td>{{ $p->user->name }}</td>
                                <td>{{ $p->products->name }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->tagihan }}</td>
                                <td><img src="{{ asset('storage/'.$p->bukti_bayar) }}" class="img-fluid" width="50px"></td>
                                <td>{{ $p->status->name }}</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>
                                    <a href="{{ route('booking-edit',['id' => $p->id]) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <a href="{{ route('booking-delete',['id' => $p->id]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
         </div>
    </div>
</div>

@endsection
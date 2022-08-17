@extends('layouts.template')

@section('content')  
    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header">
                        Confirmation Booking
                    </div>
                <div class="card-body">
                    <p class="card-text"><img src="{{ asset('storage/'.$booking->bukti_bayar) }}" class="img-fluid" width="50px"></p>
                    <p class="card-text">#{{ $booking->no_invoice }}</p>
                    <p class="card-text">{{ $booking->products->name }}</p>
                    <p class="card-text">{{ $booking->user->name }}</p>
                    <p class="card-text">{{ $booking->status->name }}</p>
                    <p class="card-text">{{ $booking->jumlah }}</p>
                    <p class="card-text">{{ $booking->tagihan }}</p>
                    <form action="{{ route('booking-update',['id' => $booking->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Konfirmasi</label>
                                <select name="status_id" class="form-control">
                                    @foreach ($status as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                        </div> 
                        <button type="submit" class="btn btn-success text-right">Simpan</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    {{ $booking->tanggal }}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
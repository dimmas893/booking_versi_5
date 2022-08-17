<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = [
        'bukti_bayar',
        'no_invoice',
        'tanggal',
        'products_id',
        'users_id',
        'status_id',
        'jumlah',
        'tagihan',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}

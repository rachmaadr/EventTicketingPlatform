<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'code',
        'event_id',
        'name',
        'email',
        'status',
        'fee_price',
        'unique_price',
        'total_price',
        'payment_method'
    ];

    //Relasi Ke Event
    public function event(){
        return $this->belongsTo(event::class);
    }

    //Relasi Ke Transaction Details
    public function transaction_detail(){
        return $this->hasMany(transaction_detail::class);
    }
}

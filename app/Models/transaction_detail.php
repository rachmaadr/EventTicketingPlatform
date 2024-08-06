<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'ticket_id',
        'transaction_detail',
        'is_redeemed',
    ];

    public function ticket(){
        return $this->belongsTo(ticket::class);
    }

    public function transaction(){
        return $this->belongsTo(transaction::class);
    }
}

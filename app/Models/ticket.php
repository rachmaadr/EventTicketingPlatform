<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'event_id',
        'name',
        'price',
        'quantity',
        'max_buy',
    ];

    //Relasi ke Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

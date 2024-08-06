<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory, SoftDeletes;
    Protected $fillable =[
        'name',
        'icon'
    ];

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function scopeSortbyMostEvents($query){
        return $query->withCount('events')->orderBy('events_count', 'desc');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'headline',
        'description',
        'start_time',
        'location',
        'duration',
        'is_popular',
        'photos',
        'type',
        'category_id'
    ];
    protected $casts = [
        'photos' => 'array',
        'start_time' => 'datetime'
    ];

    public function tickets(){
        return $this->hasMany(ticket::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }

    //Untuk menampilkan harga termurah dalam event
    public function getStartFromAttribute(){
        return $this->tickets()->orderBy('price')->first()->price ?? 0;
    }

    //Untuk Mengambil gambar dari atribut, jika tidak ada maka akan dikembalikan ke foto default
    public function getThumbnailAttribute(){
        $photos = $this->photos;

        if ($photos && !empty($photos)) {
            # code...
            return Storage::url($photos[0]);
        }

        return asset('assets/images/event-1.webp');
    }


    public function scopeWithCategory($query, $category){
        return $query->where('category_id', $category);
    }

    // Scope query untuk mengambil event yang akan datang
    public function scopeUpcoming($query){
        return $query->orderBy('start_time', 'asc')->where('start_time','>=', now());
    }

    // Scope query untuk mencari event dari slug
    public function scopeFetch($query, $slug){
        return $query->with(['tickets', 'category'])
        ->withCount('tickets')
        ->where('slug', $slug)
        ->firstOrFail();
    }
}
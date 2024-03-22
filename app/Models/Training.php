<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'youtube_url',
        'trailer_url',
        'description',
        'map_location',
        'address',
        'category_id',
        'mentor_id',
        'price',
        'system',
        'level',
        'training_info'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id', 'id');
    }

    public function userTrainings()
    {
        return $this->hasMany(UserTraining::class, 'training_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(TransactionTraining::class, 'training_id', 'id');
    }

    public function testimonialTrainings()
    {
        return $this->hasMany(TestimonialTraining::class, 'training_id', 'id');
    }
}

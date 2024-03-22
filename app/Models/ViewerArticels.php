<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewerArticels extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'articel_id'
    ];

    public function articel()
    {
        return $this->belongsTo(Articel::class);
    }
}

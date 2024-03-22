<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'profile_picture',
        'username',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function trainings()
    {
        return $this->hasMany(Training::class, 'mentor_id', 'id');
    }

    public function userTrainings()
    {
        return $this->hasMany(UserTraining::class, 'user_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(TransactionTraining::class, 'user_id', 'id');
    }


    public function testimonialTrainings()
    {
        return $this->hasMany(TestimonialTraining::class, 'user_id', 'id');
    }

    public function articles()
    {
        return $this->hasMany(Articel::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }

    public function transactionProducts()
    {
        return $this->hasMany(TransactionProduct::class, 'user_id', 'id');
    }

    public function productPayments()
    {
        return $this->hasMany(ProductPayment::class, 'user_id', 'id');
    }
}

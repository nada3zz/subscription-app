<?php

namespace App\Models\Plan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class Plan extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'price'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

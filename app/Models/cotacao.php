<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cotacao extends Model
{
    use HasFactory;
    protected $fillable=['id_user','coin','name','high','low'];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'id', 'id_user');
    }
}

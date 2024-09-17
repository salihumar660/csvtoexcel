<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAddress extends Model
{
    use HasFactory;

    protected $table = 'users_address';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'address'];

    public $timestamps = true;

    //relation with users tb
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

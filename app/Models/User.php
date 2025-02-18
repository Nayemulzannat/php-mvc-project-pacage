<?php

namespace App\Models;

class User extends BaseModel
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['user', 'password'];

    // Find user by username
    public static function findByUsername($username)
    {
        return self::where('user', $username)->first();
    }
}

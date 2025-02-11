<?php

namespace App\Models;

class User extends BaseModel
{
    protected $table = 'users'; // Define table name
    protected $primaryKey = 'id';
    protected $fillable = ['user', 'password']; // Mass assignable attributes

    // Find user by username
    public static function findByUsername($username)
    {
        return self::where('user', $username)->first();
    }
}

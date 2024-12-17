<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petunjuk extends Model
{
    use HasFactory;
    protected $table = 'petunjuk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_petunjuk',
        'nama_petunjuk',
        'header',
        'description',
        'order',
    ];
}

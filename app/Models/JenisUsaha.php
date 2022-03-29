<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'jenis_usaha_id';
    protected $table = 'jenis_usaha';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['jenis_usaha_id'];
}

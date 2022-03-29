<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $primaryKey = 'detail_transaksi_id';
    protected $table = 'detail_transaksi';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['detail_transaksi_id'];
}

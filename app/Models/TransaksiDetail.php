<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
	protected $primaryKey = 'ltdid';
    protected $table = 'list_transaksi_d';
    // protected $guarded = ['gambar'];
    protected $fillable = ['ltid', 'id', 'jml'];



}

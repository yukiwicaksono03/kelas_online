<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $primaryKey = 'ltid';
    protected $table = 'list_transaksi';
    // protected $guarded = ['gambar'];
    protected $fillable = ['nama', 'session_id', 'notes', 'tgl_booking', 'jml_org', 'tipe_order'];



}

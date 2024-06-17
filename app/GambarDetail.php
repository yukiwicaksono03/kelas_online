<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarDetail extends Model
{
	protected $primaryKey = 'gid';
    protected $table = 'gambar_detail';
    // protected $guarded = ['gambar'];
    protected $fillable = ['gid', 'lokasi'];

}

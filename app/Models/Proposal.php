<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
	protected $primaryKey = 'lpid';
    protected $table = 'list_proposal';
    // protected $guarded = ['gambar'];
    protected $fillable = ['ltid', 'nama', 'phone', 'email', 'alamat'];



}

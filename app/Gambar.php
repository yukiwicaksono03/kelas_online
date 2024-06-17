<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
	protected $primaryKey = 'gid';
    protected $table = 'gambar';
    // protected $guarded = ['gambar'];
    protected $fillable = ['nama', 'lokasi', 'lokasi2', 'lokasi3', 'lokasi4', 'deskripsi', 'kategori', 'sub_kategori', 'is_aktif', 'harga'];

    // public function gettglawal()
    // {        
    //     if($this->tgl_awal){
    //     $dateString = $this->tgl_awal;
    //     $timestamp = strtotime($dateString);
    //     $formattedDate = date("m/d/Y g:i A", $timestamp);
    //     }else{
    //     $formattedDate = date("m/d/Y g:i A");
    //     }
    //     return $formattedDate;
    // }
    // public function gettglakhir()
    // {
    //     if($this->tgl_akhir){
    //     $dateString = $this->tgl_akhir;
    //     $timestamp = strtotime($dateString);
    //     $formattedDate = date("m/d/Y g:i A", $timestamp);
    //     }else{
    //     $formattedDate = date("m/d/Y g:i A");
    //     }
    //     return $formattedDate;
    // }


}

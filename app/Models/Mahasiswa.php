<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'nim'; 
    public $incrementing = false;  
    protected $keyType = 'string';

    protected $fillable = ['nim', 'nama', 'kelas', 'matakuliah_id', 'user_id'];

    public function matakuliah() 
    { 
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['nama', 'nim', 'email', 'prodi'];
}

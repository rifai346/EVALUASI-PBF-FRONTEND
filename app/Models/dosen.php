<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'dosens';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['nama', 'nidn', 'email', 'prodi'];
}


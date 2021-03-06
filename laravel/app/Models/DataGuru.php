<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    public $table = "guru";
    use HasFactory;

    protected $fillable = ['name', 'nisn', 'jeniskelamin', 'umur', 'status', 'jabatan', 'mapel'];

}

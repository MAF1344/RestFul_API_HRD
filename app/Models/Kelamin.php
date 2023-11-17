<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelamin extends Model
{
    use HasFactory;

    // DATA KELAMIN SUDAH DIBUAT DARI DATABASE SEEDER, DAN TIDAK DAPAT DITAMBAHKAN ATAU DIKURANGI!!
    // menghubungkan model Kelamin dengan database kelamins
    protected $table = 'kelamins';

    // memberikan akses untuk foreign key ke table employees
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}

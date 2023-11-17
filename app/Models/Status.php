<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    // DATA STATUS SUDAH DIBUAT DARI DATABASE SEEDER
    // menghubungkan model Status dengan database Statuss
    protected $table = 'statuss';

    // memberikan akses untuk foreign key ke table employees
    public function status()
    {
        return $this->hasMany(Status::class);
    }
}

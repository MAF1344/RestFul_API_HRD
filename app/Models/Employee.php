<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // menghubungkan model Employee dengan database employees
    protected $table = 'employees';

    // mendeklarasikan kolom mana yang boleh diisi
    protected $fillable = ['nama', 'kelamin_id', 'phone', 'address', 'email', 'status_id', 'hired_on'];

    // Meminta data dari table kelamins
    public function kelamin()
    {
        return $this->belongsTo(Kelamin::class);
    }

    // Meminta data dari table statuss
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

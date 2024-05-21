<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equiments extends Model
{
    use HasFactory;
    public $table = "equiments";

    protected $fillable = [
        'id',
        'code_id',
        'name',
        'description',
        'responsible_name',
        'phone',
        'status'
    ];
}

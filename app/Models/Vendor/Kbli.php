<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kbli extends Model
{
    use HasFactory;
    protected $connection ='mysql2';
    protected $table = 'kbli';
}

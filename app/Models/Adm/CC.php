<?php

namespace App\Models\Adm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CC extends Model
{
    protected $connection='adm';
    protected $table= 'cc';
    protected $fillable = [
        'id_dispo',
        'cc_to',
        'id_penerima',
        'created_at',
    ];
}

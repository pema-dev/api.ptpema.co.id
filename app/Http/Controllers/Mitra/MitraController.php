<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra\Mitra;
use App\Http\Resources\PostResource;

class MitraController extends Controller
{
    public function index(){
       $data= Mitra::where('no_hp','1=', '')->get();
        return new PostResource(true, 'Data Mitra', $data);
    }
}

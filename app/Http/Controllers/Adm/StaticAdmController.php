<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Employe;
use App\Models\Organization;
use App\Models\Structure;
use Illuminate\Http\Request;

class StaticAdmController extends Controller
{
    public function getDivisi()
    {
        $data = Organization::where('is_division', 1)->where('board_id', Structure::where('employe_id', Employe::employeId())->first()->board_id)->get();
        $myData=Organization::where('organization_id', Structure::where('employe_id', Employe::employeId())->first()->organization_id)->first();

        return new PostResource(true, "Data Divisi", ['other_divisis'=>$data, 'my_divisi'=>$myData]);
    }
}

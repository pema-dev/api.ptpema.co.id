<?php

namespace App\Http\Controllers\eSign;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Structure;
use App\Models\ESign\Log;

class Logs extends Controller
{
    public function getLogs($id_doc){
        $data=Log::where('id_document', $id_doc)->latest()->get();
        foreach($data as $item){
            $item['first_name']=Structure::where('employe_id', $item->employe_id)->first('first_name')->first_name;
            $item['position_name']=Structure::where('employe_id', $item->employe_id)->first('position_name')->position_name;

        }
        return new PostResource(true, 'data logs', $data);
    }
}

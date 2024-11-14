<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Structure\BoardOrganization;

class OrganizationController extends Controller
{
    public function store(Request $request)
    {
        $board = BoardOrganization::where('board_code', $request->board_code)->first();

        $data = BoardOrganization::create([
            'board_id' => $board->board_id,
            'organization_code' => $request->organization_code,
            'organization_name' => $request->organization_name,
        ]);

        if(!$data){
            throw new HttpResponseException(response([
                'status' => false,
                'message' => 'Failed to create organization'
            ], 500));
        }

        return response()->json([
            'status' => true,
            'message' => 'Successfully created organization',
        ], 200);
    }

    public function insertCode()
    {
        $data = Organization::all();

        // generate 4 digit random number
        
        for ($i=0; $i < count($data); $i++) { 
            $code = mt_rand(1000, 9999);

            Organization::where('organization_id', $data[$i]['organization_id'])
                                ->update([
                                    'organization_code' => 'ORG'.$code
                                ]);
        }

        return response()->json([
            'data' => $data
        ], 200);
    }

    public function allOrganization()
    {
        $data = Organization::all();

        return response()->json([
            'data' => $data
        ], 200);
    }
}

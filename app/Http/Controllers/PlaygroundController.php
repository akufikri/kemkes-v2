<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaygroundController extends Controller
{
    use ApiResponder;

    public function index()
    {
        $data = DB::connection('supabase')
            ->table('DataVaccine')
            ->get();

        $response = [
            'count' => $data->count(),
            'data'  => $data
        ];

        return $this->success($response, "Successfully get data vaccine", 200);
    }
}

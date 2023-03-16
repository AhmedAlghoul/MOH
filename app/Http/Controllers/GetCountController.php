<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


class GetCountController extends Controller
{
    //

    //api route
    public function getToken()
    {
        $tokenResponse = Http::asForm()->post(
            'http://apps.moh.gov.ps/newwebemp/hr/v1/api/token',
            [
                'client_id' => 110012001300,
                'client_secret' => 115512551355
            ]
        );
        $tokenResponse = json_decode($tokenResponse);
        $token = $tokenResponse->result->token;
        return $token;
    }

    public function getCount(Request $request)
    {
        // dd($request->all());
        // dd($request->all());
        $token = $this->getToken();
        $countResponse = Http::withHeaders(['Authorization' => $token])
            ->post(
                'http://apps.moh.gov.ps/newwebemp/hr/v1/api/emp_count',
                [
                    'MANAGMENT_CODE' => $request->departmentid  ,
                    'JOB_TILTLE' =>  $request->choice_id_global == 2 ? $request->imported_data ?? ""  : "",
                    'CLASSIFICATION' => $request->choice_id_global == 1 ? $request->imported_data ?? "" : ""



                ]
            );
                //    dd($countResponse);

        $countResponse = json_decode($countResponse);
        // dd($countResponse);

        // dd($countResponse);
        return $countResponse->count;

    }
}

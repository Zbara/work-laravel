<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModelCarRequest;
use App\Http\Requests\UserDataRequest;
use App\Models\BrandCar;
use App\Models\SendUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'brand' => DB::table('brand_cars')->get()
        ]);
    }

    public function model(ModelCarRequest $request)
    {
        return response()
            ->json(DB::table('model_cars')->where('brand_id', '=',  $request->get('modelId'))->get());
    }

    public function result(UserDataRequest $request, SendUser $sendUser){

        $row = DB::table('model_cars')->where('brand_id', '=',  $request->get('brandId'))->where('model_id', '=',  $request->get('modelId'));

        if(isset($row)) {
            $sendUser->saveData($request->brandId, $request->modelId);

            return response()
                ->json(['result' => 1]);
        }
        return response()
            ->json(['result' => 0]);
    }
}

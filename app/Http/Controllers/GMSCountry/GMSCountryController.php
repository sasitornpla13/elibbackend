<?php

namespace App\Http\Controllers\GMSCountry;

use App\Models\Country\Country;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class GMSCountryController extends BaseController
{
    public function getCountryList()
    {
        // $result_country = Country::all();
        $result_country = Country::where('status', 1)->get();
        return response()->json($result_country);
    }

    public function newCountry(Request $request)
    {
        $newResult = new Country;
        $newResult->caption = $request->caption;
        $newResult->status = 1;
        $newResult->save();
        return response()->json('200');
    }

    public function updateCountry(Request $request)
    {
        $result_update_country = Country::find($request->id);
        $result_update_country->caption = $request->caption;
        $result_update_country->save();
        return response()->json('200');
    }

    public function deleteCountry($id)
    {
        // $result_country_id = Country::where('id', '=', $id)->delete();
        $result_country_id = Country::find($id);
        $result_country_id->status = 0;
        $result_country_id->save();
        return response()->json('200');
    }

}

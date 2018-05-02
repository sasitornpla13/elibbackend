<?php

namespace App\Http\Controllers\HelpCategories;

use App\Models\HelpCategories\HelpCategories;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class HelpCategoriesController extends BaseController
{
    public function getHelpCategoriesList()
    {
        $result_helpCategories = HelpCategories::all();
        return response()->json($result_helpCategories);
    }

    public function newHelpCategories(Request $request)
    {
        $newResult = new HelpCategories;
        $newResult->help_title = $request->help_title;
        $newResult->status = 1;
        $newResult->save();
        return response()->json('200');
    }

    public function updateHelpCategories(Request $request)
    {
        $result_update_helpCategories = HelpCategories::find($request->id);
        $result_update_helpCategories->help_title = $request->help_title;
        $result_update_helpCategories->save();
        return response()->json('200');
    }

    public function deleteHelpCategories($id)
    {
        $result_helpCategories_id = HelpCategories::where('id', '=', $id)->delete();
        return response()->json('200');
    }

}

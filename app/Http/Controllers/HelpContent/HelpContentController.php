<?php

namespace App\Http\Controllers\HelpContent;

use App\Models\HelpContent\HelpContent;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class HelpContentController extends BaseController
{
    public function getHelpContentList()
    {
        $result_helpContent = HelpContent::all();
        return response()->json($result_helpContent);
    }

    public function newHelpContent(Request $request)
    {
        $newResult = new HelpContent;
        $newResult->help_id = $request->help_id;
        $newResult->help_content = $request->help_content;
        $newResult->save();
        return response()->json('200');
    }

    public function updateHelpContent(Request $request)
    {
        $result_update_helpContent = HelpContent::find($request->id);
        $result_update_helpContent->help_content = $request->help_content;
        $result_update_helpContent->save();
        return response()->json('200');
    }

    public function deleteHelpContent($id)
    {
        $result_helpContent_id = HelpContent::where('id', '=', $id)->delete();
        return response()->json('200');
    }

}

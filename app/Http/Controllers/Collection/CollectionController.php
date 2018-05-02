<?php

namespace App\Http\Controllers\Collection;

use App\Models\Collections\Collections;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CollectionController extends BaseController
{
    public function getCollectionsList()
    {
        // $result_collections = Collections::all();
        $result_collections = Collections::where('status', 1)->get();
        return response()->json($result_collections);
    }

    public function newCollection(Request $request)
    {
        $newResult = new Collections;
        $newResult->id = $request->id;
        $newResult->collection_name = $request->collection_name;
        $newResult->status = 1;
        $newResult->save();
        return response()->json('200');
    }

    public function updateCollection(Request $request)
    {
        $result_update_collection = Collections::find($request->id);
        $result_update_collection->collection_name = $request->collection_name;
        $result_update_collection->save();
        return response()->json('200');
    }

    public function deleteCollection($id)
    {
        // $result_collection_id = Collections::where('id', '=', $id)->delete();
        $result_collection_id = Collections::find($id);
        $result_collection_id->status = 0;
        $result_collection_id->save();
        return response()->json('200');
    }

}

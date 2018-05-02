<?php

namespace App\Http\Controllers\Topics;


use App\Models\Topics\Topics;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class TopicsController extends BaseController
{
    public function getTopicsList(){
        $result_topics =   Topics::where('status',1)->get();
        return response()->json($result_topics);
   }

    public function getTopicsById($id){
  
        $result_topic_id =   Topics::find($id);
        return response()->json($result_topic_id);
    }


    public function newTopic(Request $request){
    //  print_r($request->departmentName);
    
        $newResult                    = new Topics;
        $newResult->topic_name        =$request->topic_name;  
        $newResult->status            =1;  
        $newResult->save();
        return  response()->json('200');
  }

    public function updateTopic(Request $request){
        $result_update_topic =   Topics::find($request->id);
        $result_update_topic->topic_name = $request->topic_name;
        $result_update_topic->status = true;
        $result_update_topic->save();
        return  response()->json('200'); 
    }

    // public function deleteTopic($id) {
    //     $result_topic_id =    Topics::where('id', '=', $id)->delete();;
    //     return  response()->json('200'); 
    // }
    public function deleteTopic($id) {
        $result_topic_id =    Topics::find($id);
        $result_topic_id->status = 0;
        $result_topic_id->save();
        return  response()->json(204); 
    }

}

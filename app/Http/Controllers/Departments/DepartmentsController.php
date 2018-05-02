<?php

namespace App\Http\Controllers\Departments;


use App\Models\Departments\Departments;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class DepartmentsController extends BaseController
{


    public function getDepartmentList(){
         $result_department =   Departments::all();
         //$result_department->count();
         return response()->json($result_department,200);
    }

    public function getDepartmentById($id){
  
        $result_department_id =   Departments::find($id);
        return response()->json($result_department_id);
   }

    public function newDepartment(Request $request){
      //  print_r($request->departmentName);
      
        $newResult                  = new Departments;
        $newResult->department_name =$request->department_name;  
        $newResult->status          =1;  
        $newResult->save();
        return  response()->json(200);
    }

    public function updateDepartment(Request $request){
        $result_update_department =   Departments::find($request->id);
        $result_update_department->department_name = $request->department_name;
        $result_update_department->status = true;
        $result_update_department->save();
        return  response()->json(200); 
    }


    public function deleteDepartment($id) {
        $result_department_id =    Departments::where('id', '=', $id)->delete();;
        return  response()->json("",204); 
    }

    public function advanceSearch(Request $request) {
        $result_department=    Departments::where('id',$request->id)
                                ->where('department_name','like','%'.$request->department_name.'%')
                                ->get();
        return response()->json($result_department,200);
 
    }

   
}
 
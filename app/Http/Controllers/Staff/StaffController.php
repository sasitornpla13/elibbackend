<?php

namespace App\Http\Controllers\Staff;

use App\Models\Staff\Staff;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class StaffController extends BaseController
{
    public function getStaffList()
    {
        // $result_staff = Staff::all();
        $result_staff = Staff::where('status', 1)->get();
        return response()->json($result_staff);
    }

    public function getStaffById($id)
    {
        $result_staff_id = Staff::find($id);
        return response()->json($result_staff_id);
    }

    public function newStaff(Request $request)
    {
        $newResult = new Staff;
        $newResult->f_name = $request->f_name;
        $newResult->l_name = $request->l_name;
        $newResult->department_id = $request->department_id;
        $newResult->status = 1;
        $newResult->save();
        return response()->json('200');
    }

    public function updateStaff(Request $request)
    {
        $result_update_staff = Staff::find($request->id);
        $result_update_staff->f_name = $request->f_name;
        $result_update_staff->l_name = $request->l_name;
        $result_update_staff->department_id = $request->department_id;
        $result_update_staff->save();
        return response()->json('200');
    }

    public function deleteStaff($id)
    {
        // $result_staff_id = Staff::where('id', '=', $id)->delete();
        $result_staff_id = Staff::find($id);
        $result_staff_id->status = 0;
        $result_staff_id->save();
        return response()->json('200');
    }

}

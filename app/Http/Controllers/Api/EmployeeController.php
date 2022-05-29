<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return response()->json($employee);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees',
            'address' => 'required',
            'phone' => 'required|unique:employees',
            'sallary' => 'required',
            'nid' => 'required',
            'joining_date' => 'required',

        ]);

        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $exit = explode('/', $sub)[1];

            $name = time() . "." . $exit;
            $img = Image::make($request->photo)->resize(240, 200);
            $upload_path = 'backend/employees/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            $employee->sallary = $request->sallary;
            $employee->nid = $request->nid;
            $employee->joining_date = $request->joining_date;
            $employee->photo = $image_url;
            $employee->save();
        } else {
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            $employee->sallary = $request->sallary;
            $employee->nid = $request->nid;
            $employee->joining_date = $request->joining_date;
            $employee->save();
        }
    }



    public function show($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        return response()->json($employee);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        if ($employee) {
            $validate_data = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'sallary' => 'required',
                'nid' => 'required',
                'joining_date' => 'required',
            ]);

            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['phone'] = $request->phone;
            $data['sallary'] = $request->sallary;
            $data['nid'] = $request->nid;
            $data['joining_date'] = $request->joining_date;
            $image = $request->new_photo;
            if ($image) {
                $position = strpos($image, ';');
                $sub = substr($image, 0, $position);
                $exit = explode('/', $sub)[1];

                $name = time() . "." . $exit;
                $img = Image::make($image)->resize(240, 200);
                $upload_path = 'backend/employees/';
                $image_url = $upload_path . $name;
                $success =  $img->save($image_url);
                if ($success) {
                    $data['photo'] = $image_url;
                    $img = DB::table('employees')->where('id', $id)->first();
                    $image_path = $img->photo;
                    $done = unlink($image_path);
                    $user = DB::table('employees')->where('id', $id)->first()->update($data);
                }
            } else {
                $old_photo = $request->photo;
                $data['photo'] = $old_photo;
                $user = DB::table('employees')->where('id', $id)->first()->update($data);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        $photo = $employee->photo;
        if ($photo) {
            unlink($photo);
            DB::table('employees')->where('id', $id)->delete();
        } else {
            DB::table('employees')->where('id', $id)->delete();
        }
    }
}

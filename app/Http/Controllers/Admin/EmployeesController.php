<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employees.list')->with([
            'employees' => Employees::with('companies')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create')->with([
            'companies' => Companies::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        //$save = Employees::create($request->toArray());
        $save = new Employees;
        $save->first_name = $request->first_name;
        $save->last_name = $request->last_name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->company_id = $request->company_id;
        $save->save();
        $save_id=$save->id;
        if ($save) {
            return redirect()->route('employees.list');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.employees.edit')->with([
            'employees' => Employees::where(['id' => $id])->first(),
            'companies' => Companies::all(),
        ]);
        
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $save = Employees::find($id);
        $save->first_name = $request->first_name;
        $save->last_name = $request->last_name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->company_id = $request->company_id;
        $save->save();
        $save_id=$save->id;
        if ($save_id) {
            return redirect()->route('employees.list');  
        }else{
            return redirect()->back();
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
        $emp= Employees::find($id);
        $response=array();
        $response['success']=0;
        $response['message'] ='';
        if($emp)
        {
            $status = $emp->delete();
            $response['success']=1;
            $response['message'] ='Delete Success';
        }
        else
        {
            $response['success'] = 0;
            $response['message'] = 'Employee not Exist';
        }
        return response()->json($response);
    }
}

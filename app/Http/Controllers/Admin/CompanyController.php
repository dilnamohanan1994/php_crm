<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companies;
use Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.companies.list')->with([
            'companies' => Companies::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100',
        ]);
        $save = Companies::create($request->toArray());
        if ($save) {
            if ($request->hasFile('logo')) {
                $originalImage = $request->file('logo');
                $saveimage = Image::make($originalImage);
                $originalPath = 'storage/app/public/';
                if (!file_exists($originalPath)) {
                    mkdir($originalPath, 666, true);
                }
                $saveimage->save($originalPath . time() . $originalImage->getClientOriginalName());
                $save->logo = time() . $originalImage->getClientOriginalName();
                $save->save();
            }
            return redirect()->route('company.list');
        } else {
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
        return view('admin.companies.edit')->with([
            'companies' => Companies::where([
                'id' => $id
            ])->first()
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
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100',
        ]);
        //$save = Companies::create($request->toArray());
        $save = Companies::find($id);
        $save->name = $request->name;
        $save->email = $request->email;
        $save->website = $request->website;
        if ($request->hasFile('logo')) {
            $originalImage = $request->file('logo');
            $saveimage = Image::make($originalImage);
            $originalPath = 'storage/app/public/';
            if (!file_exists($originalPath)) {
                mkdir($originalPath, 666, true);
            }
            $saveimage->save($originalPath . time() . $originalImage->getClientOriginalName());
            $save->logo = time() . $originalImage->getClientOriginalName();
        }
        $save->save();
        $save_id=$save->id;
        if ($save_id) {
            return redirect()->route('company.list');  
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
        $company= Companies::find($id);
        $response=array();
        $response['success']=0;
        $response['message'] ='';
        if($company)
        {
            $status = $company->delete();
            $response['success']=1;
            $response['message'] ='Delete Success';
        }
        else
        {
            $response['success'] = 0;
            $response['message'] = 'Company not Exist';
        }
        return response()->json($response);
    }
}

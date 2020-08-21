<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public $company;

    public function __construct(Company $company)
    {
       $this->company = $company;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyData = $this->company->getCompanyData();
        return view('company',compact('companyData'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addCompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $validatedData = $request->validated();
        $filename = '';
        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(100, 100)->save( storage_path('/uploads/' . $filename ) );
        };
        $this->company->storeCompanyData($request->all(),$filename);
        return redirect('/getCompany');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companyData = $this->company->getCompanyDataById($id);
        return view('updateCompany',compact('companyData'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request)
    {
        $validatedData = $request->validated();
        $filename = '';
        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(100, 100)->save( storage_path('/uploads/' . $filename ) );
        };
        $this->company->storeCompanyData($request->all(),$filename);
        return redirect('/getCompany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companyData = $this->company->deleteCompanyData($id);
        return redirect('/getCompany');

    }
}

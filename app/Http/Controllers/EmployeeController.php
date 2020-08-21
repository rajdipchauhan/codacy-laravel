<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public $company;
    public $employee;

    public function __construct(Employee $employee,Company $company)
    {
       $this->company = $company;
       $this->employee = $employee;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeData = $this->employee->getEmployeeData();
        return view('employee',compact('employeeData'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyData = $this->company->getCompanyData();
        return view('addEmployee',compact('companyData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $this->employee->storeEmployeeData($request->all());
            return redirect('/getEmployee');
        } catch (Exception $e) {
            \Log::error($e);
        }
       
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
        $companyData = $this->company->getCompanyData();
        $employeeData = $this->employee->getEmployeeDataById($id);
        return view('updateEmployee',compact('employeeData','companyData'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request)
    {
        try{
            $validatedData = $request->validated();
            $this->employee->storeEmployeeData($request->all());
            return redirect('/getEmployee');
        }catch(Exception $e){
            \Log::error($e);

        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $employeeData = $this->employee->deleteEmployeeData($id);
            return redirect('/getEmployee');
        }catch(Exception $e){
            \Log::error($e);

        }
       
    }
}

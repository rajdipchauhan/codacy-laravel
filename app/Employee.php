<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'first_name','last_name','company','email','phone'
    ];

    /**
     * get all employee data using pagination
     * 
     * @param
     * @return array
     */
    public function getEmployeeData()
    {
       return Employee::leftjoin('companies','companies.id','=','employees.company')->select('employees.*','companies.name as company_name','employees.email as employee_email')->paginate(10);
    }

      /**
     * get employee data using id
     * 
     * @param
     * @return array
     */
    public function getEmployeeDataById($id)
    {
       return Employee::where('id',$id)->first();
    }

      /**
     * store and update employee data
     * 
     * @param $data
     * @param $filename
     * @return boolean
     */
    public function storeEmployeeData($data)
    {
        if(isset($data['id'])){
            $data = Employee::where('id',$data['id'])->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'company' => $data['company'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);
        } else {
            $data = Employee::create($data);
        }
        return $data;
    }

      /**
     * delete employee data using id
     * 
     * @param
     * @return array
     */
    public function deleteEmployeeData($id)
    {
       return Employee::where('id',$id)->delete();
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'name','email','logo','website'
    ];

    /**
     * get all company data using pagination
     * 
     * @param
     * @return array
     */
    public function getCompanyData()
    {
       return Company::paginate(10);
    }

      /**
     * get company data using id
     * 
     * @param
     * @return array
     */
    public function getCompanyDataById($id)
    {
       return Company::where('id',$id)->first();
    }

      /**
     * store and update company data
     * 
     * @param $data
     * @param $filename
     * @return boolean
     */
    public function storeCompanyData($data,$filename)
    {
        if(isset($data['id'])){
            if($filename != ''){
                $data['logo'] = $filename;
            }
            $data = Company::where('id',$data['id'])->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'logo' => $data['logo'],
                'website' => $data['website'],
            ]);
        } else {
            $data['logo'] = $filename;
            $data = Company::create($data);
        }
        return $data;
    }

      /**
     * delete company data using id
     * 
     * @param
     * @return array
     */
    public function deleteCompanyData($id)
    {
       return Company::where('id',$id)->delete();
    }
    
    
}

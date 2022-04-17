<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function Paid(Request $request , $id)
    {
       $calidateData = $request->validate([
           'salary_month' => 'required'
       ]);
       $month = $request->salary_month;
       $check = DB::table('salaries')->where('employee_id',$id)->where('salary_month',$month)->first();
       if ($check){
           return response()->json('salary already paid');
       }else{
        $data = array();
       $data['employee_id'] = $id;
       $data['amount'] = $request->sallary;
       $data['salary_date'] = date('d/m/Y');
       $data['salary_month'] = $month;
       $data['salary_year'] = date('Y');
       DB::table('salaries')->insert($data);
       }


    }
}

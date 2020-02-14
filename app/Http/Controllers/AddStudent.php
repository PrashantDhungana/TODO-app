<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class AddStudent extends Controller
{
    public function index(){
    	request()->validate([
    		'name'=>'required|max:10',
    		'phone_no'=>'required|digits:10',
    		'address'=>'required',

    	]);

    	$student=[
			'name'=>request('name'),
    		'phone_no'=>request('phone_no'),
    		'address'=>request('address'),
    	];
    	$result=\DB::table('students')->insert($student);
    	if (!$result)
    	{
 			return redirect('all/students')->with('status', array('alert-danger','Failed Inserting Record!!'));
    		
    	}
    	else{
 			return redirect('all/students')->with('status', array('alert-success','Record Inserted Successfully!!'));

    	}

    }

    public function edit($id){
    	$StudentsData=Students::where('id',$id)->firstOrFail();
        // if ($StudentsData==NULL) 
        // {
        //     abort(404,"The user $id is not found." );
        // }
    	return view('UpdateStudent',['students'=>$StudentsData]);
    }
    public function update($id){
    	$newData=[
    		'name'=>request('name'),
    		'phone_no'=>request('phone_no'),
    		'address'=>request('address'),
    	];
    	$result=\DB::table('students')->where('id',$id)->update($newData);
    	if($result){
    		return redirect('all/students')->with('status', array('alert-success','Record Updated Successfully!!'));
    	}

    }
    public function delete($id){
    	$result=\DB::table('students')->where('id',$id)->delete();

        if (!$result) 
        {
            abort(404,"Student with ID $id not found");
        }
    	else 
    	{
    		return redirect('/all/students')->with('status', array('alert-danger','Record deleted Successfully!!'));
    	}

    }
    public function deletemany(){
    	$StudentsID=request('del');
        // dd($StudentsID);
    	foreach ($StudentsID as $student) {
    	$result=\DB::table('students')->where('id',$student)->delete();
    	}
    	if ($result) 
    	{
    		return redirect('all/students')->with('status', array('alert-danger','Records deleted Successfully!!'));
    	}
    	else echo "Not deleted";
    }
}

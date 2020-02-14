<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function index(){
    	// $Tasks=Todo::latest()->paginate(5);
        $Tasks=Todo::where('completed_on','=',NULL)->where('incomplete','=','0')->latest()->paginate(5);
    	// dd($Tasks);
    	// $date=new Carbon();
    	// Carbon::parse($moment->created_at)->format('m/d/Y h:m')
    	// $forHumans=Carbon::parse('2020-01-14 11:57:54')->format('Y-m-d h:m:s')->diffForHumans();
    	// dd($forHumans);
    	return view('TodoView',['todo'=>true,'tasks'=>$Tasks]);
    }
    public function insert(){
    	if(request('check')!=NULL){
    		$data=request('check');
    		$this->deleteall($data);
    	}
    	$check=request()->validate([
    		'newToDo'=>'required'
    	]);
    	$data=[
    		'Tasks'=>request('newToDo'),
    		'created_at' => now()
    	];
    	$result=Todo::insert($data);
    	if ($result) 
    	{
    		return redirect('todo')->with('status', array('alert-success','New Task Inserted Successfully!!'));
    	}
    }
    public function delete($id){
    	$result=Todo::where('id',$id)->delete();
    	if ($result)
    	{
    		return redirect('todo')->with('status', array('alert-warning','Task Deleted Successfully!!'));
    	}
    }
    public function deleteall($datas){
    	foreach ($datas as $data) 
    	{
    		$result=Todo::where('id',$data)->delete();
    	}
    	if ($result) 
    	{
    		return redirect('todo')->with('status', array('alert-warning','Multiple Tasks Deleted Successfully!!'));
    	}
    }
    public function edit(){
        $id=request('id');
        $data = Todo::where('id',$id)->get();
        echo $data;
    }



    public function ajaxData()
    {
    	$data=request('name');
    	// $data=explode(' ', $data);
    	$todo = \DB::table('todos')->where('Tasks','LIKE','%'.$data.'%')->get();
        
    	echo($todo);
    }

    public function complete($id){
        $data=Todo::where('id',$id)->update(array('completed_on'=>now()));
        return redirect('todo');
    }

    public function incomplete($id){
        $data=Todo::where('id',$id)->update(array('incomplete'=>'1'));
        return redirect('todo');


    }

}

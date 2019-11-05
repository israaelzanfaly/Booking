<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userticket;
use App\Category;

class UserticketController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        
        $normal_count=Userticket::where('category_id','=','1')->count();
        $student_count=Userticket::where('category_id','=','2')->count();
        return view('userticket.create',['categories'=>$categories,'normal_count'=>$normal_count,'student_count'=>$student_count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $email=request('email');
        $cat_id=request('category_id');
        //  dd($cat_id);
       $checked= Userticket::where('email','=',$email)->where('category_id','=',$cat_id)->first();
    //    dd($e);
       if ( $checked ) {        
        return redirect('/')->with('msg', 'Sorry Each email can only book 1 ticket of each type');       
        }
       else{
        $userticket=Userticket::create($this->requestValidate());
        $userticket->save();
        return redirect('/')->with('status', 'Thanks your ticket had been reserved');
    }
       
    }
    private function requestValidate(){
       
        return request()->validate([
            'email' => 'required',
            'name'=>'required',            
            'phone'=>'required',
            'category_id'=>'required'
        ]);      
    }


}
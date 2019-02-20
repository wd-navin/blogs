<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\data;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
    public function index()
    {
        $data = Category::with('freedata')->paginate(5);  
        //print_r($data);exit;
       return view('category.view', ['data' => $data]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_data()
    {
        if(request()->ajax())
            {
            $data = data::select()->get();
            return response()->json(array('dataData' => $data));
            }
    }
    
    

        /**
         * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(request()->ajax())
       {
           $data = $request->post();
           $user = new Category();
           $user->product_name = $data['product_name'];
           $user->data_id = $data['data_id'];
           $user->save();
           //print_r($user);exit; 
           return response()->json(array('message' => 'success', 'data' => $user));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
     if(request()->ajax()){
         $data = Category::where('id', $request->catid)->delete();
         if($data)
             {
             return response()->json(array('message' => 'success'));
             }else{
                 return response()->json(array('message' => 'fail'));
             }
     }
    }
}

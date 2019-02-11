<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Donations;
use Illuminate\Http\Request;

class DonationController extends Controller
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
    
     public function post_data()
    {
        return view('blogs.post');
    }
    
    public function ajax_post(Request $request)
    {
        $posts = $request->post();
        //print_r($posts);exit;
        $data = new Blogs();
        $data->user_id = $posts['user_id'];
        $data->title = $posts['title'];
        $data->description = $posts['description'];
        $data->save();
        
    }
    
   public function ajax(Request $request)
    {
        
       
            $donation = $request->post();
            //print_r($donation);exit;
            $data = new Donations();
            $data->user_id = $donation['user_id'];
            $data->category_id = $donation['category_id'];
            $data->city = $donation['city'];
            $data->state = $donation['state'];
            $data->save();
           // return redirect('create');
        
    }
    
   
        public function index_data()
    {
        $user = Donations::select('*')
                ->with('category')
                ->paginate(5);
       // print_r($user);exit;
        return view('donations.show', ['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_data()
    {
        $data = Category::select()->get();
        return view('donations.create', ['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_data(Request $request)
    {
        if($request->isMethod('post'))
        {
            $donation = $request->post();
            $data = new Donations();
            $data->user_id = $donation['user_id'];
            $data->category_id = $donation['category_id'];
            $data->city = $donation['city'];
            $data->state = $donation['state'];
            $data->save();
            return redirect('create');
        }
    }

    /**
     * Display the specified resource.
    public function store_data(Request $request)
    {
        if($request->isMethod('post'))
        {
            $donation = $request->post();
            $data = new Donations();
            $data->user_id = $donation['user_id'];
            $data->category_id = $donation['category_id'];
            $data->city = $donation['city'];
            $data->state = $donation['state'];
            $data->save();
            return redirect('create');
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
    public function destroy($id)
    {
        //
    }
}

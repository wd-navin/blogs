<?php

namespace App\Http\Controllers;

use DB;
use App\Models\DonationImages;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Donations;
use App\Http\Requests;
use Illuminate\Http\Request;

class DonationController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function donation_data(){
        return view('donations.donation-page');
    }

    



    public function ajax_data() {
        if (request()->ajax()) {
            $cat_data = Category::select()->get();
            return response()->json(array('data' => $cat_data));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_data() {
        $user = Donations::select('*')
                ->with('images')
                ->paginate(5);
        //print_r($user);exit;
        return view('donations.show', ['users' => $user]);
        //return response($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_data(Request $request) {
        if (request()->ajax()) {
            $data = new Donations();
            $data->user_id = $request['user_id'];
            $data->category_id = $request['category_id'];
            $data->city = $request['city'];
            $data->state = $request['state'];
            //print_r($request->all());exit;
            $data->save();

            if ($files = $request->file('image')) {

                $m_id = Donations::findOrFail($data->id);
                $path = public_path() . "/images/donation_image";
                $priv = 0777;
                if (!file_exists($path)) {
                    mkdir($path, $priv) ? true : false; //
                }
                foreach ($files as $file) {
                    $name = uniqid() . $file->getClientOriginalName();
                    $file->move('images/donation_image', $name);
                    $images = new DonationImages();
                    $images->donation_id = $m_id->id;
                    $images->image = '/images/donation_image/' . $name;
                    $images->save();
                }
            }

            $img = DonationImages::where('donation_id', $m_id->id)->get();
            //print_r($img);exit;
            return response()->json(array('message' => 'success', 'data' => $data, 'image' => $img));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//   
    /**
     * Display the specified resource.


      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        if (request()->ajax()) {
            $data = Donations::where('id', $request->don_id)
                    ->with('images')
                    ->first();
            //print_r($data);exit;
            $cat = Category::select('*')->get();
            $images = DonationImages::where('donation_id', $request->don_id)->get();
            foreach ($images as $key => $da) {
                $arr[$key]['img'] = asset($da['image']);
            }
            //print_r($arr);exit;
            return response()->json(array('data' => $data, 'cat' => $cat, 'image' => $arr));
        }
    }

    public function update(Request $request) {

        if ($request->isMethod('post') && $request->ajax()) {
            $posts = $request->post();
            $data = Donations::find($posts['id']);
            $data->id = $posts['id'];
            $data->user_id = $posts['user_id'];
            $data->category_id = $posts['category_id'];
            $data->city = $posts['city'];
            $data->state = $posts['state'];
            $data->save();

            if ($files = $request->file('image')) {
                $path = public_path() . "/images/donation_image";
                $priv = 0777;
                if (!file_exists($path)) {
                    mkdir($path, $priv) ? true : false; //
                }
                foreach ($files as $image) {
                    $name = uniqid() . $image->getClientOriginalName();
                    $image->move('images/donation_image', $name);
                    $images = new DonationImages;
                    $images->donation_id = $posts['id'];
                    $images->image = '/images/donation_image/' . $name;                    
                    $images->save();
                }
            }
            $img = DonationImages::where('donation_id', $posts['id'])->get();
           // print_r($img);exit; 
            return response()->json(array('data' => $data, 'image' => $img));
        }
    }

    public function destroy(Request $request) {
        if (request()->ajax()) {

            $res = Donations::where('id', $request->ids)->delete();

            if ($res) {
                
                return response()->json(array('message' => 'success'));
            } else {
                return response()->json(array('message' => 'fail'));
            }
        }
    }
    public function del_image(Request $request) {
        if (request()->ajax()) {

            $check = DonationImages::where('id', $request->id)->delete();
           // print_r($i_id);exit;
            if ($check) {
                
                return response()->json(array('message' => 'success'));
            } else {
                return response()->json(array('message' => 'fail'));
            }
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}

<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormVerifyRequest;
use App\Http\Requests\UpdateVerifyRequest;

use Hash;
use DB;
use Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = DB::table('users')->where('del',0)->paginate(2);

        // dd($data);

        return view('admin/list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/add',['title'=>'用户的添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormVerifyRequest $request)
    {
        //
        $data = $request->except('_token');

        if ($request->hasFile('profile')) {
            $name = rand(1111,9999).'_'.time();
        }

        $suf = $request->file('profile')->getClientOriginalExtension();

        $path = $request->file('profile')->move('./uploads/',$name.'.'.$suf);

        $data['profile'] = '/uploads/'.$name.'.'.$suf;

        $data['password'] = Hash::make($request->input('password'));
        
        $now = Carbon\Carbon::now();

        $data['addtime'] = $now;

        $res = DB::table('users')->insert($data);

        // dd($data);

        if ($res) {
            
            return redirect('/admin/user');
       
        }else{
            
            return back();
       
        }

        

        // dd($path);

        // dd($suf);

        // dd($data);
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
        $res = DB::table('users')->where('uid',$id)->first();
        
        // dd($res);
        
        return view('admin/edit',['res'=>$res]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVerifyRequest $request, $id)
    {
        //
        // $res = DB::table('user')->where('uid',$id)->first();

        // $data = $request->all();
        // dd($data);
        $data = $request->except('_token','_method');
        
        if ($request->hasFile('profile')) {
            
            $name = rand(1111,9999).'_'.time();

            $suf = $request->file('profile')->getClientOriginalExtension();

            $path = $request->file('profile')->move('./uploads/',$name.'.'.$suf);

            $data['profile'] = '/uploads/'.$name.'.'.$suf;

        }
        

        // $data['password'] = Hash::make($request->input('password'));

        $res = DB::table('users')->where('uid',$id)->update($data);

        if ($res) {
            
            return redirect('/admin/user')->with('msg','修改成功');
        }else{
            return back();
        }

        // $data = $request->all();

        // dd($data);
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
        // return  $id;
        // $data = [];

        // $data[] = $data['del'] = 1;
        
        $res = DB::update('update users set del="1" where uid = ?', [$id]);;

        // dd($res);

        if ($res) {
            
            return redirect('/admin/user')->with('msg','删除成功');

        }else{

            return back();

        }
    }
}

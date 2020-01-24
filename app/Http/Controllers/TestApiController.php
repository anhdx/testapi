<?php
namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers;

use App\Models\User;

class TestApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = ['success'=>true,'status code'=>200,'data'=>User::all()];

        return response()->json($user,200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user!=true){
            return response()->json(['status code'=> 404,'message' => 'Page Not Found. ahihi'], 404);
        }
        
        return response()->json(['Successful'=>true,'status code'=> 200,'data'=>$user],200);
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
    public function update(Request $rq,$id)
    {
        $user = User::find($id);
        if($rq->email ==$user->email){

            return response()->json(['message'=>'Email already use','status code' => 201,'data'=>$rq->email]);

        }
        if($rq->all()==null){
            return response()->json(['status code'=> 204,'message' => 'Nothing to update'], 200);

        }
        if($user!=true){
            return response()->json(['status code'=> 404,'message' => 'Page Not Found.'], 404);
        }else{

           $user ->update($rq->all());

           return response()->json(['message'=>'updated','status code'=> 200,'data'=>$user],200);

        }


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user!=true){
            return response()->json(['status code'=> 404,'message' => 'Page Not Found.'], 200);

        }
        $user->delete();
        return response()->json(['Message'=>'No content','status code'=>204,'data'=>$user],200);
    }
}

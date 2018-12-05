<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helper;
use App\Orders;
use App\Users;
use DB;

class NotificationController extends Controller
{

     //
    public function index()
    {
        # code...
        $users =  Helper::getAllUsers(); 
        $notifications =  DB::table('notifications')->get(); 
        DB::table('notifications')->where('read_status',false)->update(['read_status'=>true]);
        return view('admin.pages.notifications.index',compact('users','notifications'));
    }
    
     public function get_unread_orders(Request $request)
    {
        $postvar = $request->all();
        $orders_count = DB::table('orders')->where('read_status', 0)->count();
        $orders_lists = DB::table('orders')->join('users', 'users.id', '=', 'orders.user_id')->where('read_status', 0)
		->select('orders.*', 'users.id as userid','users.first_name as username','users.last_name as user_lastname','users.name as uname','users.last_name as user_lastname','users.avtar as userimage')
		->get();
        return response()->json([ 
                                  'orders_count'=>$orders_count, 
                                  'orders_lists' => $orders_lists
                              ]);
    }
    
    public function get_notifications(Request $request)
    {
        $postvar = $request->all();
        $notifications_count = DB::table('notifications')->where('read_status', 0)->count();
        $notifications_lists = DB::table('notifications')->join('users', 'users.id', '=', 'notifications.user_id')->where('read_status', 0)
		->select('notifications.*', 'users.id as userid','users.first_name as username','users.last_name as user_lastname','users.name as uname','users.last_name as user_lastname','users.avtar as userimage')
		->get();
        return response()->json([ 
                                  'notifications_count'=>$notifications_count, 
                                  'notifications_lists' => $notifications_lists
                              ]);
    }



    public function send_notification(Request $request)
    {
      # code...
      $input = $request->all();

      $validator = Validator::make($input, [
            'send_to' => 'required_without:send_to_all',
            'message' => 'required|max:1500|string'
        ]);

        if($validator->fails()){

           return response()->json(['status'=> 0 , 'errors' => $validator->errors() ]);

        }else{
           DB::table('notifications')->insert([
            'user_id' => (isset($input['send_to'])?implode(',', $input['send_to']):0),
            'message' => $input['message'],
            'created_at' => date('Y-m-d H:i:s'),
           ]);

            return response()->json(['status'=> 1 , 'message' => 'Notifications Sent' ]);

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('notifications')->where('id',$id)->delete();
        return redirect()->back();
    }






}

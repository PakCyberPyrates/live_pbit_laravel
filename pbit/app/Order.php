<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    //


    protected $fillable = [
        'user_id', 'plan_id', 'payment_getway','amount','token','transaction_id','status'
    ];

    public function user()
    {
      return $this->hasOne('App\User','id','user_id');
    }

    public function course()
    {
       return $this->hasOne('App\Course','id','plan_id');
    }

    public function items()
    {
       return $this->hasMany('App\Item','order_id','id');
    }


    /*
    * Calculate the profit every month 
    * Use On Dash board
    *
    */
    public static function sales($course_id){
        
        $month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug",'Sep','Nov','Dec'];
    

        $sales = Order::join('items', 'items.order_id','=','orders.id')
                                   ->select(DB::raw('sum(orders.amount) as `total_amount`'),
                                       DB::raw('DATE_FORMAT(orders.created_at ,"%b") as month , MONTH(orders.created_at) mon')
                                    )
                                   ->groupby('mon')
                                   ->whereYear('orders.created_at', '=', date('Y'))
                                   ->where('items.item_id', '=', $course_id)
                                   ->get();
        if($sales){

            $data =   $sales->mapWithKeys(function ($item) {
                        return [$item['month'] => $item['total_amount']];
                    });

            foreach ($month as $value) {
                if(isset($data[$value])){
                    $new_array[] = array($value,$data[$value]) ;
                }else{
                    $new_array[] = array($value,0) ;
                }
            }

            return $new_array;

        }else{

            return false;
        }
        

    }



}

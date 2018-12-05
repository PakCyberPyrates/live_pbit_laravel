<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use Auth;

class Coupon extends Model
{

	protected $coupon;


    protected $fillable = [
         'promotion_code', 'type','value','apply_on','start_date','expiry_date','number_of_user','max_user','note','apply_once'
    ];




    /**
     * Check if provided coupon's date is not exprired.
     *
     * @return void
     */

    public function isCouponExist($coupon)
    {
    	$current_time =  date('Y-m-d');
    	return $this->coupon = $this->where([
    		                                ['promotion_code', '='  , $coupon],
    		                             ])
                                    ->whereNull('start_date')
    	                            ->orWhere('start_date','<=', $current_time)
                                    ->where('expiry_date', '>=', $current_time)
    	                            ->first();
    }

    /**
     * Check if provided coupon is not exprired.
     *
     * @return void
     */
    public function isCouponActive()
    {
    	if(!$this->coupon){
    		return false;
    	}else{
    	   return ($this->coupon->number_of_user > $this->coupon->applied_coupons);
    	}
    }

    /**
     * Check if user already used his coupon.
     *
     * @return void
     */
    public function has_already_used()
    {

        if(!$this->coupon){
            return false;
        }else{

        $applyed_orders = Order::where([
                ['user_id' , '=' , Auth::id() ],
                ['coupon' , '=' , $this->coupon->promotion_code ],
            ])->count();

           return ($applyed_orders < $this->coupon->max_usage );
        }
    }


    /**
     * Check if coupon for Old signups and user is old .
     *
     * @return void
     */
    public function existing_clients_only()
    {

       return Order::where([ ['user_id' , '=' , Auth::id() ] ])->count();

    }



}

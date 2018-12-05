<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Coupon;
use Cart;
use App\Helper;
use DB;

class CouponController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $coupons = Coupon::orderBy('id','desc')->get();
        return view('admin.pages.coupons.index',compact('coupons'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
    	$courses = DB::table('courses')->get();

        return view('admin.pages.coupons.add',compact('courses'));
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        
        $validator =  Validator::make($input, [
            'promotion_code' => 'required|string|max:191|unique:coupons',
            'type' => 'required|string',
            'value' => 'required|max:11',
            'apply_on' => 'required',
            'start_date' => 'required_with:expiry_date',
            'expiry_date' => 'required_with:start_date|after:start_date',
            'start_date'=> 'nullable|date',
            'expiry_date'=> 'nullable|date|after:start_date',
            'number_of_user' => 'required',
            //'max_usage' => 'required',
        ]);

        if($validator->fails()){
        	
          //  dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();

        }else{

        	$input['apply_on'] =  implode(',', $input['apply_on']);
        	Coupon::create($input);

        	$topiscussesscreated= __('Coupon Successfully Created');
            $request->session()->flash('status', $topiscussesscreated);

        	return redirect('admin/coupons');
        }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::where('id',$id)->delete();
        return redirect()->back();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $coupon = 	Coupon::findOrFail($id);
    	$courses = DB::table('courses')->pluck('course_name','id');
        return view('admin.pages.coupons.edit',compact('courses','coupon'));
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->except(['_token','_method']);
        
        $validator =  Validator::make($input, [
            'promotion_code' => 'required|string|max:191|unique:coupons,id,'.$id,
             'type' => 'required|string',
            'value' => 'required|max:11',
            'apply_on' => 'required',
            'start_date' => 'required_with:expiry_date',
            'expiry_date' => 'required_with:start_date|after:start_date',
            'start_date'=> 'nullable|date',
            'expiry_date'=> 'nullable|date|after:start_date',
            'number_of_user' => 'required',
        ]);

        if($validator->fails()){
        	
            return redirect()->back()->withErrors($validator)->withInput();

        }else{

        	$input['apply_on'] =  implode(',', $input['apply_on']);
        	Coupon::where('id',$id)->update($input);

        	$topiscussesscreated= __('Coupon Successfully Updated');
            $request->session()->flash('status', $topiscussesscreated);

        	return redirect('admin/coupons');
        }
     }



     public function apply_coupon(Request $request)
     {

        $coupon = new Coupon();
        $html = '';
        $data = [];

        if($this_coupon =  $coupon->isCouponExist($request->coupon_code)){


            $cart  = Cart::content();
           
            if(!$cart){
                return \Response::json(['status'=> 0 , 'messages' => 'You do not have any item in your cart']);
            }
            
            // check if coupon can apply on these items 
            $item_ids = $cart->pluck('id')->toArray();
            $apply_on = explode(",", $this_coupon->apply_on);
            // Array of common elements:
            $show = array_intersect($item_ids, $apply_on);

          
            if(!count($show)){
                return \Response::json(['status'=> 0 , 'messages' => 'This coupon can not applied on your selected package']);
            }

            if($coupon->isCouponActive()){


                if(!$coupon->has_already_used()){
                    return \Response::json(['status'=> 0 , 'messages' => 'Not Exist']);
                }

               
               if($this_coupon->new_signups_only){
                    if($coupon->existing_clients_only()) {
                        return \Response::json(['status'=> 0 , 'messages' => 'Not Exist']);
                    }
                }

                if($this_coupon->existing_clients_only){
                    if(!$coupon->existing_clients_only()){
                        return \Response::json(['status'=> 0 , 'messages' => 'Not Exist']);
                    }
                }


                $total_price = $cart->whereIn('id',$show)->sum('price');

                $data = Helper::calculate_discount($total_price,$this_coupon->promotion_code);
                
                if(count($data)){

                    $title =  ($data['type'] == 'percentage') ? $data['title'] : '' ;
                    $html.='<li class="dynamic"><b>'.$title.'Discount</b><span class="discount_span"  > $'.number_format($data['discount'],2,'.','').'</span></li>';
                    $html.='<li class="dynamic"><b>Grand Total</b><span class="grand_span" > $'.number_format($data['after_discount'],2,'.','').'</span></li>';

                    $request->session()->put('coupon_data',[
                                                        'coupon_id' => $this_coupon->id, 
                                                        'discount' => $data['discount'],
                                                        'after_discount' => $data['after_discount'],
                                                        'type' => $this_coupon->type, 
                                                        'value' => $this_coupon->value, 
                                                    ]);

                    session()->put('total_amount', $data['after_discount']);

                    return \Response::json(['status'=> 1 , 'messages' => 'success' , 'html' => $html , 'data' => $data]);

                }else{

                    return \Response::json(['status'=> 0 , 'messages' => 'external error']);
                }

            }else{
                
                return \Response::json(['status'=> 0 , 'messages' => 'code has expired']);
            }
        }else{
                return \Response::json(['status'=> 0 , 'messages' => 'Not Exist']);
        }
     }


     public function remove_coupon(Request $request)
     {  
        $cart  = Cart::content();
        $total_price = $cart->sum('price');
        $request->session()->put('coupon_data',[]);
        session()->put('total_amount', $total_price);
        return \Response::json(['status'=> 1 , 'messages' => 'success' , 'data' => ['total' => $total_price ] ]);
     }



}

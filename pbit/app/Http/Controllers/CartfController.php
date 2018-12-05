<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use App\GatewayListing;
use Stripe\Stripe;
use Stripe\Charge;
use App\Order;
use App\Item;
use Session;
use Helper; // Important
use Auth;
use Cart;
use DB;
class CartfController extends Controller
{ 
	//add to cart add by jasvir
	public function cartadd(Request $request) {
		$input = $request->all();		
		if(!empty($input['product_id'])){
			$tiems= Cart::content();
			foreach ($tiems as $key => $value) { 
			          if($input['product_id']==$value->id){          
                      		Cart::remove($value->rowId);
                  	   }
            }
			$product_id=$input['product_id'];
			$product = DB::table('courses')->where('id', $product_id)->first();
			Cart::add(array('id' => $product_id, 'name' => $product->course_name, 'qty' => 1, 'price' => $product->actual_price,'options' => ['image' => $product->image]));
		} 		
		$cart = Cart::content();	
		//$gatewaylisting=GatewayListing::groupBy('name')->get();		
		$gatewaylisting=GatewayListing::groupBy('name')->selectRaw('count(*) as total, name')->get();		 
		return view('cart', array('cart' => $cart, 'gatewaylisting'=>$gatewaylisting, 'title' => 'Cart','breadcrum'=>'cart', 'description' => '', 'page' => 'home','class'=>'courses','type'=>"innerpage"));		
	}



		//add to cart add by jasvir
	public function packagcart(Request $request) { 
		$input = $request->all();	
		$tiems= Cart::content();
			foreach ($tiems as $key => $value) {                     
                      Cart::remove($value->rowId);
            }	

		if(!empty($input['product_id'])){			
			$product_id=explode(',',$input['product_id']);	
		 	foreach ($product_id as $key => $value) {
				$product = DB::table('courses')->where('id', $value)->first();
					Cart::add([
						'id'       => $product->id,
						'name'     => $product->course_name,
						'qty' => 1,
						'price'    => $product->actual_price,
						'options' => ['image' => $product->image]
						]);		
				# code...
			}	 
			//die;		
		}else{
			return redirect('course');
		} 
		return redirect('cart');
	}


	//cart remove by jasvir
	public function cartremove(Request $request){
		$input = $request->all();	
		if($input){	
	    	 $items = session('cart');
	    	 $data = Session::all();
	    	 foreach ($data as $key => $valuedata) {    	 	 
	    	 	if($key=='cart'){
	    	 		foreach($valuedata['default'] as $defaultval){    	 			 
	    	 			if($input['product_id']==$defaultval->id){    	 				 
	    	 				Cart::remove($defaultval->rowId);
	    	 				return redirect('cart');
	    	 			}//if end
	    	 		}// foreach
	    	 	} //if end   	 
	    	 }//foreach
	    	}else{
	    		return redirect('cart');
	    	}
	}//cartremove

	public function cartincrease(Request $request){				
				$input = $request->all();		
				$cart = Session::get('cart');			
				foreach ($cart as $key => $cartvalue) {
					foreach($cartvalue as $cartincre){ 					 	 			
					 if($input['product_id']==$cartincre->id){
						$rowId= $cartincre->rowId;						
						Cart::update(
							$rowId, [
							'qty' => $cartincre->qty+1						
						]);
						return redirect('cart');
					}//end if				
				}//foreach
			}//foreach
	}//cartincrease 
	public function cartdecrease(Request $request){			
				$input = $request->all();		
				$cart = Session::get('cart');			
				foreach ($cart as $key => $cartvalue) {
					foreach($cartvalue as $cartincre){ 					 	 			
					 if($input['product_id']==$cartincre->id){
						$rowId= $cartincre->rowId;						
						Cart::update(
							$rowId, [
							'qty' => $cartincre->qty-1						
						]);
						return redirect('cart');

					}//end if				
				}//foreach
			}//foreach
	}//cartincrease 

	public function cartcheckout(Request $request){		
		$input = $request->all();
		 
		$randtoken='Pbit_'.md5(uniqid(rand(), true));		
		Session::put('paypalinvoicekey', $randtoken);			 
		 
		if(!empty($input['radio1'])){ $paymentmethod=$input['radio1']; 				
		//if(!empty($input['total_amount'])){ $totalamount=$input['total_amount'];}	 		
		$totalamount=Session::get('total_amount');
		$cart = Cart::content();
		//print_r($cart)	;
		$arrayname= array();
		foreach ($cart as $key => $value) {		   
			$arrayname[]= $value->id.',';
			# code...
		}
		//print_r($arrayname);
        $ary=implode('', $arrayname);
        $product_name=rtrim($ary,',');
		if(empty(count($cart))){return redirect('course');}		
		include_once $paymentmethod.'GatewaysController.php';
		$class = __NAMESPACE__ . '\\' .$paymentmethod. 'GatewaysController';
        $gateway_object = new $class();                
        $totalamount=str_replace(",", "", $totalamount);
        session(['product_name' => $product_name]);
		return view('checkout', array('cart' => $cart,'breadcrum'=>'','paymentmethod'=>$gateway_object->redirect($totalamount,$randtoken ),  'title' => 'Checkout', 'description' => '', 'page' => 'home','class'=>'checkout','type'=>"innerpage",'msg'=>""));
		}else{
			session(['product_name' => '']);
			  return redirect('/cart');
		}
	}

	public function frompaypal(Request $request){
		//die('dfghsdf');
		$input = $request->all();
		$matchedtoken = Session::get('paypalinvoicekey');	// get session invoiceid
			//print_r($input['token']);
			 if($input['token']==$matchedtoken){
				 	$cart = Session::get('cart');
				 	$totalamount= array();			
					foreach ($cart as $key => $cartvalue) {
						foreach($cartvalue as $cartincre){
						       $totalamount[] =$cartincre->price; 			
						}//foreach
					}//foreach
					$totalamountpaypal =array_sum($totalamount);
			 	    $data=Order::create([
			                'user_id' => Auth::id(),
			                'payment_getway' => 'paypal',
			                'token' => $matchedtoken,
			                'amount' => $totalamountpaypal, 
			                'transaction_id' => $matchedtoken,
			                'status' => 'pending',                        
			                'read_status' => '',
			                'note' => '',
			                 
			            ]);

			 	    $product_ids = Session::get('product_name');
			 	    $productids=explode(',', $product_ids);
			            foreach ($productids as $key => $Item_id) {	
			            	 	$coursepriceorder = DB::table('courses')->where('id', $Item_id)->first();
			            	 	Item::create([
								'order_id' => $data->id,
								'item_id' => $Item_id,               
								'quantity' => 1,
								'price' => $coursepriceorder->actual_price,               
							]);	 
			            	# code...
			            }
			        Cart::destroy();
			        session(['product_name' => '']);
			        session(['total_amount' => '']);			         
			        return redirect('myorder');
			        //return view('paymentsuccess', array('orderid' => $data->id, 'breadcrum'=>'', 'title' => 'Success', 'description' => '', 'page' => 'order','class'=>'order','type'=>"innerpage")); 	

			 			 	
			 }else{
			 	echo "failed payment";
			 }	

	}

	public function pppaymentnotify(Request $request){

		$postipn = "cmd=_notify-validate";
		$orgipn = "";
		foreach ($_POST as $key => $value) {
			$orgipn.= ("" . $key . " => " . $value . "\r\n");
			$postipn.= "&" . $key . "=" . urlencode(html_entity_decode($value, ENT_QUOTES));
		}
		file_put_contents('/var/www/vhosts/powerbitraining.com/httpdocs/paypal_'.date("j.n.Y").'.log', $postipn, FILE_APPEND);
		$raw_post_data = $postipn; 	
		$raw_post_array = explode('&', $raw_post_data);
		$myPost = array();
		foreach ($raw_post_array as $keyval) {
		  $keyval = explode ('=', $keyval);
		  if (count($keyval) == 2)
		    $myPost[$keyval[0]] = urldecode($keyval[1]);
		}
		// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
		$req = 'cmd=_notify-validate';
		if (function_exists('get_magic_quotes_gpc')) {
		  $get_magic_quotes_exists = true;
		}
		foreach ($myPost as $key => $value) {
		  if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
		    $value = urlencode(stripslashes($value));
		  } else {
		    $value = urlencode($value);
		  }
		  $req .= "&$key=$value";
		}
		// Step 2: POST IPN data back to PayPal to validate
		$ch = curl_init('https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));		
		$res = curl_exec($ch);
		if($res=="VERIFIED"){	           
			DB::table('orders')->where('token', $_POST['invoice'])->update(['status' => 'complete'],['transaction_id',$_POST['txn_id']]);			 
				
			}	
		if ( !($res) ) {		
		  curl_close($ch);
		  exit;
		}
		//echo "bye";
		curl_close($ch);
		//die;
	}

		public function cancel(Request $request){		
	        $input = $request->all();	
	     	$cartcontain = count(Cart::content());
	        if($cartcontain){
	        	$errormsg="Your payment failed and the transaction wasn't completed";
	     		 return redirect('cart')->withErrors([$errormsg]);
	     	}

		}		

		public function paymentstripe(Request $request)
		{				
				Stripe::setApiKey(config('services.stripe.secret'));
				$input = $request->all();	
				/*print_r($input['amount']);
				print_r($input['product_name']);*/
		        $token = request('stripeToken');
		        $cartcontain = count(Cart::content());

		        if( $cartcontain ){	
					/*print_r($input);
					die;*/
		        	if($token){
			        	$charge = Charge::create([
			            'amount' => (int)$input['amount'],
			            'currency' => 'usd',
			            'description' => 'HELLO',
			            'source' => $token,
			            ]);     

				      	$data=Order::create([
			                'user_id' => Auth::id(),
			                'payment_getway' => 'stripe',
			                'token' => $token,
			                'amount' => $charge['amount'], 
			                'transaction_id' => $charge['balance_transaction'],
			                'status' => $charge['status'],                        
			                'read_status' => $charge['description'],
			                'note' => '',
			                 
			            ]);
			            $product_ids = Session::get('product_name');
			            $productids=explode(',', $product_ids);
			            foreach ($productids as $key => $Item_id) {	
			                   $coursepriceorder = DB::table('courses')->where('id', $Item_id)->first();            	
				            	Item::create([
								'order_id' => $data->id,
								'item_id' => $Item_id,               
								'quantity' => 1,
								'price' => $coursepriceorder->actual_price,               
							]);	
			            	# code...
			            }									

						DB::table('orders')
						->where('id', $data->id)
						->update(['status' => 'complete']);
						Cart::destroy();
						session(['product_name' => '']);
						session(['total_amount' => '']);
			        }
			         //
			        
			        return redirect('myorder');
			     	//return 'Payment Success!';
		        //return view('paymentsuccess', array('orderid' => $data->id, 'breadcrum'=>'', 'title' => 'Success', 'description' => '', 'page' => 'order','class'=>'order','type'=>"innerpage")); 
		    }else{
		    	return redirect('cart');
		    }

		}

}
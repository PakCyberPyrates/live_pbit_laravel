@extends('layouts.app')
@section('title',$title)
@section('style')
@endsection
 @section('content')      
<section id="cart_items">  
    <div class="payment-not-success-msg">
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
    </div>
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb shopping_cart">            
                <li class="active">{{ __('messages.Shopping_cart') }}</li>
            </ol>
        </div>
        <div class="apply-coupon">
            <ol class="breadcrumb shopping_cart apply_promo_code">            
                <li class="active">
                    <span class="inner_copan_code">
                        <input type="text" id="coupon" name="coupon" placeholder="Apply Coupon Here">
                        <button id="apply-coupon">Apply</button>
                        <button id="remove-coupon" style="display: none;">Remove Coupon</button>
                    </span>
                </li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
        @if(count($cart))
        <div class="cart-list-section_top">
            <div class="cart-list-section">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                        <td class="image">{{ __('messages.Items_cart') }}</td>
                        <td class="description"></td>
                        <td class="price">{{ __('messages.Price_cart') }}</td>
                        <td class="quantity">{{ __('messages.Quantity_cart') }} </td>
                        <td class="total"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @php  $count=1; @endphp
                        @foreach($cart as $item)
                        <tr>
                            <td class="cart_product">
                                @php  echo $count; @endphp
                            </td>
                            <td class="cart_description">
                                @php 
                                    $image = '' ;
                                    if(file_exists('public/uploads/thumnail/'.$item->options->image.'') && ($item->options->image !='')){
                                        $image = asset('public/uploads/thumnail/'.$item->options->image.'');
                                    }else{
                                        $image = asset('public/frontview/images/NoPicture.jpg');
                                    }  
                                @endphp
                                <h4><a href=""> <img class="product_image_cart" style="width:10%" src="{{$image}}" alt="img" class="img-fluid border-radis"/>{{$item->name}}</a></h4>                           
                            </td>
                            <td class="cart_price">
                                <p>${{$item->price}}</p>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">1</p>
                            </td>
                            <td class="cart_delete">
                                <form  class="formcart" method="POST" action="{{url('remove')}}">
                                    <input type="hidden" name="product_id" value="{{$item->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-fefault add-to-cart">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form> 
                            </td>
                        </tr>
                        @php  $count++; @endphp
                        @endforeach
                    </tbody>
                </table>
                     <div class="row discount-container" >
                 <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li><b> {{ __('messages.Total_cart') }}</b><span class="subtotal" > ${{Cart::subtotal()}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="chose_area">
                    <ul class="user_info">
                        <li> {{ __('messages.Shipping_Cost_cart') }} <span> {{ __('messages.Shipping_Cost_Free_cart') }}</span></li>
                    </ul>
                </div>
            </div>
          
        </div>
            </div> 
            @else
            <div class="No-item-in-cart">
                <p>{{ __('messages.cart_empty_message') }}</p>
                <div class="continue-shopping-btn"><a href="{{url('/course')}}">{{ __('messages.Continue_shopping_cart') }}</a></div>
            </div>
            @endif          
        </div>
        </div>
    </div>
</section> <!--/#cart_items-->
@if(count($cart))
<section id="do_action">
    <div class="container">
        <div class="heading">
        <!--        <h3>What would you like to do next?</h3> -->
        </div>
   

        <div class="row">
            @php
                session()->put('total_amount', Cart::subtotal());
            @endphp

            @if (Auth::check())
            <div class="col-sm-12">
            <div class="button-section-user"> 
                <form  class="formcart" method="POST" action="{{url('checkout')}}">   
                    @php $count=0; @endphp
                    @foreach($gatewaylisting as $key=> $listing)
                    <div class="pay-box changeposition{{$count}}">                
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">              
                        <div class="row no-gutters">
                            <div class="col-sm-10">
                                <div class="radio radio-primary">                          
                                    <input name="radio1" id="radio{{$count}}" value="{{$listing->name}}"  {{ $count === 1 ? "checked" : "" }}  type="radio">
                                    <label for="radio{{$count}}" class="label-textt">
                                        @if(strtolower($listing['name']) == 'stripe')
                                            Credit Card
                                        @else
                                            {{ $listing['name'] }}
                                        @endif                           

                                    </label>
                                    <p class="pargh">{{ __('messages.cart_page_text') }}</p>
                                </div>
                            </div>                            
                        </div>                          
                    </div>

                    @php $count++; @endphp          
                    @endforeach
                    <button type="submit" class="btn btn-fefault add-to-checkout">{{ __('messages.Checkout_cart') }}</button>
                    <a href="{{url('/course')}}"><div class="btn btn-fefault continue-shopping-btn">{{ __('messages.Continue_shopping_cart') }}</div></a>
                </form>
             </div>
            </div>
            @endif

            <div class="col-sm-12">
                <div class="total_area_withoutlogin">
                @if (Auth::check())                    
                    @else
                        <button  class="btn login_btnn checkoutsection add-to-checkout" id="mycheckout" type="submit">{{ __('messages.Checkout_cart') }}</button>
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
    
 {{--@include('components.testimonials')--}}

    <div class="container">       
     @include('components.customcode')
    </div>
    @endsection

@section('script')
<script src="{{ asset('public/frontview/assets/js/checkout-script.js') }}"></script>
<script type="text/javascript">
    var IS_APPLIED = false ;
    var COUPON =  '';
    $(document).ready(function(){
        $('#apply-coupon').on('click',function(e){
            e.preventDefault();
            var that = $(this);
            var coupon = $('#coupon').val();
            if(IS_APPLIED){
                $.alert('you have already apply coupon on this');
                return false;
            }
            if(coupon ==  ''  || coupon.length === 0 || typeof coupon === "undefined"){
             return false;
            }
              $.ajax({
                        method: 'GET',
                        url: BASE_URL+"/coupon/apply",
                        data : { 'coupon_code' : coupon },
                        success: function(response){
                            
                            if(response.status){
                                $('.total_area ul').append(response.html);
                                IS_APPLIED = true;
                                COUPON = coupon;
                                that.hide();
                                $('#remove-coupon').show();
                            }else{
                                $.alert(response.messages);
                            }
                        }
                    });
            
        });

        $(document).on('click','#remove-coupon',function(){

            $('#coupon').val('');
            var that = $(this);
             $.ajax({
                        method: 'GET',
                        url: BASE_URL+"/coupon/remove",
                        data : { },
                        success: function(response){
                            
                            if(response.status){
                                // $('.discount-container').append(response.html);
                                $('input[name="total_amount"]').val(response.data.total);
                                 IS_APPLIED = false;
                                 that.hide();
                                 $('#apply-coupon').show();
                                 $( ".total_area ul li.dynamic" ).remove();
                            }
                        }
                    });
        });
        // document end
    })
</script>
@endsection
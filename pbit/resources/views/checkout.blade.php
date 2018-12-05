@extends('layouts.app')
@section('title',$title)
@section('style')
@endsection
@section('content')      
<!-- checkout_section">  -->
        <div class="checkout_section check_section_list">
            <div class="container">
                <div class="row">   
                    <div class="col-sm-12 new_cols"> 
                        @php  $nameproduct = array();@endphp
                        @foreach($cart as $item)                     
                        <div class="inner-checkout">
                            <h3 class="headings">{{$item->name }}</h3>
                            @php
                                $nameproduct[]= $item->name;
                            @endphp                    

                            <div class="bx_outer_area">
                                <div class="bx-1eft">   
                                    @php
                                        $image = '' ;
                                        if(file_exists('public/uploads/thumnail/'.$item->options->image.'') && ($item->options->image !='')){
                                            $image = asset('public/uploads/thumnail/'.$item->options->image.'');
                                        }else{
                                            $image = asset('public/frontview/images/NoPicture.jpg');
                                        }
                                    @endphp 
                                    <a href=""><img src="{{$image}}" alt="img" class="img-fluid border-radis img_checkout"/></a> 
                                </div>
                                <div class="bxx-right"> 
                                    <p class="demi_text ">{{$item->name }}</p>
                                    <p class="student_name name_text11">{{ __('messages.Development_checkout') }}<span> {{ __('messages.by_checkout') }}</span> Admin</p>                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="total_about_checkout">
                        <span class="rates">
                            <h3 class="rates1"><span>$</span>{{ session()->get('total_amount') }}</h3>
                        </span> 
                    </div>
                    <div class="col-sm-12">             
                        @php echo $paymentmethod; @endphp
                    </div>
                </div>               
            </div>
        </div>       
<!-- checkout_section"> end -->     
 {{--@include('components.testimonials')--}}
<div class="container">       
     @include('components.customcode')
</div>
@endsection
@section('script')
<script src="{{ asset('public/frontview/assets/js/checkout-script.js') }}"></script>
@endsection
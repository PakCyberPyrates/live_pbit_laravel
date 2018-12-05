@extends('layouts.app-user')
@section('title',$title)
@section('right-content')
<div class="container_order">
    @php
    @endphp  
    @if(count($orderliist)>0)  
    <h2 class="orderlist_page">My Order</h2> 
    <div class="cart-list-section">	 
      <table class="table ordertablelist">
        <thead>
          <tr>
            <th>S/n</th>
            <th>Order Number</th>
            <th>Payment Getway</th>       
            <th>Created At</th>
            <th>Status</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody> 
          @php  $count=1; @endphp
          @foreach($orderliist as $lists)
          <tr>
            <td>{{$count}}</td>
            <td>{{$lists->id}}</td>
            <td>{{$lists->payment_getway}}</td>			
            <td>{{$lists->created_at}}</td>
            @if($lists->status =='complete')<td><span style="color:green" class="label status order_com"><span class="textred">{{$lists->status}}</span></span></td> @endif
            @if($lists->status =='pending')<td  style="color:blue"><span class="label status order_com"><span class="textred">{{$lists->status}}</span></span></td> @endif
            @if($lists->status =='cancelled')<td style="color:red"  style="color:red"><span class="label status order_com"><span class="textred">{{$lists->status}}</span></span></td> @endif		
            <td orderid="{{$lists->id}}"><a href="myorder/{{$lists->id}}"><span class="label status"><span class="textred">View</span></span></a></td>
          </tr>
          @php  $count++; @endphp
          @endforeach
        </tbody>
      </table> 
    </div>
    @else
    <div class="outer-no-order">
      <div class="dont-have-any-order1">
        <div class="dont-have-any-order">
          <p class="no-order_pargh">{{ __('messages.ordernotfound') }}</p>
          <a class="buy_now1" href="{{url('course')}}">{{ __('messages.buy') }}</a>
        </div>
        <div class="dont-have-any-order-right">
          <img class="order_right_imgg" src="{{asset('public/frontview/images/empty_order.png')}}" alt="img">
        </div>
      </div>
    </div>
    @endif
</div>
@endsection
<style type="text/css">
td{
padding: 10px;
vertical-align: middle;
font-size: .94em;
}

.status {
display: block;
font-size: .9em;
line-height: 31px;
border: 2px solid #ccc;
border-radius: 3px;
background-color: #fff;
color: #333;
text-align: center;
}
</style>
@extends('layouts.app-user')
@section('title',$title)
@section('right-content')
<div class="container_singleorder">
  <h2 class="orderlist_page">My Items</h2> 
  <div class="cart-list-section">	   
    <table class="table ordertablelist single_order_view">
        <thead>
          <tr>
            <th>S/n</th>
            <th>Course Name</th>
            <th>Price</th>          
            <th>Status</th>
            <th>transaction_id</th>
          </tr>
        </thead>
        <tbody>
          @php 
          $count=1;
          $price=array(); 
          @endphp
          @foreach($itemsdetails as $items)
          {{--{{$items->order_id}}
          {{$items->item_id}}
          {{$items->price}}
          {{$items->created_at}}
          {{$items->user_id}}
          {{$items->image}}
          {{$items->status}}
          {{$items->transaction_id}}
          {{$items->course_name}}
          {{$items->course_title}}
          {{$items->course_description}}--}}  
          <tr>
          <td>{{$count}}</td> 
          <td><a  class="item_img_li" href="{{url('course/')}}/{{$items->course_name}}"><img  class="items_image " src="{{url('public/uploads/thumnail/')}}/{{$items->image}}">{{$items->course_name}}</a></td>
          <td>${{$items->price}}</td>     

          @if($items->status =='complete')<td><span style="color:green" class="label status status-unpaid"><span class="textred">{{$items->status}}</span></span></td> @endif
          @if($items->status =='pending')<td  style="color:blue"><span class="label status status-unpaid"><span class="textred">{{$items->status}}</span></span></td> @endif
          @if($items->status =='cancelled')<td style="color:red"  style="color:red"><span class="label status status-unpaid"><span class="textred">{{$items->status}}</span></span></td> @endif 

          @php  $price[]=$items->price @endphp

          <td orderid=""><span class="label status status-unpaid"><span class="textred"></span>{{$items->transaction_id}}</span></td>
          </tr>   
          @php  $count++; @endphp
          @endforeach
        </tbody>
    </table> 
  </div>
  <div class="extracharges">
    <div class="listpage_total_amount">Sub {{ __('messages.Total_cart') }}<span> @php echo '$'.array_sum($price); @endphp</span></div>
    @php 
      $subto=array_sum($price);
      $tax=0;
      $remain = ((int)$subto - (int)$tax);
    @endphp
    <div class="tex-charg"><label>Tax:</label><span></span></div>
    <div class="coupon-charg"><label>Coupon:</label><span></span>
      <div class="coupon-charg"><label>Total Abount:</label><span> ${{$remain}}</span>
      </div>
    </div>
  </div>
</div>
@endsection
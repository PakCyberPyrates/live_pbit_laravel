@extends('layouts.app')
@section('title',$title)
@section('style')
@endsection
@section('content')
@if(count($lists))
@include('components.trial-video')
@endif
<!-- Beginner Course end -->
<!--------------     beginner-chapter  ------------------------>
<div class="beginner-chapter" id="topic_detail_section">
  <div class="container">
      @if(count($lists))
    <h4 class="view_heading">
      {{ ucfirst($class) }} Chapters {{$lists->count()}}-{{$lists->total()}}
    </h4>
    @foreach($lists as $list) 
    <div class="row margin-tp1">
      <div class="col-md-3">
          @php
            $image = '' ;
            if(file_exists('public/uploads/thumnail/'.$list->image.'') && ($list->image !='')){ 
              $image = asset('public/uploads/thumnail/'.$list->image.'');
            }else{         
              $image = asset('public/frontview/images/NoPicture.jpg');
            }       
          @endphp   
          <a href="{{url('/')}}/user-dashboard"><img src="{{$image}}" alt="img" class="rounded img-fluid img-chapter" /> </a>
      </div>                                    
      <div class="col-md-9">
          <div class="chapter_right">
              <a href="{{url('/')}}/user-dashboard"><h5 class="demi_text ">{{ ucfirst($list->title) }}</h5></a>
              <ul class="chapt-link">
                  <li>{{ __('messages.best_seller') }} </li>                               
                  <li><i class="far fa-building"></i>{{ __('messages.all_levels') }}</li>
                  <li><i class="far fa-clock"></i>12</li>
              </ul>
              <p class="mid-pargh"> 
             {{ ucfirst(substr($list->description,0,220)) }}...
              </p>
              <a href="{{url('/')}}/user-dashboard"><h5 class="demi_text startbtn">Start Course</h5></a>
          </div>      
      </div>
    </div>
    @endforeach
    <!-- paginations -->
    <div class="paginationd paginationsd">
        {!! $lists->render() !!}
    </div>
    @else
    <h4 class="view_heading">
      Oops!.. No Chapters Found in {{ ucfirst($class) }} Course.
    </h4>
    @endif
  </div>
</div>
@include('components.testimonials')
<div class="container">
    @include('components.customcode')
</div>
@endsection

@section('script')
<script type="text/javascript">
</script>
@endsection
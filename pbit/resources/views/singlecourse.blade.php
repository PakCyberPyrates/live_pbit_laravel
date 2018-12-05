@extends('layouts.app')
@section('title',$title)
@section('style')
@endsection
@section('content')
@php   count($chapter_list); @endphp
<?php //$base_url=rtrim($app['url']->to('/'),'public'); ?>
@include('components.course_over_view')
<!-- Beginner Course end -->
<!--------------     beginner-chapter  ------------------------>
<div class="beginner-chapter single_inner_section">
    <div class="container">
        @if(count($chapter_list))
        <h4 class="view_heading">
            {{--{{ ucfirst($class) }} Chapters {{$lists->count()}}-{{$lists->total()}} --}}
        </h4>
        @foreach($chapter_list as $list)                     
        <div class="row margin-tp1">
            <div class="col-md-3">    
                @php
                    $image = '' ;
                    if(file_exists('public/uploads/thumnail/'.$list->image.'') && ($list->image !='')){ 
                        $image = asset('public/uploads/thumnail/'.$list->image.'');
                        $download=1;
                    }else{         
                        $image = asset('public/frontview/images/NoPicture.jpg');            
                        $download=0;
                    } 
                @endphp 
                <img src="{{ $image }}" alt="img" class="rounded img-fluid img-chapter" />                 
            </div>                                    
            <div class="col-md-9">
                <div class="chapter_right">                                          
                    <h5 class="demi_text ">  {{ ucfirst($list->title) }} </h5>
                    <ul class="chapt-link">
                        <li>{{ __('messages.best_seller') }}</li>
                        <li><i class="far fa-address-book"></i>{{$list->totalcount}} Lectures</li>
                        <!-- <li><i class="far fa-building"></i>{{ __('messages.all_levels') }}</li>
                        <li><i class="far fa-clock"></i>43 hours</li> -->
                    </ul>
                    <p class="mid-pargh"> 
                        {{ str_limit($list->description, 500) }}
                    </p>
                </div>      
            </div>
        </div>
        @endforeach
        <!-- paginations -->
        <div class="paginationd paginationsd">
            {{ $chapter_list->render() }}
        </div>
        @else
        <h4 class="view_heading">
            Oops!.. No Chapters Found in {{ ucfirst($class) }} Course.
        </h4>
        @endif
    </div>
</div>         
<!--------------     beginner-chapter  ------------------------>    
<!-- categories-section end -->
<!-- Students are viewing  end -->
@include('components.testimonials')
<div class="container">
     @include('components.customcode')
</div>
@endsection
@section('script')
@endsection
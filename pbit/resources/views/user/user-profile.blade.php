@extends('layouts.app-user')
@section('title',$title)
@section('right-content')
<?php $user = Auth::user(); 
//print_r($user);
 if(empty(Auth::user()->first_name)){$user->first_name=Auth::user()->name;}
/*$name=explode(' ', $user->name);
if(!empty($name[0])){$user->first_name=$name[0];}else{$user->first_name="";}
if(!empty($name[1])){$user->last_name=$name[1];}else{$user->last_name="";} */
 ?>


<form class="update-profile_pbit" enctype="multipart/form-data" method="POST" action="{{url('/')}}/updateProfile">
<div class="form-group form_3">
			
			@php
			$userImg = '';
			if($user->avtar != ''){
				if(file_exists('public/images/avatar/'.$user->avtar.'')){
					$userImg =   "public/images/avatar/".$user->avtar;		
				}else{
					$userImg = "public/frontview/images/NoPicture.jpg";
				}					
			}else{
				$userImg = "public/frontview/images/NoPicture.jpg";
			}
			@endphp
			<span class="profileimg"> <img src="{{$userImg}}"/> </span>
			<div class="image-upload">
			<label for="file-input">
				<span class="avtar-icon"> Change Avtar </span>
			</label>

			<input id="file-input" type="file" class="form-control{{ $errors->has('userimg') ? ' is-invalid' : '' }}"  name="userimg" id="profilepic"/>
		</div>
			
		</div>
		 @csrf
		<div class="form-group form_1">
			
			<input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"  placeholder="Enter First name" name="first_name" value="{{$user->first_name}}" id="name">
		    @if ($errors->has('first_name'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('first_name') }}</strong>
				</span>
            @endif
		</div>
		<div class="form-group form_2">	 		
			<input type="text"  placeholder="Enter Last name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{$user->last_name}}" id="name">
			@if($errors->has('last_name'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('last_name')}}<strong>
				</span>	
			@endif
		</div>
		 
		<button type="submit" class="btn btn-default submit_change_pass">Submit</button>
</form>		
@endsection		
<style>
.image-upload > input
{
    display: none;
}

.image-upload img
{
   width: 80px;
   cursor: pointer;
}
</style>																																										
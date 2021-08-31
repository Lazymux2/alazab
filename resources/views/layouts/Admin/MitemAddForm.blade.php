@extends('layouts.Admin.AdminHeader') 

@section('con')
    

<div class='container-fluid' style="max-width: 95% !important;">

    @if (count($errors)>0)
    @foreach ($errors as $ero)
        
    <strong class="alert-danger">
        {{$ero}}

    </strong>
    @endforeach
        
    @endif

    @if (Session::get('stat')=='ok')
    
    <div class="alert alert-success alert-block ">

        <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{Session::get('message')}} </strong>

    </div>


    
    @endif

    @if (isset($mitem))

    <?php
    $name=$mitem->name; 
    $id=$mitem->id;
    $desc=$mitem->desc;
    $imgs=$mitem->imgs;
    $item_id=$mitem->item_id;
    $price=$mitem->price;
    ?>
    @endif

    <div class="row">
    <form id="prodForm" method="POST" action="{{route('Mitemadd')}}" dir="auto" class="form-control col-md-5" enctype="multipart/form-data"  >
    @csrf
        
    <div class="row">
    
    <div class="col-md-12">
    <input id="name" 
     @if (isset($mitem)) value="{{$name}}"@endif  required  class="form-control" placeholder="الاسم" value="{{old('name')}}" name="name" type="text">
    <br/>
    <textarea   required rows="6"  id="desc" class="form-control" placeholder="Add Desc" name="desc" >@if (isset($mitem)) {{$desc}} @endif{{old('desc')}}</textarea>
    <br/>
    <input type="number" @if (isset($mitem)) value="{{$price}}"@endif id="price" value="{{old('price')}}" name="price"  class="form-control">
    <div class="form-group" align="center">
        <br/>
        <select id="itemid" name="itemid" @if (isset($mitem)) value="{{$item_id}}"@endif class="list">
        
            <option value="ll">اختر القسم</option>
            @foreach ($items as $it)
                
            @if (isset($mitem) && $it->id==$item_id)
                
            <option selected value="{{$it->id}}">{{$it->titel}}</option>
            @else
                
            <option value="{{$it->id}}">{{$it->titel}}</option>
            @endif
            @endforeach
        </select>
        </div>
        @isset($vcount)
        <span class="fa fa-eye"></span>
        عدد المشاهدات{{$vcount}}
            
        @endisset
       
        <input type="hidden" name="image" value="" id="inp_img">
        
        
        
        @isset($mitem)
        <input type="hidden" name="mid" value="{{$id}}"/>

        <button type="button"  onclick="if(confirm('Are U Sure to delete')) document.delmitem.submit();"
        class="form-group btn-outline-warning disabled"> <span class="fa fa-trash-o fa-lg "></span></button>
    
            
        @endisset
        
    <button type="submit" onclick="submit_form($(this),'#prodForm')" class="form-group btn-inline btn-success" value="Save">Save</button>
    <a href="{{ route('Mitemadd') }}"  class="form-group btn-inline "><span class="fa fa-refresh"></span>new </a>

    <br/>
    </div>


        
    @if (count($errors)>0)

    <div class="alert alert-danger">
    
      <strong>Whoops!</strong> There were some problems with your input.
    
      <ul>
    
          @foreach ($errors->all() as $error)
    
              <li>{{ $error }}</li>
    
          @endforeach
    
      </ul>
    
    </div>    
    @endif
    </div>
  
    </form>
    
<br/>


    <div   class="col-md-6 col-sm-6 bg-light  ">
        
        <input  id="imagefiles" class="form-control mt-2 m-b-2" name="image[]" accept="images/*"   multiple type="file" >
        
        <div id='Simgs' class="row">
            @isset($mitem)

            @foreach (json_decode(json_encode( $mitem->imgs)) as $img)
            <div id="{{$img}}" align="" class="tableitem col-lg-2 col-md-3 col-sm-6 border ">
            <img class="img-thumbnail mt-2" src="{{$img}}"  />
<?php

echo '<a class="btn mt-2 mb-2 deletebtn" onclick="delimgitem('."'$img'".','.$mitem->id.',$(this));"> <span class="fa fa-trash-o "></span> </a>'
?></div>
    @endforeach
                
            @endisset
        </div>
        </div> 
    </div>   

    

    
</div>
@isset($mitem)
        
    <form class="col-md-1" name="delmitem" action="{{ route('delmitem') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$id}}" />
    

    
    </form>
    @endisset  

    
@endsection
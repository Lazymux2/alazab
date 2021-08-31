@extends('layouts.Admin.AdminHeader')


@section('con')
    

<div class="container">
    @if (Session::get('stat')=='ok')
        
    <div class="alert alert-success alert-block ">
    
      <button type="button" class="close" data-dismiss="alert">×</button>
    
          <strong>{{Session::get('message')}} </strong>
    
    </div>
    
    
    @endif



    <form dir="auto" id="locForm" class="form-control" enctype="multipart/form-data" action="{{route('locadd') }}" method="post">
        @csrf
        <input type="hidden" name="lid" id="lid">

        <div class=""  style="width: 50%;" align="center">
            <label for="lisloc">اختر الفرع </label>
            <select  id="lisloc" name="lisloc" placeholder="Chose The Department" class="form-control form-inline">
            
                <option value="">اختر الفرع</option>
                @foreach ($locs as $loc)
                    
                <option value="{{$loc->id}}">{{$loc->name}}</option>
                @endforeach
            </select>
            </div>

            <div class="container-fluid">
                <div class="row mt-2">
                <label class="col-2" for="name">اسم الفرع</label>
                <input class="form-control col-10" type="text" name="name" required id="name">
            </div>
            <div class="row mt-2">
                <label for="phone" class="col-3">رقم هاتف الفرع</label>
                <input class="form-control col-9" type="text" name="phone" required id="phone">
                

            </div>
            <div class="row mt-2">
                <label for="address">عنوان الفرع</label>
                <input class="form-control" type="text" name="address" required id="address">
                

            </div>

            <div class="row mt-2">
                <label for="addurl">رابط موقع الفرع </label>
                <input class="form-control" type="url" name="addurl"  id="addurl">
                

            </div>
            
            <div class="row">
                <input type="submit" onclick="submit_form($(this),'#locForm')" value="sub" class="btn btn-primary" >
                <input type="hidden" name="image" value="" id="inp_img">
                <a href="{{route('locadd',false)}}" class="btn">New</a>
            </div>
            </div>


    </form>

    <div dir="auto" class="row mt-2">
                
        <div class="col-lg-4 col-md-2">

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
        <label for="imagefiles">صورة</label>
        <input class="form-control" type="file" accept="Images/*" name="img"  id="imagefilesLoc">
        </div>
        <div class="col-lg-8 col-md-10">
        <img src=""  width="80%" id="imageloc" alt="Photo of Loc" >
        </div>

    </div>
    <form name="deleteloc" style="display: none;" action="{{route('deleteloc') }}" method="post">
        @csrf
        <input type="hidden" id="dlid" name="dlid">

        <input type="button" class="btn" value="Delete" onclick="if(confirm('Are You Sure to delete?'))  document.deleteloc.submit(); " style="visibility: hidden" id="dellocbtn">



    </form>





</div>    


@endsection
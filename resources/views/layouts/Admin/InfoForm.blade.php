@extends('layouts.Admin.AdminHeader')

@section('con')

<div class="container-fluid">
  @if (Session::get('stat')=='ok')
    
<div class="alert alert-success alert-block ">

  <button type="button" class="close" data-dismiss="alert">×</button>

      <strong>{{Session::get('message')}} </strong>

</div>


@endif

<form  class="form-contorl" method="POST" enctype="multipart/form-data" action="{{route('InfoForm') }}">
  @csrf
  
  @isset($facebook)

  <input type="hidden" name="Edite" value="Edite">
  @endisset
  <div class="container mt-3">
        <h4>معلومات الصفحة الاساسية </h4>
        <div class="row">
          
            <lable for="facebook" class="form-inline mt-1 col-md-2 " ><span style="color: blue !important; font-size:large !important;" class="fa fa-facebook"> facebook: </span></lable>  
            <input value="@isset($facebook) {{$facebook}} @endisset" type="url" required id="facebook" name="facebook" class="form-control mt-2 col-md-10" placeholder="URL">
          
        </div>
      <hr>
        <div class="row mt-3">
          
            
              <lable class="form-inline col-md-2 border"><span class="fa fa-envelope-o too-icon"> Gmail:</span> </lable>  
            
            <input value="@isset($gmail) {{$gmail}} @endisset" type="url" required name="gmail" class="form-control col-md-8" placeholder="URL">

          </div>


          <div class="row mt-3">
           
            <div class="input-group-prepend col-md-5 mt-2">
              <lable class="form-inline col-md-4 border"><span style="color: cornflowerblue !important;" class="fa fa-phone-square">TelPhone:</span> </lable>  
              <input type="tel" value="@isset($telephone) {{$telephone}} @endisset" required name="telephone" class="form-control col-md-8" placeholder="01-637-589">
            </div>
            
            <div class="input-group-append col-md-5 mt-2 ">
              <lable class="form-inline border col-md-4" ><span style="color: green !important;" class="fa fa-mobile">MobliePhone:</span> </lable>  
              <input type="tel" value="@isset($mphone) {{$mphone}} @endisset" required name="mphone" class="form-control col-md-8" placeholder="+967-70-9999-999">
            
            </div>
            
            
          </div>


          <div class="row mt-3" dir="auto">
           
              <lable class="form-inline border col-md-2"><span  class="fa fa-map-marker">العنوان الرئيسي:</span> </lable>  
              <input type="text" value="@isset($addtxt) {{$addtxt}} @endisset" required name="addtxt" class="form-control col-md-10" placeholder="text">
  
          </div>
          <div class="row mt-3" dir="auto">
           
              <lable class="form-inline border col-md-2" ><span class="fa fa-url">رابط العنوان جوجل ماب</span> </lable>  
              <input type="url" value="@isset($addurl){{$addurl}} @endisset" required name="addurl" class="form-control col-md-10" placeholder="url">
            
          </div>
          <div class="row mt-3">
           
            <div  class="input-group col-12" dir="auto">
              <lable for="note"  class="form-inline col-md-3 border"><h2> <span style="color: lightsalmon !important" class="fa fa-tags"> نبذة عنا</span></h2></lable>
                <textarea id="note"  required name="note" class="form-control col-md-9" style="min-height: 150px;" placeholder="Main Note">@isset($note){{$note}} @endisset</textarea>
           </div>
            
          </div>
          <input type="submit" class="btn btn-success btn-block mt-4 mb-2" value="go"/>  
           
          
      </div> 
    
    
  
  
    
    </form>
  </div>

@endsection
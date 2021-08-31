@extends('layouts.Admin.AdminHeader')

@section('con')
    

<div  class="container-fluid">
@if (Session::get('stat')=='ok')
    
<div class="alert alert-success alert-block ">

  <button type="button" class="close" data-dismiss="alert">×</button>

      <strong>{{Session::get('message')}} </strong>

</div>


@endif





<input type="hidden" name="count" id="count">
<input type="hidden" name="size" id="size">
<form  dir="auto" id="deptForm" class="form-control" enctype="multipart/form-data" action="{{route('deptadd') }}" method="post">
    @csrf

    
<div class="" align="center">
<select   id="listitemser" placeholder="Chose The Department" class="custom-select col-8 form-inline">

  <option  value="">اختر القسم</option>
    @foreach ($item as $it)
        
    <option  value="{{$it->id}}">{{$it->titel}}</option>
    @endforeach
</select>
</div>
<br/>
    
<div class="row">


  

<div class="col-md-5 col-sm-6">
<input   id="titel" required class="form-control col-8" placeholder="اسم القسم" value="" name="titel" type="text">
<br/>
<textarea required rows="6"   id="desc" class="form-control" placeholder="Add Desc" name="desc" ></textarea>
<br/>

<button id="new" type="reset" class="form-group btn-inline "><span class="fa fa-refresh"></span></button>
<button type="submit" onclick="submit_form($(this),'#deptForm')" class="form-group btn-inline btn-outline-success  "><span class="fa fa-save"></span> Save</button>
<button type="button" style="visibility: hidden;" id="deldeptbtn"  onclick="if(confirm('Are U Sure to delete')) document.deldept.submit();"
class="form-group btn-outline-warning disabled"> <span class="fa fa-trash-o fa-lg "></span></button>

<input type="hidden" name="image" value="" id="inp_img">

<input type="file" name="images" id="images" style="display: none !important;">
</div>

<div align='center' class="col-md-4 col-sm-4 bg-dark ">
    <p class="bg-light">You Can chose anthore Photo</p>

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
    <a class="btn" data-toggle="modal" data-target="#myModal">
    <img  id="deptimg" class="img-thumbnail" src=""   width="250" height="250"/>
  </a>
    <input type="hidden" class="deptid" name="deptid"/>  
    </div>
    
</div>  
  
</form>
<input id="imagefilesDB"  class="form-control-file image " accept="images/*" name="ima" type="file"> 
  

<form dir="auto" style="display: none;" name="deldept" enctype="multipart/form-data" method="POST" action="{{route('deldept') }}">
  @csrf
  <input type="hidden"  class="deptid" name="deptid"/>
</form>






  <div id='searchbar'>
 


  </div>


  
<div  class="container-fluid table_moreitems" align='center'>

  <table style="visibility: hidden ;" dir="auto" id="Mitemtable" class="table table-sm   table-hover bg-light" style="color: #000 !important;">
    <thead>
      <tr>
        <td colspan="4">
        
          <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-12 col-12">
              <div class="input-group mb-3">
                <input type="text"   id="searchProdectsAdmin" dir="auto" class="form-control" placeholder="بحث">
                <div class="input-group-prepend">
                  <button class="btn-success btn-sm" type="submit"><span class="fa fa-search"></span></button>
                
                </div>
                
              </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12 col-12">

              <label id="sizelable"></label>
              <a class="link" href="{{ route('Mitemadd') }}" target="_blank" rel="noopener noreferrer">
                <i class="fa fa-plus">
      
                </i>
                new  </a>
             
            </div>

          </div>
          
        </td>
        
      </tr>
      
      
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Images</th>
        <td>Edit </td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="4">
          <button id="showmorebtn" onclick="showMoreProdect()"  class="btn btn-block" >

            <h2>
            More
            <span class="fa fa-angle-double-down">

            </span>
          </h2>
          </button>


        </td>
      </tr>
    
    </tfoot>
    <tbody id="tbdoy">

        </tbody>
      </table>
  
</div>

  <div class="container-fluid bg-light">
<div class='row items rowitems' >
</div>
  </div>
</div>





@endsection


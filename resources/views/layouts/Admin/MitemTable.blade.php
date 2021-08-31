

@extends('layouts.Admin.AdminHeader')


@section('con')
    

    @if (Session::get('stat')=='ok')
    
    <div class="alert alert-success alert-block ">

        <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{Session::get('message')}} </strong>

    </div>


    
    @endif

    @isset($count)
    <input type="hidden" id="count" name="count" value="{{$count}}"/>
        <input type="hidden" name="size" id="size" value="{{$size}}" />
    @endisset
    <input type="hidden" name="did" id="listitemser" value="all">


    <div class="container-fluid  mt-5 text-center">

        

  <table dir="auto" id="Mitemtable" class="table table-sm  table-hover bg-light" style="color: #000 !important;">
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

              <label id="sizelable">{{$count}} من : {{$size}}</label>
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
          <button id="showmorebtn"   class="btn btn-block" >

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

        @include('layouts.Admin.tableofitems',Array('items'=>$items))

        </tbody>
      </table>
    
      
</div>



  


@endsection
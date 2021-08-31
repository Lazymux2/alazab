@extends('layouts.Admin.AdminHeader')

@section('con')



<div class="container">
<table dir="auto" id="ordertable" class="table  bg-light table-responsive-sm ">

  <thead class="text-center">
    <tr>
      <th colspan="7">
      
        <div class="row" dir="rtl">
          <div class="col-xl-10 col-md-8 col-sm-12 col-12">
            <div class="input-group mb-3">
              <input type="text"   id="searchProdectsAdmin" dir="auto" class="form-control" placeholder="بحث">
              <div class="input-group-prepend">
                <button class="btn-success btn-sm" type="submit"><span class="fa fa-search"></span></button>
              
              </div>
              
            </div>
          </div>
          <div class="col-xl-2 col-md-4 col-sm-12 col-12">

            @isset($count)
                
            <input type="hidden" name="count" id="count" value="{{$count}}">
            <input type="hidden" name="size" id="size" value="{{$size}}">
            
            <label id="sizelable">{{$count}} من : {{$size}}</label>
            @endisset
          </div>

        </div>
        
      </th>
      
    </tr>

    <tr>
    <th> العميل</th>
    <th> المنتج</th>
    <th >العنوان </th>
    <th>مكتمل؟</th>
  </tr>
  </thead>
  <tfoot class="text-center">
    <td colspan="3">
      @isset($stat)

      @if ($stat=='Yes')
      <a class="btn" id="moreOrder">More <span class="fa fa-angle-double-down"></span></a>
          
      @else
          
      @endif
          
      @endisset
    </td>
  </tfoot>

<tbody id="tbody">
    
  @include('layouts.Admin.roworder',Array('orders'=>$orders))




{{--
  @foreach ($orders as $p)

  <tr class="showData text-center" style="border-bottom: none !important" role="button" data-toggle="collapse" href="#c{{$p->id}}" >
    <td align="right"><h6>{{$p->user->name}}</h6><h6>{{$p->user->phone}}</h6><h6>{{$p->user->email}}</h6>
    
    </td>
    <td><h6 class="text-center">{{$p->moreitem->name}}</h6> <img height="100" width="100" src="../myimages/moreitemsphoto/{{$p->moreitem->imgs[0]}}" class="img-thumbnail"/></td>
    
    <td >
      <a href="https://www.google.com/maps?q={{$p->c_loc}}" target="_blank" rel="noopener noreferrer">
      <span class="fa fa-map-marker p-1"></span>
  
    </a>
      
    </td>
    <td >
      @if ($p->statt)

      <small class="btn-success p-2">Ok</small>
      @else
          <small class="btn-danger p-2">No</small>
      @endif
    </td>
    
  </tr>
  
  <tr class="colls " style="border-bottom: none !important;" >
  
    <td colspan="4" style="border-top: none !important; " >
      <h6><a class="btn btn-block" data-toggle="collapse" href="#c{{$p->id}}">تفاصيل</a></h6>
      <div class="collapse" id="c{{$p->id}}" data-parent="#tbody">
        <table class="col-12 text-center">
        <thead>
          <th>العنوان </th>
          <th>الكمية</th>
          <th>اجمالي</th>
        </thead>
        <tbody>
        <tr>
          <td> {{$p->c_city}} |  {{$p->c_st}}
          </td>
          <td>{{$p->c_count}}</td>
          <td >{{$p->moreitem->price*$p->c_count}}</td>

          
        </tr>
        <tr>
          <th>ملاحظات</th>
          <td colspan="3">
            <p>{{$p->c_message}} </p>
            </td>
        </tr><tr>
          <th>{{__('تاريخ الطلب')}}</th>
          <td colspan="2">
            <p>{{__('منذ ')}}
              
              
              
              {{date_diff($p->updated_at,date_create(date('Y-m-d h:i:s')))->format('%a')}}</p>
            <p>{{$p->updated_at}} </p>
            </td>
        </tr>
        <tr> 
            <td colspan="3">
          <a class="btn"> 
            <span style="font-size: larger !important;" class="text-success btn-lg fa fa-check"> </span></a>

            
            <a  class="btn"  onclick="return confirm('Are you Sure??');"> 
              <span style="font-size: larger !important;" class="fa fa-trash-o fa-lg"> </span></a>
        </td>
        </tr>
      </tbody>
      </table>
        
      </div>
      
    </td>
  </tr>


  @endforeach--}}



</tbody>

</table>

</div>

@endsection



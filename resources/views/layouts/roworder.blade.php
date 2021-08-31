@foreach ($orders as $p)

<?php 
  
  $days= date_diff($p->updated_at,date_create(date('Y-m-d h:i:s')))->format('%a');
            
?>


  <tr class="showData text-center tr{{$p->id}}" style="border-bottom: none !important" role="button" data-toggle="collapse" href="#c{{$p->id}}" >
    <td><h6 class="text-center">{{$p->moreitem->name}}</h6> <img height="100" width="100" src="{{$p->moreitem->imgs[mt_rand(0,count($p->moreitem->imgs)-1)]}}" class="img-thumbnail"/></td>
    
    <td >
        {{$p->c_city}} |  {{$p->c_st}}
        <span class="fa fa-map-marker p-1"></span>
  
    </a>
      
    </td>
    <td >
      @if ($p->statt)

      <b class="text-success fa fa-check p-2"> Ok</b>
      @else
          <b class="text-danger p-2 fa fa-exclamation fa-1x"> No</b>
          <hr>
          @if ($days<=7)
          
          
    
          <b class="fa fa-flag fa-2x text-success"></b>
          <br>
          <small> {{__('جديد')}}</small>
          @endif
          @endif
      
    
    </td>
    
  </tr>
  
  <tr class="colls tr{{$p->id}}" style="border-bottom: none !important;" >
  
    <td colspan="4" style="border-top: none !important; " >
      <h6><a class="btn btn-block" data-toggle="collapse" href="#c{{$p->id}}">تفاصيل</a></h6>
      <div class="collapse" id="c{{$p->id}}" data-parent="#tbody">
        <table class="col-12 text-center">
        <thead>
          <th>الكمية</th>
          <th>اجمالي</th>
        </thead>
        <tbody>
        <tr>
          <td>{{$p->c_count}}</td>
          <td >{{$p->moreitem->price*$p->c_count}}</td>

          
        </tr>
        <tr>
          <th>ملاحظات</th>
          <td colspan="1">
            <p>{{$p->c_message}} </p>
            </td>
        </tr>
        <tr>
          <th>{{__('تاريخ الطلب')}}</th>
          <td colspan="2">
            
            <p><b> {{__('منذ ')}}</b>
              
              @if ($days==0)
              
              {{__('يوم واحد ')}}
              <br>
              @else
                  {{$days}} {{__('يوم')}}
                  <br>
              @endif

              <b class="text-success">  
                {{date('l/ F/  h:i:a',strtotime($p->updated_at))}}
              </b> 
  

            </td>
        </tr>
        <tr> 
            <td colspan="3">
            
            <a  class="btn"  onclick="deleteOrder($(this),{{$p->id}})"> 
              <b  class="text-danger fa fa-trash-o  fa-2x"> </b></a>
        </td>
        </tr>
      </tbody>
      </table>
        
      </div>
      
    </td>
  </tr>


  @endforeach

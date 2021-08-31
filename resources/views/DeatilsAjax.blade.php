<div class="col-12">
<button  class="btn  btn-success " onclick="backToPro()">
    Back 
</button>
</div>
<div class="col-md-6 mt-2" dir="auto" align='center'><h3>{{$item->name}}</h3>
       <p class="mb-2 text-muted text-uppercase small">
           @if(isset($titel))
          <h6> {{$titel}}</h6>
           @else
          
           @foreach ($depts as $dp)
           @if ($dp->id==$item->item_id)
           <h6>{{$dp->titel}}
           </h6>
               
           @endif
               
           @endforeach
           @endif
         </p>
       <p><span class="mr-1"><strong class="price">{{$item->price}}/RY</strong></span></p>
       <p class="pt-1" dir="rtl" align='right'>
        {{$item->desc}}   
       </p>
       <hr>
        <div class="table-responsive">
       <table dir="rtl" class="table table-sm table-borderless mb-0">
           <tbody>
             <tr><th scope="row" class="pl-0 w-25"><strong>الموديل</strong></th>
             <td>{{$item->name}}</td></tr> <tr><th scope="row" class="pl-0 w-25 "><strong>السعر</strong></th>
               <td class="price">{{$item->price}}</td></tr> 
               
             </tbody></table>
            
             <ul class="rating" >
              <li style="padding: 0px; color:yellow;" class="btn fa fa-star"></li>
              <li style="padding: 0px; color:yellow;" class="btn fa fa-star"></li>
              <li style="padding: 0px; color:yellow;" class="btn fa fa-star"></li>
              <li style="padding: 0px; color:yellow;" class="btn fa fa-star"></li>
              <li style="padding: 0px;" class="btn fa fa-star disable"></li>
              <li>
                <small >
              
                  عدد المشاهدات
                  {{$countv}}
                  <span class="fa fa-eye"></span>
                 </small>
              </li>
          </ul>
            </div>
               <hr>

              <div>
                @auth
                <a class="btn m-3 orderNow"  href="{{ route('order', ['proid'=>$item->id]) }}">
                  {{__('اطلب الان ')}}
                  
                </a>
                    
                @else
                <a class="btn m-3 orderNow"  data-toggle="modal" data-target="#loginModel">
                  {{__('اطلب الان ')}}
                </a>

                @include('loginModel',Array('item'=>$item))
                
                @endauth
                
              </div> 
       <div class="row">
           
         </div>
       </div>
     
       
       <div class="col-md-6">
       
         <div class="row">
           <div class="col-12 mb-4" align="center">
             
         <img id="mainimg" src="{{$item->imgs[mt_rand(0,count($item->imgs)-1)]}}"
         class="img-thumbnail mt-1"  />
       </div>
       @foreach ($item->imgs as $img)
 
       <div class="col-lg-3 border col-md-4 col-sm-4 col-6 mt-2" >
       <a class="btn" onclick="showimg('{{$img}}')" >
       <img src="{{$img}}"
       class="img-thumbnail mt-1"/></a>
     </div>
       @endforeach
    
     
     
       </div>
       </div>
   







           







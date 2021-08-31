

<footer id="footer" class=" pl-4 pr-4 pt-2   pb-0 text-white">

  <div class="row">
    <div class="col-md-4"></div>
  <div class=" mt-4 col-md-4" >
    <h2><a class="text-light btn-block">{{env('APP_NAME')}}</a></h2>
    <a class="text-light btn-block"  target="_blank" href="{{env('APP_NAME')}}@info.com">
      <i style="color: red !important;  font-size: x-large;" class="fa fa-envelope-o too-icon m-2"></i>
          
      {{env('APP_NAME')}}@info.com
    </a>
    @if(isset($info) && count($info)>0)
        
   
      <a class="text-light btn-block" title="click to go googel map" href="{{$info['addurl']}}" target="_blank">
        <span  class="fa fa-map-marker too-icon m-2"></span>
      {{$info['addtxt']}}</a>
    <a class="text-light btn-block"><span class="fa fa-phone too-icon m-2"></span> {{$info['mphone']}}
    </a> 
      <a class="text-light btn-block"><span class="fa fa-phone m-2"></span> {{$info['telephone']}}</a>
      <a href="{{$info['facebook']}}">
        <i style="color: blue !important; margin: 20px; font-size: x-large;" class="fa fa-facebook"></i>
      </a>
    <a href="{{$info['gmail']}}">
        <i style="color: red !important; margin: 20px; font-size: x-large;" class="fa fa-envelope-o too-icon"></i>
      </a>
      @endif
  </div>
</div>
  <hr>
  <div class="row mt-5 text-center " >
    <p class="col-12">Copyright © {{date('Y')}} - All Rights Reserved - <a class="text-info" href="#">{{env('APP_NAME')}}</a></p>
  
    <hr>
    <p class="col-12 spinner-border">
      Powerd By : <a class="text-info" href=""> Mohammed AlZoum</a>
    </p>
  </div>
  
</footer>
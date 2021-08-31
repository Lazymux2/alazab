


<div class="card bg-light ">
<div class="card-header"><h3 style="">{{$lo->name}}</h3></div>
<div class="card-body" style="">

  <h6><span class="fa fa-phone"></span>{{$lo->phone}}</h6></p>
  

  <p style="display: inline;" id="LO{{$lo->id}}"> 
    @if (strlen($lo->address)>180)
    <span style="" class="fa fa-map-marker"></span>
    {{substr($lo->address,0,180)}} ..
        <p class="collapse"   id="lor{{$lo->id}}">
          <span style="" class="fa fa-map-marker"></span>
          {{$lo->address}}
        </p>
        <a onclick="$('#LO{{$lo->id}}').slideToggle(900);"  data-toggle="collapse" data-target="#lor{{$lo->id}}"
          class="btn"> ReadMore</a>
         
            
    @else
    <span style="display: inline-block !important;" class="fa fa-map-marker"></span>
    {{$lo->address}}
    @endif
    
    
  </p>
  <a href="{{$lo->url}}"  target="_blank" title="Click To Go Google Map">
    


  <img id="{{$lo->id}}" class="img-thumbnail"  src="{{$lo->img}}"  height="100%" width="100%"/>
  </a>
  </div>


</div>













        
{{--   <script>
            function myMap() {
             // var la=$locMap->lat;
            //var lat=15.307012904647058;
          //  var lng=44.235333432081504;
            var myCenter=new google.maps.LatLng({{$lo->lat}}, {{$lo->lng}});
            var mapProp= {
              center:myCenter,
              zoom:15,
            };
            var divv=document.getElementById("{{$lo->id}}");
           
            var map = new google.maps.Map(divv,mapProp);
            
            var marker = new google.maps.Marker({position: myCenter
            ,animation:google.maps.Animation.BOUNCE
            
            });
            
            var infowindow = new google.maps.InfoWindow({
              content:"Al-Zaba!"
            });
            google.maps.event.addListener(marker,'click',function() {
              map.setZoom(20);
              map.setCenter(marker.getPosition());
              infowindow.open(map,marker);
         
            });
            marker.setMap(map);
            
            }
            </script>
              

--}}


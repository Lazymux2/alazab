
<div class="container-fluid  " align='right'>

    <div id="a{{$id}}" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
    
    
      <ol class="carousel-indicators" align='right'>
      
          @for ($i = 0; $i <count($slide); $i++)
              
          <li data-target="#a{{$id}}" data-slide-to="{{$i}}"  class='active'></li>  
          @endfor
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" align="center" align='right'>


@for ($i=0; $i<count($slide); $i++)

@if ($i==0)
<div class="carousel-item active slideshowmore">
@else
<div class="carousel-item  slideshowmore">
    
@endif
  
    <img class="img-thumbnail" width="100px" height="100px" src="myimages/{{$folder}}/{{$slide[$i]->imgs[mt_rand(0,count($slide[$i]->imgs)-1)]}}"  align='center' alt="Los Angeles"/>
    <div class="carousel-caption slidcapt" style="z-index:1 !important; bottom: 0 !important; position:unset; margin-top: 0px  !important; margin-bottom: 20px !important;"  align="centert">
      <h5 class="mt-1 text-dark" >{{$slide[$i]->name}}</h5>
      <h6 class="text-dark"><small> {{$slide[$i]->price}}</small></h6>
      <a href="{{ route('deatils', ['item'=> base64_encode(json_encode( $slide[$i]))] ) }}"
        target="_blank" rel="noopener noreferrer">
      <span class="fa fa-eye"></span> Show
      </a>
    </div>

</div>
@endfor



      
      </div>
    
      
    </div>
     
    <div class="nav justify-content-center" style="" align='right'>
     
      <a href="#a{{$id}}" class="btn border" data-slide="prev"><h5><span class="fa fa-angle-left"></span></h5></a>
      <a href="#a{{$id}}" class="btn border" data-slide="next" ><h5><span class="fa fa-angle-right"></span></h5></a>

    </div>
    </div>



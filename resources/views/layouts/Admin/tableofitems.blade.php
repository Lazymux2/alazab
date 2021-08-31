
@foreach ($items as $item)
    



        <tr class="showData" role="button" data-toggle="collapse" href="#cols{{$item->id}}">
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>

        
        <td >
          <a class="card-link" data-toggle="collapse" href="#cols{{$item->id}}"><span class="fa fa-image"></span> </a>
         {{-- <img src="../myimages/moreitemsphoto/{{json_decode($item->imgs)[0]}}" width="250" height="250"/>--}} 
        </td>
          
        <td>
          <a target="_blank" href="{{route('Mitemadd', ['id'=>$item->id]) }}" > 
            <span class="fa fa-edit"> </span></a>

            
            <a  href="{{ route('delmitem', ['id'=>$item->id]) }}"  onclick="return confirm('Are you Sure??');"> 
              <span class="fa fa-trash-o fa-lg"> </span></a>
        </td>
      </tr> 


      <tr class="colls" style="">
        <td colspan="4" >
        <div id="cols{{$item->id}}" class="collapse" data-parent="#tbdoy">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-sm-12">
        
                <p dir="rtl" align="center" class="col-12" class="border">
              {{count($item->orders)}}
                  <p style=""> {{$item->desc}}</p>
                </p>
                
              </div>
              <?php 
              if(count($item->imgs)>3)
              $sizeimg=3;
              else {
                $sizeimg=count($item->imgs);
              }

              ?>
                @for ($i=0; $i<$sizeimg; $i++)
                    
                
              <div id="{{$item->imgs[$i]}}" align="center" class="tableitem col-lg-2 col-md-3 col-sm-6 col-6 border ">
               <a onclick="showimgModel('{{$item->imgs[$i]}}')" data-toggle="modal" data-target="#myModal">
                <img class="img-thumbnail" src="{{$item->imgs[$i]}}" width="80%" />
              </a>
                {{--onclick="delimgitem('.Array('items'=>$item).')"  onclick="delimgitem('."'$img'".','.$item->id.',$(this));" 
                
                
                $(this).parent().remove(); --}}
  

                
  

      </div>
      @endfor
    
    </div>
    
            
          </div>
        </div>
        
      </td>
      </tr>     
      
      @endforeach

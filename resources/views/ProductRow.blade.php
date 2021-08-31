@foreach ($items as $rit)
<?php 


$date1=date_create($rit->updated_at);
$date2=date_create(date('Y-m-d h:i:s'));

//$diff=date_diff(,date_create(date('Y-m-d h:i:s')))->format('%a');
$diff=date_diff($date1,$date2);
// echo $dept->updated_at.'       ';
$def=$diff->format("%a");

?>               

<div class="col-lg-3 col-md-4 mt-2 mb-2  col-sm-4 pt-4 pb-4">


@if ($def<20)
<div class="product-grid new bg-light mb-2">
        
@else
<div class="product-grid bg-light mb-2">
    
@endif
<div class="product-image">
    @if (isset($titel))
    <a  onclick="showProduct('{{ route('deatilsAjax', ['item'=> base64_encode($rit) ,'titel'=>$titel] ) }}',$(this),{{$rit->id}})"  
        class="btn image">
        
    @else
    <a   onclick="showProduct('{{ route('deatilsAjax', ['item'=> base64_encode($rit) ] ) }}',$(this),{{$rit->id}})"  
        class="btn image">
    
    @endif
        <img class="pic-1 img-thumbnail"  style="max-height: 90% !important;" src="{{$rit->imgs[mt_rand(0,count($rit->imgs)-1)]}}"/>
        </a>
        @if ($def<20)
        <span class="product-new-label">New</span>
            
        @endif
        <ul class="product-links">
            <li><a data-tip="Add to Wishlist"><small class="text-info text-info fa fa-heart"></small></a></li>
            <li><a  data-tip="Quick View"><small class="text-info fa fa-search"></small></a></li>
            <li><a  data-tip="Add to Cart"><small class="text-info fa fa-shopping-bag"></small></a></li>
        </ul>
        <div class="price">${{$rit->price}}</div>
    </div>
    <div class="product-content" style="padding: 20px;">
        @if (isset($titel))
        <h3 class="title"><a class="btn showPro" onclick="showProduct('{{ route('deatilsAjax', ['item'=> base64_encode($rit) ,'titel'=>$titel] ) }}',$(this))">{{$rit->name}}</a></h3>
            
        @else
        <h3 class="title"><a class="btn showPro" onclick="showProduct('{{ route('deatilsAjax', ['item'=> base64_encode($rit) ] ) }}',$(this))">{{$rit->name}}</a></h3>
            
        @endif
        <ul class="rating">
            <li class="fa fa-star"></li>
            <li class="fa fa-star"></li>
            <li class="fa fa-star"></li>
            <li class="fa fa-star"></li>
            <li class="fa fa-star disable"></li>
        </ul>
    </div>
</div>
</div>

@endforeach


@extends('layouts.app')

@section('content')



<div class="container" onload="gerIp()">
    
    <div class="card">
        <div class="card-header text-center"> {{Auth::user()->name}}  مرحبا</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div align='center' class="card text-center">
                        <div class="card-header">{{$pro->name}}</div>

                        <img align='center' class="img-thumbnail" height="200" width="200" src="{{$pro->imgs[mt_rand(0,count($pro->imgs)-1)]}}" alt="">
        
                        <div class="card-footer price">
                            <h4>{{$pro->price}}</h4>
                
                        </div>
                
                    </div>

                </div>
                <div class="col-md-8 text-center">

                    <form  dir="auto" method="POST" action="{{ route('order') }}" {{--onsubmit="sendorder(this,event)"--}}  class="orderForm form-control" >
                    <h3> يرجى ملئ الحقول التالية لتقديم طلبك</h3>
                    @csrf
                    <hr>
                
                        <input type="hidden" name="pro_id" id="pro_id" value="{{$pro->id}}">
                        <input type="hidden" class="c_loc" name="c_loc" id="c_loc"/>
                        <input type="hidden" name="pro_price" value="{{$pro->price}}">
                        <div class="row m-1">
                        <input class= "form-control col-4 mt-1 mb-1 ml-1"  type="text" required name="c_city" id="c_city" placeholder="المدينة" />
                        <input class="form-control col-6 m-1" type="text" name="c_st" required id="c_st" placeholder="الشارع" />
                        </div>
                        <label for="c_count" >الكمية</label>
                        <input class="text-center m-1" type="number" name="c_count" value="1" min="1" id="c_count"/>
                        <textarea class="form-control m-1" placeholder="ملاحظات" name="c_message" id="c_message" cols="15" rows="5"></textarea>
                    <button class="btn-success btn sendorder" type="submit" >ارسال</button>
                    </form>
                
                </div>

            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>

</div>

    
@endsection
@component('mail::message')
# [{{$u_name}}] لديك طلب جديد من 

بيانات العميل
<hr>
Name:[{{$u_name}}]
<br>
Email:[ <a href="mailto:{{$email}}"> {{$email}} </a>]
<br>
Phone:[ {{$phone}} ]

<hr>
المنتج :[{{$pro_name}}]
<br>
الكمية :[{{$count}}]
<br> 
اجمالي السعر :[{{$price}}]
<br>
Note:[<small >{{$mess}}</small>]

<hr>

@if($loc!="0" || $loc!=='0' )
    
@component('mail::button', ['url' => $loc])
عنوان ارسال الطلب 
@endcomponent

@endif
Thanks,<br>
{{ config('app.name') }}
@endcomponent

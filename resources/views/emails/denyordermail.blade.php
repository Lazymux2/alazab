
@component('mail::message',['background'=>'red'])
#  Sorry Dear {{$data['uname']}}# عذرا عزيزنا  {{$data['uname']}}


طلبك ل [{{$data['pro_name']}}] لم يتم الموافقة عليه لبعض الاسباب
<hr>
يمكنك التواصل مباشرة مع المدير الذي رفض طلبك
<hr>
بريد المدير : {{$data['ad_mail']}},
<br>
هاتف المدير: {{$data['ad_phone']}}
<br>
@component('mail::button', ['url' => $data['urll'],'color'=>'red'])
اطلب مجددا
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

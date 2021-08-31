@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تاكيد عنوان بريدك الالكتروني ') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('تم ارسال رابط اخر راجع الرسائل غير المرغوب فيها في بريدك ') }}
                        </div>
                    @endif

                    {{ __('يرجى تاكيد بريدك الالكتروني قبل العملية') }}

                    <div class="alert alert-info col-12 mt-4  alert-dismissible">
                        <strong class="text-danger">{{__('ملاحظة مهمة !!!!!!!')}}</strong>
                        <b>
                            {{__('رابط تاكيد البريد موجود في الsmapbox')}}
                            <hr>
                            {{__('ستجد الرابط في تبويب الرسائل غير المرغوب فيهااا')}}
<hr>

                        </b>
                        {{__('تسطتيع ايضا اعتبار رسائلنا من المرغوب بها حتى تصلك معلومات طلبك')}}
    
                    </div>
    
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('اضغط لطلب رابط جديد') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

@include('layouts.footer')
    
@endsection

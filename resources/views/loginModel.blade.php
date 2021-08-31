<div class="modal fade" id="loginModel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Log in</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
          <ul class="nav nav-tabs" role="tablist">

            <li class="nav-item active">
              <a class="nav-link active" data-toggle="tab" href="#menu1">{{__('تسجيل الدخول ')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu2">{{__(' انشاء حساب')}}</a>
            </li>
          </ul>
        
          <!-- Tab panes -->
          <div class="tab-content">
            
            <div id="menu1" class="container tab-pane fade show active text-center"><br>
            @if (isset($item->id))
            <form onsubmit="loginForm(this,event,$(this),{{$item->id}})" dir="ltr" class="form-control pt-2 pb-2">
                
            @else
            <form onsubmit="loginForm(this,event,$(this),'')" dir="ltr" class="form-control pt-2 pb-2">
                
            @endif
                <input class="form-control mb-2 mt-5  ml-2" type="email" name="email" id="email" placeholder="Email"/>
                <input class="form-control mb-2 ml-2" type="password" name="password" id="password">
                <button  type="submit" class="btn-success col-6 btn" >Log in</button>
        
        
              </form>
            
            </div>
            <div id="menu2" class="container tab-pane fade"><br>
            
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Register') }}</div>
            
                            <div class="card-body">
                                @if (isset($item->id))
                                <form onsubmit="registerForm(this,event,$(this),{{$item->id}})">
                                    
                                @else
                                <form onsubmit="registerForm(this,event,$(this),'')">
                                    
                                @endif
                                
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
          
                                      <div class="col-md-6">
                                          <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
          
                                          @error('phone')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

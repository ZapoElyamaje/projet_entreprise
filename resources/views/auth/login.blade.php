@extends('auth.layouts.app')

@section('content')
<div class="row justify-content-center" style="margin-left:10%;">

    <div class="col-xl-8 col-lg-7 col-md-1">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card">
                <!-- Nested Row within Card Body -->
 
                    <div class="col-lg-10"><br/>
					<img id="imj" src="{{ asset('admin/img/Logo_elyamaje.png')}}" width="95px";
					height="auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1>Service Saas</h1>
                            </div>
                            <form method="POST" id="form_login" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address.">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input class="custom-control-input" type="checkbox" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>

                                </div>
                                </div>
                                <button id="but" class="btn btn-primary btn-user btn-block" style="margin-top:-30px;background-color:black;color:white;border:2px solid black;">
                                    Connectez-vous!
                                </button>
                            </form>
                            <hr>
                                <div class="rows1" style="margin-left:40%; width=300px;"><a href="{{ route('auth.passwords.reset')}}"> Mot de pass oublié ? </a></div>
                                @if (session('error'))
                                <div class="alert alert-danger" role="alert" id="alert" style="width:300px;height:45px;text-align:center;">
	                            {{ session('error') }}
                                </div>
                                @elseif(session('failed'))
                           
                                 @endif
                              <div class="text-center">
                                
                            </div>
                            <div class="text-center">
                               
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection



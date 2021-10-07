@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login-with-otp') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>
                                <div class="col-md-6">
                                    <input id="mobile" type="number" class="form-control" name="mobile" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row otp">
                                <label for="password" class="col-md-4 col-form-label text-md-right">OTP</label>
                                <div class="col-md-6">
                                    <input id="otp" type="number" class="form-control" name="otp" >
                                </div>
                            </div>

                            <div class="form-group row mb-0 otp">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group row send-otp">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success" onclick="sendOtp()">Send OTP</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.otp').hide();
        function sendOtp() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax( {
                url:'{{ route('send-otp') }}',
                type:'post',
                data: {'mobile': $('#mobile').val()},
                success:function(data) {
                    if(data != 0){
                        $('.otp').show();
                        $('.send-otp').hide();
                    }else{
                        alert('Mobile No not found');
                    }
                },
                error:function () {
                    console.log('error');
                }
            });
        }
    </script>
@endsection

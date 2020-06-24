@extends('template')

@section('content')
<div class="container">
    <div class="m-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 rounded">
                    <div class="card-header">
                        <h5 class="m-0">{{ __('Verify Your Email Address') }}</h5>
                    </div>

                    <div class="card-body py-4">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
    var channel = Echo.private('userChannel.' + '{{Auth::user()->id}}');
    channel.listen('MailVerified', function(data) {
      if(data.is_Teacher)
        window.location.replace("{{route('senseihome')}}");
      else
        window.location.replace("{{route('studenthome')}}");
    });
</script>
@endsection
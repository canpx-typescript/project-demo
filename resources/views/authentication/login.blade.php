@extends('authentication.layout')
@section('content')
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Login</h2>
                    <p>Please enter your email and password</p>
                </div>
                @if(count($errors) > 0)
                    @foreach( $errors->all() as $err)
                        <p class="alert alert-danger">
                                {{ $err }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        </p>
                    @endforeach
                @endif
                @if(Session::has('has-error'))
                    <p class="alert alert-danger">
                        {{ Session::get('has-error') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    </p>
                @endif
                <form action="{{ route('getLogin')}}" id="Login" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}"/>
                    <div class="form-group">
                        <input class="form-control" name="username" id="username" placeholder="username">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="forgot">
                        <a href="reset.html">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    {{--<button type="button" onclick="test()" class="btn btn-primary">Login</button>--}}
                </form>
            </div>
        </div>
@endsection
<script>
    function test()
    {
        Swal(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    }
</script>
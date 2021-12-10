<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')
</head>
<body>
    <section class="container">
        <div class="jumbotron">
        <h1 class="display-4">Login Panel</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <!-- <a class="btn btn-primary btn-lg" href="products.php" role="button">Shop Now</a> -->
        </p>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success') }} </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger"> {{Session::get('error')}} </div>
        @endif
           <!-- login form -->
            <form method="post" action="{{url('/loginChk')}}" >
            @csrf()
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Email - ID</span>
                <input type="email" class="form-control" name="email" id="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                
            </div>
            @if($errors->has('email'))
                    <label class="text-danger">{{$errors->first('email')}}</label>
                @endif
            
            <div class="input-group input-group-lg mt-2">
                <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
                <input type="password" class="form-control" id="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="pass">
                
            </div>
            @if($errors->has('pass'))
                    <label class="text-danger">{{$errors->first('pass')}}</label>
                    <br>
                @endif

                <button type="submit" class="btn btn-success p-2 mt-3" name="submit">Sign in</button>
                <a class="btn btn-primary p-2 mt-3" href="{{ url('register') }}" role="button">New User</a>
            </form>
    </section>

    @include('include.foot')
</body>
</html>
@extends ('header')
@section ('login')
{{View::make('title')}}


<main class="form-signin w-100 m-auto">
    <img class="mb-4" src="images/finnel-logo.png" alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal">Sign in</h1>

    <form action="login" method="post">
@csrf
        <div class="form-floating form-floating1">
          <input type="email" name="email" class="form-control form-box1" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating form-floating1">
          <input type="password" name="password" class="form-control form-box1" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          <label><input type="checkbox" value="remember-me"> Remember me </label>
        </div>

        <div>
        <button type="submit" class="w-100 btn btn-lg btn-primary btn1">Login</button>
        <button type="button" class="signup-btn" onclick="window.location='/register'">Register</button>
        </div>

    </form>   
</main>


{{View::make('footer')}}
@endsection


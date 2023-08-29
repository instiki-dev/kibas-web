<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE-Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/style/login.css">
    </head>
    <body class="w-100 d-flex justify-content-center align-items-center">
        <div class="left">
            <div class="bg-wrapper">
                <div class="bg">
                    <img src="/img/loginbg.jpg">
                </div>
            </div>
            <img src="/img/removebg.png" class="mr-4">
            <h2 class="mr-5 mt-3">Layanan Pelanggan PDAM Tirta Danu Arta</h2>
        </div>
        <div class="right d-flex justify-content-center align-items-center">
            <div class="login-card w-75 px-4 py-3">
                <h2 class="ml-1">Admin Login</h2>
                <form class="pt-3" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                    @if($errors -> first())
                    <div class="alert alert-danger px-3" role="alert">
                        {{ $errors -> first() }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    <div class="w-100 d-flex justify-content-center">
                      <button type="submit" class="btn btn-danger w-75">Login</button>
                    </div>
                </form>
            </div>
        </div>


        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            var login = document.querySelector(".login-card")
            if(window.innerWidth < 600) {
                document.body.classList.add("flex-column")
                login.classList.remove("w-25")
                login.classList.add("w-75")
                login.classList.add("mt-4")
                login.classList.remove("ml-5")
            }
        </script>
    </body>
</html>

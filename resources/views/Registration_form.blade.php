<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<style>
    * {
        color: white;
    }
</style>

<body style="background-image: url(pictures/wall1.jpg); background-size:cover;">

    <div class="container-fluid">
        <div class="row" style="height: 100vh; align-items: center;">
            <div class="col-sm-4"></div>
            <div class="col-sm-3" style="background-color: rgba(124, 132, 132, 0.454)">
                <div class="text-center">
                    <img src="pictures/chat_me.png"style="width: 185px;" alt="logo">
                    <h4 class="">Let's Make New Friends</h4>
                </div>
                <form method="GET" action="registration_form">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Your Name"
                            name="name">
                        <span >
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" placeholder="Enter email">
                        <span >
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                            name="pwd">
                        <span >
                            @error('pwd')
                                {{ 'Minimum 8 characters, 1 Uppercase, 1 symbol, 1 Number' }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2"
                            placeholder="Enter Same password as above" name="pwd1">
                        <span >
                            @error('pwd1')
                                {{'Enter Same Password As Above'}}
                            @enderror
                        </span>
                    </div>

                    <div class="text-center pt-1 mb-3 pb-1">
                        <button class="btn btn-primary btn-block  mb-3" type="submit">Create</button>
                        {{-- <a class="" href="#!" style="text-decoration: none; color: white;">Forgot password?</a> --}}
                    </div>

                    <div class="d-flex ">
                        <p class="mb-0 me-2">Already have Account!</p>
                        <a href="login" class="btn btn-outline-danger">Sign in</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-5"></div>

        </div>
    </div>
</body>

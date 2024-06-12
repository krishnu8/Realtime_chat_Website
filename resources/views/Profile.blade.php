@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">

<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
    }

    #ho {
        display: none;
    }

    .hh {
        background-color: green;
        width: 80%;
        height: 1px;
    }

    .editt {
        height: 80px;
        width: 80px;
        z-index: 1;
        top: 130px;
        left: 245px;
        position: absolute;
        cursor: pointer;
        opacity: 0;
    }

    .editt:hover {
        opacity: 1;
    }

    #update_btn {
        display: none;
    }
</style>

<body>
    @section('navigation')
        <section style="background-color: #f4f5f7; z-index:-1;">
            @error('pic')
                <div id="myAlert" class="alert alert-danger" role="alert"
                    style="z-index: 100; position: absolute; right:10px; min-width: 500px;">
                    {{ $message }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('myAlert').style.display = 'none';
                    }, 5000); // This will hide the alert after 5 seconds (5000 milliseconds)
                </script>
            @enderror

            @if (session()->has('pic_update'))
                <div id="succ" class="alert alert-success" role="alert"
                    style="z-index: 100; position: absolute; right:10px; min-width: 500px;">
                    {{ session('pic_update') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('succ').style.display = 'none';
                    }, 5000); // This will hide the alert after 5 seconds (5000 milliseconds)
                </script>
            @endif

            <div class="card mb-3" style="border-radius: .5rem;height:80%;width:95%;margin:2%;">
                <div class="row g-0 " style="height:100%;">
                    <div class="col-md-4 gradient-custom text-center text-white"
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background-image: url('pictures/wall1.jpg'); background-size: cover; height: 80vh;">

                        <img src="{{ URL::to('/') }}/pictures/{{ $user_info['Picture'] }}" alt="Avatar"
                            class="img-fluid my-5" style="width: 170px; height:170px; border-radius:50%" />

                        <label for="image1"><img src="{{ URL::to('/') }}/pictures/Edit_icon.png" alt=""
                                class="editt"></label>
                        <h2>{{ $user_info['Name'] }}</h2>
                        <center>
                            <hr class="hh">
                        </center>
                        <p>User</p>
                        <form action="update_profile_pic" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" oninput="update()" id="image1" style="display: none" name="pic">
                            {{-- <span style="color: red">
                                @error('pic')
                                    {{ $message }}
                                @enderror
                            </span> --}}
                            <center><button type="submit" class="btn btn-info" id="update_btn">Update picture</button>
                            </center> <br>
                        </form>
                        <a href="{{ URL::to('/') }}/Edit_profile" class="btn btn-secondary">Edit Profile</a><br> <br>
                        <a href="{{ URL::to('/') }}/Home" class="btn btn-danger">Return Back</a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h3>Information</h3>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Name</h6>
                                    <p class="text-muted" style="margin-bottom: 30px;">{{ $user_info['Name'] }}</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Email</h6>
                                    <p class="text-muted" style="margin-bottom: 30px;">{{ $user_info['Email'] }}</p>
                                </div>
                                @if ($user_info['Address'] != '')
                                    <div class="col-6 mb-3">
                                        <h6>Address</h6>
                                        <p class="text-muted">{{ $user_info['Address'] }}</p>
                                    </div>
                                @endif

                                @if ($user_info['Gender'] != '')
                                    <div class="col-6 mb-3">
                                        <h6>Gender</h6>
                                        <p class="text-muted">{{ $user_info['Gender'] }}</p>
                                    </div>
                                @endif
                                @if ($user_info['D/O/B'] != '')
                                    <div class="col-6 mb-3">
                                        <h6>Date of birth</h6>
                                        <p class="text-muted">{{ $user_info['D/O/B'] }}</p>
                                    </div>
                                @endif

                                <div class="col-6 mb-3">
                                    <h6>Privacy</h6>
                                    <p class="text-muted">{{ $user_info['Privacy'] }}</p>
                                </div>
                            </div>

                            <h6 style="margin-top: 50px">Description</h6>
                            <div>
                                {{ $user_info['Bio'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function update() {
                document.getElementById("update_btn").style.display = "block";
            }
        </script>
    @endsection
</body>

</html>

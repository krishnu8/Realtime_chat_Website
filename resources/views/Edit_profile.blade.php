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

    #myTextarea {
        resize: none;
        /* Prevent resizing by user */
        overflow: hidden;
        /* Hide scroll bar */
    }
</style>

<body>
    @section('navigation')
        <section style="background-color: #f4f5f7; z-index:-1;">
            <div class="card mb-3" style="border-radius: .5rem;height:80%;width:95%;margin:2%;">
                <div class="row g-0 " style="height:100%;">
                    <div class="col-md-4 gradient-custom text-center text-white"
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background-image: url('pictures/wall1.jpg'); background-size: cover; height: 80vh;">

                        <img src="{{ URL::to('/') }}/pictures/{{ $user_info['Picture'] }}" alt="Avatar" class="img-fluid my-5"
                            style="width: 170px; height:170px; border-radius:50%" />
                        <h2>Krishnu Gupta</h2>
                        <center>
                            <hr class="hh">
                        </center>
                        <p>User</p>

                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h3>Edit</h3>
                            <hr class="mt-0 mb-4">

                            <form action="edit_profile" method="get">


                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter your Name" name="name" value="{{ old('name', $user_info['Name']) }}">
                                            <small style="color: red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="Enter your Email" name="email" value="{{ old('email', $user_info['Email']) }}">
                                            <small style="color: red">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" placeholder="Enter your Address" name="address" value="{{ old('address', $user_info['Address']) }}">
                                            <small style="color: red">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gen" id="maleRadio" value="Male" {{ old('gen', $user_info['Gender']) == 'Male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="maleRadio">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gen" id="femaleRadio" value="Female" {{ old('gen', $user_info['Gender']) == 'Female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="femaleRadio">Female</label>
                                            </div>

                                            <small style="color: red">
                                                @error('gen')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" placeholder="Enter your Date" name="date" value="{{ old('date', $user_info['D/O/B'] ? \Carbon\Carbon::parse($user_info['D/O/B'])->format('Y-m-d') : '') }}">

                                            <small style="color: red">
                                                @error('date')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label>Privacy</label> <br>
                                            <select name="privacy" id="" class="form-control custom-select">
                                                <option value="Private" {{ old('privacy', $user_info['Privacy']) == 'Private' ? 'selected' : '' }}>Private</option>
                                                <option value="Public" {{ old('privacy', $user_info['Privacy']) == 'Public' ? 'selected' : '' }}>Public</option>
                                            </select>

                                            <small style="color: red">
                                                @error('privacy')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <h6 style="margin-top: 20px">Description</h6>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <textarea class="form-control" id="myTextarea" cols="110" rows="1" name="des">{{ old('des', $user_info['Bio']) }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-info"> Reset</button>
                                        <button type="submit" class="btn btn-success"> Save</button>
                                        <a href="{{ URL::to('/') }}/profile" class="btn btn-danger">cancel</a>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            document.getElementById('myTextarea').addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        </script>
    @endsection
</body>

</html>

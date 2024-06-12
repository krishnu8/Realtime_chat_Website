@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">

<style>

</style>

<body>
    @section('navigation')
        <section style="background-color: #f4f5f7; z-index:-1;">

            @if (session()->has('Pass_up'))
                <div id="succ" class="alert alert-success" role="alert"
                    style="z-index: 100; position: absolute; right:10px; min-width: 500px;">
                    {{ session('Pass_up') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('succ').style.display = 'none';
                    }, 5000); // This will hide the alert after 5 seconds (5000 milliseconds)
                </script>
            @endif

            @if (session()->has('Pass_fail'))
                <div id="fail" class="alert alert-danger" role="alert"
                    style="z-index: 100; position: absolute; right:10px; min-width: 500px;">
                    {{ session('Pass_fail') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('fail').style.display = 'none';
                    }, 5000); // This will hide the alert after 5 seconds (5000 milliseconds)
                </script>
            @endif
            <div class="card mb-3" style="border-radius: .5rem;height:80%;width:95%;margin:2%;">
                <div class="row g-0 " style="height:100%;">

                    <div class="col-md-4 gradient-custom text-center text-white"
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background-image: url('pictures/wall1.jpg'); background-size: cover; height: 80vh; opacity:0.9;">

                        <h2 style="margin-top: 50px;">Password Security Tips</h2>
                        <ul style="list-style-type: none; padding: 0;">
                            <li>1. Use a combination of uppercase and lowercase letters.</li>
                            <li>2. Include at least one number.</li>
                            <li>3. Add special characters (e.g., @, $, !).</li>
                            <li>4. Avoid using easily guessable information like birthdays or names.</li>
                            <li>5. Make sure it's at least 12 characters long.</li>
                            <li>6. Never reuse passwords across multiple sites.</li>
                            <li>7. Change your password regularly.</li>
                            <li>8. Enable two-factor authentication whenever possible.</li>
                            <li>9. Be cautious of phishing attempts.</li>
                            <li>10. Keep your password confidential; don't share it with anyone.</li>
                            <li>11. Use a passphrase for added security.</li>
                            <li>12. Avoid using dictionary words or common phrases.</li>
                            <li>13. Don't save passwords in your browser.</li>
                            <li>14. Use a reputable password manager for secure storage.</li>
                            <li>15. Monitor your accounts for any unauthorized activity.</li>
                        </ul>

                        <p style="margin-top: 30px;">Remember, a strong password is your first line of defense against
                            unauthorized access.</p>

                    </div>



                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h3>Change Password</h3>
                            <hr class="mt-0 mb-4">

                            <form action="password" method="get">


                                <div class="row pt-1">
                                    <div class="col-10 mb-4">
                                        <div class="form-group">
                                            <label for="currentPassword">Current Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control"
                                                    placeholder="Enter Your current Password" name="cp"
                                                    id="currentPassword" value="{{ old('cp') }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="togglePassword"
                                                        style="cursor: pointer;">
                                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <small style="color: red">
                                                @error('cp')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>

                                    <style>
                                        .input-group {
                                            position: relative;
                                        }

                                        .input-group-text {
                                            position: absolute;
                                            top: 50%;
                                            right: 10px;
                                            transform: translateY(-50%);
                                            cursor: pointer;
                                        }
                                    </style>

                                    <script>
                                        var passwordInput = document.getElementById("currentPassword");
                                        var togglePasswordButton = document.getElementById("togglePassword");
                                        var toggleIcon = document.getElementById("toggleIcon");

                                        togglePasswordButton.addEventListener("click", function(e) {
                                            e.preventDefault(); // Prevents the click event from propagating
                                            if (passwordInput.type === "password") {
                                                passwordInput.type = "text";
                                                toggleIcon.classList.remove("fa-eye");
                                                toggleIcon.classList.add("fa-eye-slash");
                                            } else {
                                                passwordInput.type = "password";
                                                toggleIcon.classList.remove("fa-eye-slash");
                                                toggleIcon.classList.add("fa-eye");
                                            }
                                        });
                                    </script>

                                    <div class="col-10 mb-4">
                                        <div class="form-group">
                                            <label for="newPassword">New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" placeholder="Enter New Password"
                                                    name="np" id="newPassword" value="{{ old('np') }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="toggleNewPassword"
                                                        style="cursor: pointer;">
                                                        <i class="fas fa-eye" id="toggleNewIcon"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <small style="color: red">
                                                @error('np')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>

                                    <script>
                                        var newPasswordInput = document.getElementById("newPassword");
                                        var toggleNewPasswordButton = document.getElementById("toggleNewPassword");
                                        var toggleNewIcon = document.getElementById("toggleNewIcon");

                                        toggleNewPasswordButton.addEventListener("click", function(e) {
                                            e.preventDefault(); // Prevents the click event from propagating
                                            if (newPasswordInput.type === "password") {
                                                newPasswordInput.type = "text";
                                                toggleNewIcon.classList.remove("fa-eye");
                                                toggleNewIcon.classList.add("fa-eye-slash");
                                            } else {
                                                newPasswordInput.type = "password";
                                                toggleNewIcon.classList.remove("fa-eye-slash");
                                                toggleNewIcon.classList.add("fa-eye");
                                            }
                                        });
                                    </script>

                                    <div class="col-10 mb-4">
                                        <div class="form-group">
                                            <label for="repeatPassword">Repeat Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control"
                                                    placeholder="Enter same password as above" name="cnp"
                                                    id="repeatPassword" value="{{ old('cnp') }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="toggleRepeatPassword"
                                                        style="cursor: pointer;">
                                                        <i class="fas fa-eye" id="toggleRepeatIcon"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <small style="color: red">
                                                @error('cnp')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>

                                    <script>
                                        var repeatPasswordInput = document.getElementById("repeatPassword");
                                        var toggleRepeatPasswordButton = document.getElementById("toggleRepeatPassword");
                                        var toggleRepeatIcon = document.getElementById("toggleRepeatIcon");

                                        toggleRepeatPasswordButton.addEventListener("click", function(e) {
                                            e.preventDefault(); // Prevents the click event from propagating
                                            if (repeatPasswordInput.type === "password") {
                                                repeatPasswordInput.type = "text";
                                                toggleRepeatIcon.classList.remove("fa-eye");
                                                toggleRepeatIcon.classList.add("fa-eye-slash");
                                            } else {
                                                repeatPasswordInput.type = "password";
                                                toggleRepeatIcon.classList.remove("fa-eye-slash");
                                                toggleRepeatIcon.classList.add("fa-eye");
                                            }
                                        });
                                    </script>

                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-info"> Reset</button>
                                            <button type="submit" class="btn btn-success"> Save</button>
                                            <a href="{{ URL::to('/') }}/Home" class="btn btn-danger">cancel</a>
                                        </div>
                                    </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</body>

</html>

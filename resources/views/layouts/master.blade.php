<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    .nav-item{
       margin-right: 50px;

    }
    .aa{
        text-decoration: none;
        color: white;
        font-size:18px;
    }
    /* .navbar>.container, .navbar>.container-fluid, .navbar>.container-lg, .navbar>.container-md, .navbar>.container-sm, .navbar>.container-xl, .navbar>.container-xxl{
        margin-bottom: 15px;
    } */
</style>
<nav class="navbar navbar-expand-lg navbar-lightt" style="color:white;background-color: rgba(0, 29, 87, 0.895)">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ URL::to('/') }}/Home"><img src="{{ URL::to('/') }}/pictures/logo.png" alt="Logo" height="70px" width="70px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-image:url('{{ URL::to('/') }}/pictures/more1.png')"></span>
        </button>
        <div class="collapse navbar-collapse" style="margin-left: 55%" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active aa" aria-current="page" href="{{ URL::to('/') }}/Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link aa" href="{{ URL::to('/') }}/friend">Add Friend</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle aa" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/change_password">Change Password</a></li>
                        <li><a class="dropdown-item" href="#">Delete Account</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ URL::to('/') }}/logout" onclick="alert('Are Sure you want to Logout!')">Log out</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link aa" href="{{ URL::to('/') }}/support">Help & Support</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('navigation')

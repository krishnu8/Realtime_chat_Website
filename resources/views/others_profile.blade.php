@extends('layouts.master')
<style>
    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 215px;
        height: 215px;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    /* .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    } */

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }



    .instagram-section {
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #f7f7f7;
    }

    .account-info {
        display: flex;
        align-items: center;
    }

    .private-label {
        font-size: 18px;
        font-weight: bold;
        color: #ff0000;
    }
</style>

<body>
    @section('navigation')
        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{ URL::to('/') }}/pictures/{{ $info['Picture'] }}" alt="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                {{ $info['Name'] }}
                            </h5>
                            <h6>
                                {{-- Web Developer and Designer --}}
                            </h6>
                            <p class="proile-rating"> <span></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        @if ($friend_count == 0)
                            @if ($send_requests_check == 0)
                                {{-- <Button class="btn btn-secondary">Send Request</Button> --}}
                                <a href="{{ URL::to('/') }}/send_request/{{ $info['User_id'] }}" class="btn btn-secondary"
                                    style="margin-top:20px;">Send Request</a>
                            @else
                                <a href="{{ URL::to('/') }}/send_request_cancle/{{ $info['User_id'] }}"
                                    class="btn btn-warning" style="margin-top:20px;">Cancle Request</a>
                            @endif
                        @else
                            {{-- <Button class="btn btn-Danger">Delete friend</Button> --}}
                            <a href="{{ URL::to('/') }}/Unfriend/{{ $info['User_id'] }}"
                            class="btn btn-danger" style="margin-top:20px;">Delete Friend</a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>
                            <h5>Bio</h5>
                            </p>
                            <p style="word-break: break-all; font-size: 15px">{{ $info['Bio'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">

                                @if ($info['Privacy'] == 'Public')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>User Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $info['User_id'] }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $info['Name'] }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $info['Email'] }}</p>
                                        </div>
                                    </div>

                                    @if (!empty($info['Address']))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $info['Address'] }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if (!empty($info['Gender']))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $info['Gender'] }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if (!empty($info['D/O/B']))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Birth Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $info['D/O/B'] }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="instagram-section">
                                        <div class="account-info">
                                            <div>
                                                <p class="private-label">Private Chat_Me Account</p>
                                                <p>This Chat_Me account is set to private. Send Request the account to see
                                                    their
                                                    posts.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <center><a href="{{ URL::to('/') }}/friend" class="btn btn-primary">Return back</a></center>
        </div>
        </form>
        </div>
    @endsection
</body>

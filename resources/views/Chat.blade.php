@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .settt {
        height: 670px;
        overflow-y: scroll;
        overflow-x: hidden;
        padding: 10px;
        border-radius: 10px;
    }

    .ab {
        height: 570px;
        overflow-y: scroll;
        overflow-x: hidden;
        padding-bottom: 60px;
    }

    .ab::-webkit-scrollbar {
        display: none;
        /* Hide the scrollbar in Webkit browsers */
    }

    .settt::-webkit-scrollbar {
        display: none;
        /* Hide the scrollbar in Webkit browsers */
    }

    .cho:hover {
        background-color: rgba(115, 218, 220, 0.667);
    }
</style>

<body>
    @section('navigation')
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12" style="background-color: rgba(173, 222, 223, 0.667);">
                    <div class="row">
                        <div class="col-sm-4 settt">
                            <div class="input-group">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                    aria-describedby="search-addon" />
                                <button type="button" class="btn btn-outline-primary">search</button>
                            </div>
                            <ul class="list-unstyled mb-0">
                                @foreach ($chatfriend as $user)
                                    <li class="p-2 border-bottom cho">
                                        <a href="{{ URL::to('/') }}/chat/{{ $user['User_id'] }}"
                                            class="d-flex justify-content-between" ondblclick="check({{ $user['User_id'] }})" style="text-decoration: none">
                                            <div class="d-flex flex-row">
                                                <div>
                                                    <img src="{{ URL::to('/') }}/pictures/{{ $user['Picture'] }}"
                                                        alt="avatar" class="d-flex align-self-center me-3" width="60px"
                                                        style="border-radius: 50%" height="60px">
                                                    <span class="badge bg-warning badge-dot"></span>
                                                </div>
                                                <div class="pt-1">
                                                    <p class="fw-bold mb-0" style="color: rgba(0, 0, 0, 0.758);">{{ $user['Name'] }}</p>
                                                    <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                                </div>
                                            </div>
                                            <div class="pt-1">
                                                {{-- <p class="small text-muted mb-1">5 mins ago</p>
                                                <span class="badge bg-danger rounded-pill float-end">2</span> --}}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                                @foreach ($friend as $user)
                                    <li class="p-2 border-bottom cho">
                                        <a href="{{ URL::to('/') }}/chat/{{ $user['User_id'] }}"
                                            class="d-flex justify-content-between" ondblclick="check({{ $user['User_id'] }})" style="text-decoration: none">
                                            <div class="d-flex flex-row">
                                                <div>
                                                    <img src="{{ URL::to('/') }}/pictures/{{ $user['Picture'] }}"
                                                        alt="avatar" class="d-flex align-self-center me-3" width="60px"
                                                        style="border-radius: 50%" height="60px">
                                                    <span class="badge bg-warning badge-dot"></span>
                                                </div>
                                                <div class="pt-1">
                                                    <p class="fw-bold mb-0" style="color: rgba(0, 0, 0, 0.758);">{{ $user['Name'] }}</p>
                                                    <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                                </div>
                                            </div>
                                            <div class="pt-1">
                                                {{-- <p class="small text-muted mb-1">5 mins ago</p>
                                                <span class="badge bg-danger rounded-pill float-end">2</span> --}}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-sm-8"
                            style="background-image: url({{ URL::to('/') }}/pictures/wall2.jpg);background-size: cover">
                            <div class="text-muted d-flex justify-content-start align-items-center"
                                style="background-color:#76a8f4;margin-left: -10px;">
                                <img src="{{ URL::to('/') }}/pictures/{{ $data['Picture'] }}" alt="avatar 3"
                                    style="width: 50px;height:50px; border-radius: 50% ">
                                <h5 style="margin-left: 15px; color: #f5f6f7;">{{ $data['Name'] }}</h5>
                                <a class="nav-link aa" style="margin-left: 60%; position: absolute;" href="#"
                                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <h3><i class="fa-solid fa-info"></i></h3>

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    {{-- <li><a class="dropdown-item" href="#">Block</a></li> --}}
                                    <li><a class="dropdown-item"
                                            href="{{ URL::to('/') }}/delete_conversation/{{ $data['User_id'] }}">Delete
                                            Conversation</a></li>
                                </ul>
                            </div>
                            <div class="row" style="height:578px">
                                <div class="col-sm-12 ab" id="scrollContainer">
                                    <div class="pt-3 pe-3 " id="chatt">

                                    </div>
                                </div>
                            </div>
                            <div class="text-muted d-flex justify-content-start align-items-center mt-3">
                                <img src="{{ URL::to('/') }}/pictures/{{ $data['Picture'] }}"alt="avatar 3"
                                    style="width: 40px; height: 40px; border-radius:50%">
                                <div class="input-group">
                                    <input type="text" id="messageInput" class="form-control rounded"
                                        placeholder="Type Your Message" />
                                    <button type="button" id="sendButton" class="btn btn-outline-primary"><img
                                            src="{{ URL::to('/') }}/pictures/send.png" width="30px" height="30px"
                                            alt="">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- view profile  --}}
<script>
    function check(id){
        window.location.href="{{ URL::to('/') }}/profile/"+id;
    }
</script>
        {{-- fetch metch from database using ajax --}}
        <script>
            $(document).ready(function() {
                var lastFetchedData = null;

                function fetchDataAndUpdateUI(id) {
                    $.ajax({
                        url: '/fetch-data/' + id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            // Check if the fetched data is different from the last fetched data
                            if (JSON.stringify(response) !== JSON.stringify(lastFetchedData)) {
                                lastFetchedData = response;

                                var chattDiv = $('#chatt');
                                chattDiv.empty(); // Clear existing data before appending new data

                                // Loop through the new response data and update the UI
                                $.each(response, function(key, item) {
                                    if (item.Sender_id == id) {
                                        var dataDiv = $(
                                            '<div class="d-flex flex-row justify-content-start heha">' +
                                            '<img src="{{ URL::to('/') }}/pictures/{{ $data['Picture'] }}" ' +
                                            'alt="avatar 1" style="width: 40px; height: 40px; border-radius:50%">' +
                                            '<div>' +
                                            '<p class="small p-2 ms-3 mb-1 rounded-3" ' +
                                            'style="background-color: #f5f6f7;max-width:600px;overflow-wrap: break-word;">' +
                                            item.Message + '</p>' +
                                            '<p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>' +
                                            '</div>' +
                                            '</div>'
                                        );

                                    }
                                    else {
                                        var dataDiv = $(
                                            '<div class="d-flex flex-row justify-content-end">' +
                                            '<div>' +
                                            '<p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary" style="max-width:600px;overflow-wrap: break-word;">' +
                                            item.Message + '</p>' +
                                            '<p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>' +
                                            '</div>' +
                                            '<img src="{{ URL::to('/') }}/pictures/{{ $ownpicture['Picture'] }}" ' +
                                            'alt="avatar 1" style="width: 40px; height: 40px; border-radius:50%;">' +
                                            '</div>'
                                        );
                                    }
                                    // scroll from bottom to top
                                    const scrollContainer = document.getElementById('scrollContainer');
                                    scrollContainer.scrollTop = scrollContainer.scrollHeight;
                                    // add div to another div
                                    chattDiv.append(dataDiv);
                                });

                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                }

                var id = {{ $id }};
                fetchDataAndUpdateUI(id);

                // Fetch and update the data at a regular interval
                setInterval(function() {
                    fetchDataAndUpdateUI(id);
                }, 1000);
            });
        </script>

        {{-- send message to the database --}}
        <script>
            var inputElement = document.getElementById("messageInput");
            inputElement.addEventListener("keypress", function(event) {
                // If the user presses the "Enter" key on the keyboard
                if (event.key === "Enter") {
                    // Cancel the default action, if needed
                    event.preventDefault();
                    // Trigger the button element with a click
                    document.getElementById("sendButton").click();
                }
            });
            document.getElementById("sendButton").addEventListener("click", function() {
                var inputValue = inputElement.value;
                // console.log("Entered message:", inputValue);
                if (inputValue != '') {
                    // alert(inputValue);
                    function sendMessage(id, message) {
                        $.ajax({
                            url: '/send-message', // The URL doesn't need additional parameters here
                            type: 'GET', // Change this to POST
                            dataType: 'json',
                            data: {
                                id: id,
                                message: message
                            },
                            success: function(response) {
                                console.log(response);
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });

                    }

                    var id = {{ $id }}; // Assuming you're using a server-side variable
                    var message = inputElement.value; // Assuming inputElement is a reference to the input field
                    sendMessage(id, message);

                    inputElement.value = "";
                }
            });
        </script>
    @endsection
</body>

</html>

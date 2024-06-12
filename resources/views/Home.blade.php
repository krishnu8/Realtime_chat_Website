@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">

<style>
    .settt {
        height: 690px;
        overflow-y: scroll;
        overflow-x: hidden;
        padding: 10px;
        border-radius: 10px;
    }

    .settt::-webkit-scrollbar {
        display: none;
        /* Hide the scrollbar in Webkit browsers */
    }

    .cho:hover {
        background-color: rgba(115, 218, 220, 0.667);
    }
    #searchResults {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

</style>

<body>
    @section('navigation')
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12" style="background-color: rgba(173, 222, 223, 0.667);">
                    <div class="row">
                        <div class="col-sm-4 settt">
                            {{-- <div class="input-group">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                    aria-describedby="search-addon" />
                                <button type="button" class="btn btn-outline-primary">search</button>
                            </div> --}}

                            <div class="input-group">
                                <input type="search" id="searchInput" class="form-control rounded" placeholder="Search"
                                    aria-label="Search" aria-describedby="search-addon" name="search" />
                                <button type="button" id="searchButton" class="btn btn-outline-primary">Search</button>
                            </div>
                            <div id="searchResults"></div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const searchButton = document.getElementById('searchButton');
                                    const searchInput = document.getElementById('searchInput');
                                    const searchResults = document.getElementById('searchResults');

                                    searchButton.addEventListener('click', function() {
                                        const query = searchInput.value.trim();

                                        if (query !== '') {
                                            // Send AJAX request
                                            fetch(`/search?q=${encodeURIComponent(query)}`)
                                                .then(response => response.json())
                                                .then(results => displayResults(results))
                                                .catch(error => console.error('Error:', error));
                                        }
                                    });

                                    function displayResults(results) {
                                        searchResults.innerHTML = '';

                                        results.forEach(result => {
                                            const listItem = document.createElement('li');
                                            listItem.classList.add('p-2', 'border-bottom', 'cho');

                                            const anchorTag = document.createElement('a');
                                            anchorTag.href = `{{ URL::to('/') }}/chat/${result.User_id}`;
                                            anchorTag.classList.add('d-flex', 'justify-content-between');
                                            anchorTag.setAttribute('ondblclick', `check(${result.User_id})`);
                                            anchorTag.style.textDecoration = 'none';

                                            const divRow = document.createElement('div');
                                            divRow.classList.add('d-flex', 'flex-row');

                                            const divImage = document.createElement('div');
                                            const image = document.createElement('img');
                                            image.src = `{{ URL::to('/') }}/pictures/${result.Picture}`;
                                            image.alt = 'avatar';
                                            image.classList.add('d-flex', 'align-self-center', 'me-3');
                                            image.width = 60;
                                            image.height = 60;
                                            image.style.borderRadius = '50%';
                                            divImage.appendChild(image);

                                            const badge = document.createElement('span');
                                            badge.classList.add('badge', 'bg-warning', 'badge-dot');
                                            divImage.appendChild(badge);

                                            const divText = document.createElement('div');
                                            divText.classList.add('pt-1');

                                            const nameParagraph = document.createElement('p');
                                            nameParagraph.classList.add('fw-bold', 'mb-0');
                                            nameParagraph.style.color = 'rgba(0, 0, 0, 0.758)';
                                            nameParagraph.textContent = result.Name;

                                            const descriptionParagraph = document.createElement('p');
                                            descriptionParagraph.classList.add('small', 'text-muted');
                                            descriptionParagraph.textContent = 'Have a wonderful conversation';

                                            divText.appendChild(nameParagraph);
                                            divText.appendChild(descriptionParagraph);

                                            divRow.appendChild(divImage);
                                            divRow.appendChild(divText);

                                            const divTime = document.createElement('div');
                                            divTime.classList.add('pt-1');

                                            const timeParagraph = document.createElement('p');
                                            timeParagraph.classList.add('small', 'text-muted', 'mb-1');
                                            timeParagraph.textContent = '5 mins ago';

                                            divTime.appendChild(timeParagraph);

                                            anchorTag.appendChild(divRow);
                                            anchorTag.appendChild(divTime);

                                            listItem.appendChild(anchorTag);

                                            searchResults.appendChild(listItem);
                                        });
                                    }

                                });
                            </script>

                            <ul class="list-unstyled mb-0">
                                @foreach ($user_info as $user)
                                    <li class="p-2 border-bottom cho">
                                        <a href="{{ URL::to('/') }}/chat/{{ $user['User_id'] }}"
                                            class="d-flex justify-content-between"
                                            ondblclick="check({{ $user['User_id'] }})" style="text-decoration: none">
                                            <div class="d-flex flex-row">
                                                <div>
                                                    <img src="{{ URL::to('/') }}/pictures/{{ $user['Picture'] }}"
                                                        alt="avatar" class="d-flex align-self-center me-3" width="60"
                                                        height="60" style="border-radius: 50%">
                                                    <span class="badge bg-warning badge-dot"></span>
                                                </div>
                                                <div class="pt-1">
                                                    <p class="fw-bold mb-0" style="color: rgba(0, 0, 0, 0.758);">
                                                        {{ $user['Name'] }}</p>
                                                    <p class="small text-muted">Have a wonderful conversation</p>
                                                </div>
                                            </div>
                                            <div class="pt-1">
                                                {{-- <p class="small text-muted mb-1">5 mins ago</p> --}}
                                                {{-- <span class="badge bg-danger rounded-pill float-end">2</span> --}}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-sm-8"
                            style="background-image: url({{ URL::to('/') }}/pictures/wall2.jpg);background-size: cover; text-align: center; align-items: center;">

                            <div style="margin-top: 100px;color: rgba(255, 255, 255, 0.838)">
                                <img src="pictures/chat_me.png" alt="" height="200px" width="200px"
                                    style="margin-bottom: -50px;;opacity: 1.5;">
                                <h1>Your Message</h1>
                                <h3>Choose anyone to chat</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function check(id) {
                window.location.href = "{{ URL::to('/') }}/profile/" + id;
            }
        </script>
    @endsection
</body>

</html>

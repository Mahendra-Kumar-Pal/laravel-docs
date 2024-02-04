@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="searchForm" action="/submit" method="post">
                            @csrf
                            <input type="text" id="searchQuery" name="searchQuery" placeholder="Enter your search query">
                            <button type="submit">Search</button>
                        </form>

                        <div id="imageContainer">
                            <!-- Display random images here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const searchQuery = document.getElementById('searchQuery').value;

            if (searchQuery) {
                // Make an AJAX request to Unsplash API to fetch random images
                fetch(
                        `https://api.unsplash.com/photos/random?count=4&query=${searchQuery}&client_id=YOUR_UNSPLASH_CLIENT_ID`)
                    .then(response => response.json())
                    .then(data => {
                        const imageContainer = document.getElementById('imageContainer');
                        imageContainer.innerHTML = '';

                        data.forEach(image => {
                            const imageUrl = image.urls.small;
                            imageContainer.innerHTML += `
                        <label>
                            <input type="radio" name="selectedImage" value="${imageUrl}">
                            <img src="${imageUrl}">
                        </label>
                    `;
                        });
                    });
            }
        });
    </script>
@endpush

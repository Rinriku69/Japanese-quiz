<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $title ?? 'Japanese Quiz' }}</title>
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home.main') }}">Quiz</a></li>
                <li><a href="{{ route('library.main') }}">Library</a></li>
                <li class="user"><a href="{{ route('user.login') }}">Login</a></li>


            </ul>
        </nav>
        <div class="user-actions">
            @if (isset($_SESSION['username']))
                <span class="username">Currently Log in as : {{ $_SESSION['username'] }}</span>
                <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endif
        </div>
    </header>

    <main>
        @yield('content')



    </main>

    <footer>
        Created by Sirithep Pukim
    </footer>
    <audio id="click-sound" preload="auto">
        
        <source src="{{ asset('sounds/choice-click.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <audio id="result-sound" preload="auto">
        
        <source src="{{ asset('sounds/result.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    {{-- JAVASCRIPT TO PLAY THE SOUND --}}
    <script>
        // Wait for the entire page to load before running the script
        document.addEventListener('DOMContentLoaded', (event) => {

            // Find the audio element in the HTML
            const clickSound = document.getElementById('click-sound');
            const resultSound = document.getElementById('result-sound');

            // Find ALL elements on the page that have the class 'clickable-sound'
            const soundButtons = document.querySelectorAll('.clickable-sound');
            const resultButtons = document.querySelectorAll('.result-sound');

            // Loop through each of the found elements
            soundButtons.forEach(button => {
                // Add a 'click' event listener to each one
                button.addEventListener('click', () => {
                    // Stop the sound if it's already playing and reset it to the start
                    clickSound.currentTime = 0;
                    // Play the sound
                    clickSound.play();
                });
            });
            resultButtons.forEach(button => {
                
                button.addEventListener('click', () => {
                    
                    resultSound.currentTime = 0;
                   
                    resultSound.play();
                });
            });
        });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap');

        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Roboto Mono', monospace;
            color: #00ffcc;
            text-align: center;
            background: linear-gradient(135deg, #ff0066, #ff9933, #ffff00, #33cc33, #0066ff, #9933ff);
            background-size: 400% 400%;
            animation: gradientAnimation 5s ease infinite;
            display: flex;
            flex-direction: column;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .main-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex: 1; /* This makes sure the content takes up remaining space */
        }

        .settings-container {
            width: 90%;
            max-width: 600px;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            border: 2px solid #00ffcc;
            box-shadow: 0 0 20px rgba(0, 255, 204, 0.7);
            text-align: left;
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px; /* Margin for spacing from the top */
        }

        h2 {
            color: #00ffcc;
            text-shadow: 0 0 10px rgba(0, 255, 204, 0.7);
            font-size: 2.5em;
            margin-bottom: 30px;
            font-family: 'Orbitron', sans-serif;
        }

        .setting {
            width: 100%;
            margin-bottom: 20px;
        }

        .setting-label {
            font-size: 1.2em;
            margin: 10px 0;
            color: #fff;
        }

        .slider {
            width: 100%;
            margin: 10px 0;
            -webkit-appearance: none;
            appearance: none;
            height: 15px;
            background: #b3b3b3;
            outline: none;
            opacity: 0.7;
            border-radius: 10px;
            transition: opacity 0.2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: #00ffcc;
            cursor: pointer;
            border-radius: 50%;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #00ffcc;
            cursor: pointer;
            border-radius: 50%;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 30px;
        }

        .settings-button {
            width: 120px;
            padding: 10px;
            font-size: 1.2em;
            color: #fff;
            background-color: #00ffcc;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .settings-button:hover {
            background-color: #00d1b2;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 50%;
            cursor: pointer;
            text-align: center;
            line-height: 50px;
            font-size: 1.5em;
            color: #00ffcc;
            text-decoration: none;
            transition: background-color 0.3s ease;
            z-index: 2;
        }

        .back-button:hover {
            background-color: #00d1b2;
        }

        .footer {
            text-align: center;
            width: 100%;
            font-size: 0.8em;
            color: #00ffcc;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 0;
            border-top: 2px solid #00ffcc;
            animation: slideInUp 1s ease-out;
            margin-top: auto; /* This pushes the footer to the bottom of the page */
        }

        .footer a {
            color: #00ffcc;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #00d1b2;
        }

        @keyframes slideInUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            h2 {
                font-size: 2em; /* Smaller font size for smaller screens */
            }

            .settings-button {
                width: 100%; /* Full width buttons on smaller screens */
                margin: 5px 0; /* Margin for spacing */
            }

            .slider {
                height: 10px; /* Smaller slider height */
            }

            .slider::-webkit-slider-thumb,
            .slider::-moz-range-thumb {
                width: 20px; /* Smaller thumb size */
                height: 20px; /* Smaller thumb size */
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 1.5em; /* Even smaller font size for very small screens */
            }

            .settings-button {
                font-size: 1em; /* Further reduce button font size */
            }

            .setting-label {
                font-size: 1em; /* Adjust label size */
            }
        }
    </style>
</head>
<body>
<audio id="clickSound" src="{{ asset('audio/click-sound.mp3') }}" preload="auto"></audio>
<a href="{{ route('mainmenu') }}" class="back-button" title="Back">&larr;</a>
    <div class="main-content">
        <div class="settings-container">
            <h2>Settings</h2>
            <div class="setting">
                <label class="setting-label" for="music-volume">MUSIC</label>
                <input type="range" id="music-volume" class="slider" min="0" max="100" value="50">
            </div>
            <div class="setting">
                <label class="setting-label" for="sfx-volume">SOUND FX</label>
                <input type="range" id="sfx-volume" class="slider" min="0" max="100" value="50">
            </div>
            <div class="buttons">
                <button class="settings-button">Help</button>
                <button class="settings-button">Credits</button>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>@All Rights Reserved</p>
    </div>

    <script>
         function playClickSound() {
    var clickSound = document.getElementById('clickSound');
    clickSound.play();
}

// Attach the playClickSound function to all buttons and anchor tags on the page
document.querySelectorAll('button, a').forEach(function(element) {
    element.addEventListener('click', playClickSound);
});
    </script>
</body>
</html>
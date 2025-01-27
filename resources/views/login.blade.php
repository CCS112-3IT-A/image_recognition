<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
            background: url('https://www.transparenttextures.com/patterns/circuits.png'), 
                        linear-gradient(135deg, #0d1b2a 25%, #1b263b 100%);
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
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

        .login-form {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px #00ffcc;
            width: 100%;
            max-width: 400px;
            text-align: left;
            z-index: 2;
        }

        h2 {
            margin: 0 0 20px;
            color: #00ffcc;
            font-family: 'Orbitron', sans-serif;
            text-shadow: 0 0 10px rgba(0, 255, 204, 0.7), 0 0 20px rgba(0, 255, 204, 0.5);
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #00ffcc;
        }

        input[type="text"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #00ffcc;
            border-radius: 5px;
            background: #1b263b;
            color: #00ffcc;
            font-family: 'Roboto Mono', monospace;
        }

        input[type="text"]::placeholder, input[type="password"]::placeholder {
            color: #00ffcc;
        }

        button {
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            background-color: #00ffcc;
            color: #000;
            cursor: pointer;
            font-size: 1.2em;
            font-family: 'Orbitron', sans-serif;
            width: 100%;
            text-shadow: 0 0 5px rgba(0, 255, 204, 0.7);
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 0 15px rgba(0, 255, 204, 0.7);
        }

        button:hover {
            background-color: #00d1b2;
            transform: scale(1.05);
        }

        a {
            color: #00ffcc;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #00d1b2;
        }

        p {
            margin: 20px 0 0;
            text-align: center;
            color: #00ffcc;
        }

        .footer {
            font-size: 0.8em;
            color: #00ffcc;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            z-index: 2;
            border-top: 2px solid #00ffcc;
            box-shadow: 0 0 15px #00ffcc;
        }

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background: rgba(0, 0, 0, 0.9);
    animation: fadeIn 0.5s;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.modal-content {
    background: rgba(255, 255, 255, 0.1);
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 20px;
    text-align: center;
    color: #0ff;
}

.close {
    color: #0ff;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #fff;
}
        /* Modal styles */
        .modal {
            display: none; 
            position: fixed;
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            text-align: center;
            color: black;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .password-container {
        display: flex;
        align-items: center;
        position: relative;
    }

    .password-container input {
        flex: 1;
        padding-right: 30px; /* Add space for the icon */
    }

    .toggle-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%); /* Center the icon vertically */
        cursor: pointer;
        color: #007bff;
        font-size: 1.2em;
    }

    .toggle-icon:hover {
        color: #0056b3;
    }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<audio id="clickSound" src="{{ asset('audio/click-sound.mp3') }}" preload="auto"></audio>
<audio id="background-music" src="{{ asset('music/background-music.mp3') }}" preload="auto" loop></audio>
<div class="login-form">
    <h2>LOGIN FORM</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Username:</label>
        <input type="text" id="username" name="username" required>

        <label>Password:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" required>
            <i class="fa-solid fa-eye toggle-icon" onclick="togglePasswordVisibility('password', this)"></i>
        </div>

        <a href="#">Forgot Password?</a>

        <button type="submit" name="login">LOGIN</button>

        <p>Don't have an account? <a href="{{ url('register') }}">Create Account</a></p>
    </form>
</div>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modalMessage"></p>
        </div>
    </div>

    <div class="footer">@All Rights Reserved</div>

    <script>
        // Modal handling
        let isPageFullyLoaded = false;

// Function to play background music
function playBackgroundMusic() {
    const bgMusic = document.getElementById('bgMusic');
    if (isPageFullyLoaded && bgMusic) {
        bgMusic.play().catch(function(error) {
            console.error("Music play failed:", error);
        });
    }
}

// Mark the page as fully loaded and attempt to play music
window.onload = function() {
    isPageFullyLoaded = true; // Set the boolean flag to true
    playBackgroundMusic(); // Attempt to play music
};
        // Function to play the click sound
function playClickSound() {
    var clickSound = document.getElementById('clickSound');
    clickSound.play();
}

function togglePasswordVisibility(fieldId, icon) {
        const passwordField = document.getElementById(fieldId);

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

// Attach the playClickSound function to all buttons and anchor tags on the page
document.querySelectorAll('button, a').forEach(function(element) {
    element.addEventListener('click', playClickSound);
});
        @if(session('id'))
        // Store user ID in localStorage
        localStorage.setItem('userId', '{{ session('id') }}');
        @endif

        function showModal(message) {
            document.getElementById('modalMessage').innerText = message; 
            let modal = document.getElementById('myModal');
            modal.style.display = "block";
        }

        document.querySelector('.close').onclick = function() {
            document.getElementById('myModal').style.display = "none";
        }

        window.onclick = function(event) {
            let modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>

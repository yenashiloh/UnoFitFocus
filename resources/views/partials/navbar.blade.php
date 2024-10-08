<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/navbar.css">
    <title>Navbar</title>
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="../assets/images/favicon.png" href="index.php" alt="FitFocus Logo" height="50">
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('Exercises') }}">Exercises</a></li>
            <li><a href="{{ route('TryCamera') }}">Health Tips</a></li>
            <li><a href="{{ route('AboutUs') }}">About Us</a></li>
            <li><a href="{{ route('Sample') }}">Contact</a></li>
            <li><a href="{{ route('Choose') }}">Choose</a></li>
        </ul>
        <div class="auth-buttons">
             <!-- Guest users (not logged in) -->
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endguest

            <!-- Authenticated users (logged in) -->
            @auth
                <li><a href="{{ route('profile') }}">Profile</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endauth
            
            <!--
            <div id="logoutForm">
                <form action="logoutCall.php" method="post">
                    <div class="popupForm">
                        <div class="header-cont">
                            <div class="icon-box">
                                <i class="fa-solid fa-right-from-bracket" style="font-size: 4rem; background-color: transparent"></i>
                            </div>
                            <div class="headertext-box">
                                <h3>Confirm Logout?</h3>
                                <p>Are you sure you want to log out?</p>
                            </div>
                        </div>
                        <div class="form-btnarea">
                            <button class="buttonno" type="button" onclick="openForm(logoutForm)">No</button>
                            <button class="buttonyes" type="submit" name="submit" value="delete">Yes</button>
                        </div>
                    </div>
                </form>
            </div>-->
        </div>
    </nav>
    <script>
        const navbar = document.querySelector('.nav-wrapper');
        window.onscroll = () => {
            if (window.scrollY > 50) {
                navbar.classList.add('nav-scrolled');
            } else {
                navbar.classList.remove('nav-scrolled');
            }
        };
        const openForm = item => {
            if (document.getElementById(item.id).style.display == "none" || document.getElementById(item.id).style.display == "") {
                document.getElementById(item.id).style.display = "flex";
                document.body.style.height = "100%";
                document.body.style.overflow = "hidden";
            } else {
                document.getElementById(item.id).style.display = "none";
                document.body.style.height = "auto";
                document.body.style.overflow = "unset";
            }
        }
    </script>
</body>
</html>

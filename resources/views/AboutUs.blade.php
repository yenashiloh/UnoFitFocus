<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | FitFocus</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/AboutUs.css">
</head>
<body>
    @include('partials.navbar')
    <main>
        <!-- Header Section -->
        <header class="header">
            <div class="header-overlay"></div>
            <div class="container header-content">
                <h1>FitFocus</h1>
                <p>Revolutionizing bodyweight workouts through posture correction powered by human pose estimation.</p>
            </div>
        </header>

        <!-- About Section -->
        <section class="about-section">
            <div class="container">
                <div class="content-wrapper">
                    <div class="about-content">
                        <h2>What We Do</h2>
                        <p>FitFocus uses advanced technology to analyze your posture in real time during key bodyweight exercises like squats, push-ups, and crunches. Our goal is to help you perfect your form, reduce injury risks, and maximize workout efficiency.</p>
                        <div class="feature-card">
                            <h3>Key Features</h3>
                            <ul>
                                <li>Real-time posture correction</li>
                                <li>Pose estimation for accuracy</li>
                                <li>Personalized workout feedback</li>
                            </ul>
                        </div>
                    </div>
                    <div class="about-image">
                        <img src="../assets/images/workout.jpg" alt="FitFocus in Action">
                    </div>
                </div>
            </div>
        </section>

        <section class="developers-section">
            <div class="container">
                <h2>Meet the Developers</h2>
                <div class="developer-wrapper">
                    <div class="developer-card">
                        <img src="../assets/images/placeholder.png" alt="Developer 1">
                        <h3>Jeph Hodreal</h3>
                        <p>Lead Developer & Project Manager</p>
                    </div>
                    <div class="developer-card">
                        <img src="../assets/images/placeholder.png" alt="Developer 2">
                        <h3>Magallanes Butuhan Jr.</h3>
                        <p>Machine Learning Engineer & Backend Developer</p>
                    </div>
                    <div class="developer-card">
                        <img src="../assets/images/placeholder.png" alt="Developer 3">
                        <h3>Princess Martinez</h3>
                        <p>Frontend Developer & Machine Learning Researcher</p>
                    </div>
                    <div class="developer-card">
                        <img src="../assets/images/placeholder.png" alt="Developer 4">
                        <h3>Monique Burilla</h3>
                        <p>Researcher & Documentation Specialist</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <p>&copy; 2024 FitFocus. All Rights Reserved.</p>
            <ul class="footer-links">
                <li><a href="#terms">Terms of Service</a></li>
                <li><a href="#privacy">Privacy Policy</a></li>
            </ul>
        </footer>
    </main>
</body>
</html>
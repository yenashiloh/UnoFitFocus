<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | FitFocus</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/home.css">
</head>
<body>
    <!--header-->
    @include('partials.navbar')
    <main class="hero-section">
        <div class="hero-content">
            <h2>Welcome to FitFocus!</h2>
            <p>Your journey towards a healthier, fitter you starts here.</p>
            <a href="SignUp.php" class="btn">Get Started</a>
        </div>
    </main>

    <!--Features section -->
    <section class="detail-wrapper" id="RoomRates">
        <div class="overall-room">
            <div class="section-title">
                <h2 class="notthis">Features</h2>
            </div>
            <div class="feats">
                <div class="per-feat">
                    <div class="off">
						<img src="../assets/images/feature1.png" alt="FitFocus offers workout variety">
					</div>
                    <div class="feat-type">
                        Workout Variety
                        <div class="test-row">
                            <span> Different bodyweight exercises to choose from. </span>
                        </div>
                    </div>
                </div>
                <div class="per-feat">
                    <div class="off">
						<img src="../assets/images/feature2.png" alt="FitFocus provides live feedback.">
					</div>
                    <div class="feat-type">
                        Live Feedback
                        <div class="test-row">
                            <span> Realtime form assessment during workouts. </span>
                        </div>
                    </div>
                </div>
                <div class="per-feat">
                    <div class="off">
						<img src="../assets/images/feature3.png" alt="FitFocus allows for convenient workouts.">
					</div>
                    <div class="feat-type">
                        Convenient Use
                        <div class="test-row">
                            <span> Use anytime, anywhere. </span>
                        </div>
                    </div>
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
    <script>
    </script>
</body>
</html>
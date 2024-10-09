<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitCheck | FitFocus</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/FitCheck.css">
</head>
<body>
    @include('partials.navbar')
    <main>
        <div class="container">
            <h1>Select Your Workout</h1>
            <div class="workout-options">
                <div class="workout-item" id="pushup">
                    <img src="../assets/images/pu_standard.jpg" alt="Push-Up">
                    <p>Push-Up</p>
                </div>
                <div class="workout-item" id="squat">
                    <img src="../assets/images/sq_standard.jpg" alt="Squat">
                    <p>Squat</p>
                </div>
                <div class="workout-item" id="crunch">
                    <img src="../assets/images/cr_standard.jpg" alt="Crunch">
                    <p>Crunch</p>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="modal">
            <div class="modal-content">
                <h2 id="workout-title">Select Difficulty</h2>
                <div class="difficulty-options">
                    <button class="difficulty-btn" data-difficulty="Beginner">Beginner</button>
                    <button class="difficulty-btn" data-difficulty="Intermediate">Intermediate</button>
                    <button class="difficulty-btn" data-difficulty="Expert">Expert</button>
                </div>
                <div class="modal-buttons">
                    <button class="go-btn disabled" id="goBtn">Go</button>
                    <button class="close-btn" id="closeBtn">Close</button>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/js/FitCheck.js"></script>
</body>
</html>

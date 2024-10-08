<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercises | FitFocus</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/Exercises.css">
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        <h1>FitFocus Workouts</h1>

        <!-- Push Up, Squat, Crunch Elements -->
        <div class="workout-selection">
            <div class="workout" id="pushUp">
                <img src="../assets/images/pu_standard.jpg" alt="Push Up" />
                <p>Push Up</p>
            </div>
            <div class="workout" id="squat">
                <img src="../assets/images/sq_standard.jpg" alt="Squat" />
                <p>Squat</p>
            </div>
            <div class="workout" id="crunch">
                <img src="../assets/images/cr_standard.jpg" alt="Crunch" />
                <p>Crunch</p>
            </div>
        </div>

        <!-- Modal for Workouts -->
        <div id="workoutModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="carousel">
                    <button class="carousel-control prev">←</button>
                    <div class="carousel-inner" id="carouselContent">
                        <!-- Content will be dynamically injected here -->
                    </div>
                    <button class="carousel-control next">→</button>
                </div>
            </div>
        </div>

        <!-- Warm-Up and Cooldown Section -->
        <section class="warmup-cooldown">
            <h2>Warm-Up & Cooldown</h2>
            <div class="exercise-section">
                <div class="exercise">
                    <img src="../assets/images/jumpingjacks.jpg" alt="Jumping Jacks">
                    <div class="exercise-details">
                        <h3>Warm-Up: Jumping Jacks</h3>
                        <p>How to do it: Stand upright with your legs together and arms at your sides. Jump up while spreading your legs and raising your arms above your head. Return to starting position and repeat.</p>
                    </div>
                </div>
                <div class="exercise">
                    <img src="../assets/images/childspose.jpg" alt="Child's Pose">
                    <div class="exercise-details">
                        <h3>Cooldown: Child's Pose</h3>
                        <p>How to do it: Start on your hands and knees. Sit back with your hips toward your heels, stretching your arms forward. Relax your head and stretch your back.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="../assets/js/Exercises.js"></script>
</body>
</html>
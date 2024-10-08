<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Selection</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 1200px;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .workout-options {
            display: flex;
            justify-content: space-around;
            margin-top: 2rem;
        }

        .workout-item {
            width: 300px; /* Increased width */
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .workout-item:hover {
            transform: scale(1.05);
        }

        .workout-item img {
            width: 100%;
            border-radius: 12px; /* Slightly more rounded corners */
            transition: box-shadow 0.3s ease;
        }

        .workout-item img:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3); /* Increased shadow effect */
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            max-width: 400px;
            width: 100%;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .difficulty-options {
            display: flex;
            justify-content: space-around;
            margin: 2rem 0;
        }

        .difficulty-btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .difficulty-btn[data-difficulty="Beginner"] {
            background-color: #2ecc71; /* Green for Beginner */
        }

        .difficulty-btn[data-difficulty="Intermediate"] {
            background-color: #f39c12; /* Orange for Intermediate */
        }

        .difficulty-btn[data-difficulty="Expert"] {
            background-color: #e74c3c; /* Red for Expert */
        }

        .difficulty-btn.selected {
            border: 3px solid #2c3e50; /* Add a clear border to show selection */
            background-color: #34495e;
            color: white;
        }

        .modal-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 1rem;
        }

        .go-btn {
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .go-btn.disabled {
            background-color: grey;
            cursor: not-allowed;
        }

        .close-btn {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .go-btn:hover, .close-btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
<!--header-->
@include('partials.navbar')
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

<script>
    let selectedDifficulty = null;
    const workoutOptions = document.querySelectorAll('.workout-item');
    const modal = document.getElementById('modal');
    const goBtn = document.getElementById('goBtn');
    const difficultyBtns = document.querySelectorAll('.difficulty-btn');
    const workoutTitle = document.getElementById('workout-title');

    // Handle workout selection click
    workoutOptions.forEach(option => {
        option.addEventListener('click', function () {
            const workout = option.querySelector('p').innerText;
            workoutTitle.innerText = `${workout}: Select Difficulty`;
            modal.style.display = 'flex';
        });
    });

    // Handle difficulty selection
    difficultyBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            difficultyBtns.forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
            selectedDifficulty = btn.dataset.difficulty;
            goBtn.classList.remove('disabled');
        });
    });

    // Close modal
    document.getElementById('closeBtn').addEventListener('click', function () {
        modal.style.display = 'none';
        difficultyBtns.forEach(btn => btn.classList.remove('selected'));
        goBtn.classList.add('disabled');
        selectedDifficulty = null;
    });

    // Handle Go button click
    goBtn.addEventListener('click', function () {
        if (!goBtn.classList.contains('disabled')) {
            alert(`You selected ${workoutTitle.innerText} at ${selectedDifficulty} difficulty.`);
            modal.style.display = 'none';
            difficultyBtns.forEach(btn => btn.classList.remove('selected'));
            goBtn.classList.add('disabled');
        }
    });
</script>

</body>
</html>

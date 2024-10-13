<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workout | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body>
    <main>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('FitCheck') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Select a workout, choose a difficulty level, and start working out!') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="container mx-auto text-center">
                    <h1 class="text-4xl font-bold mb-4 text-gray-800">Select Your Workout</h1>
                    <div class="flex justify-around mt-8">
                        <div class="workout-item w-72 cursor-pointer transform transition-transform duration-300 hover:scale-105" id="pushup">
                            <img src="../assets/images/pu_standard.jpg" alt="Push-Up" class="w-full rounded-lg transition-shadow duration-300 hover:shadow-lg">
                            <p class="mt-2">{{ __('Push-Up') }}</p>
                        </div>
                        <div class="workout-item w-72 cursor-pointer transform transition-transform duration-300 hover:scale-105" id="squat">
                            <img src="../assets/images/sq_standard.jpg" alt="Squat" class="w-full rounded-lg transition-shadow duration-300 hover:shadow-lg">
                            <p class="mt-2">{{ __('Squat') }}</p>
                        </div>
                        <div class="workout-item w-72 cursor-pointer transform transition-transform duration-300 hover:scale-105" id="plank">
                            <img src="../assets/images/pl_standard.jpg" alt="Plank" class="w-full rounded-lg transition-shadow duration-300 hover:shadow-lg">
                            <p class="mt-2">{{ __('Plank') }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Modal -->
                <div class="modal fixed inset-0 hidden bg-black bg-opacity-60 justify-center items-center" id="modal">
                    <div class="bg-white p-8 rounded-lg text-center max-w-md w-full transform transition-transform duration-300 animate-slideIn">
                        <h2 class="text-xl font-bold mb-6" id="workout-title">Select Difficulty</h2>
                        <div class="flex justify-around my-4">
                            <button class="difficulty-btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg" data-difficulty="Beginner">Beginner</button>
                            <button class="difficulty-btn bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg" data-difficulty="Intermediate">Intermediate</button>
                            <button class="difficulty-btn bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg" data-difficulty="Expert">Expert</button>
                        </div>
                        <div class="modal-buttons flex justify-around mt-4">
                            <a href="{{ route('FitCheck') }}" class="go-btn bg-green-600 text-white py-2 px-4 rounded-lg opacity-50 cursor-not-allowed" id="goBtn">Go</a>
                            <button class="close-btn bg-red-600 text-white py-2 px-4 rounded-lg" id="closeBtn">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>    
    </main>
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
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        // Handle difficulty selection
        difficultyBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                difficultyBtns.forEach(b => b.classList.remove('border-4', 'border-gray-800', 'bg-gray-700', 'text-white'));
                btn.classList.add('border-4', 'border-gray-800', 'bg-gray-700', 'text-white');
                selectedDifficulty = btn.dataset.difficulty;
                goBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            });
        });

        // Close modal
        document.getElementById('closeBtn').addEventListener('click', function () {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            difficultyBtns.forEach(btn => btn.classList.remove('border-4', 'border-gray-800', 'bg-gray-700', 'text-white'));
            goBtn.classList.add('opacity-50', 'cursor-not-allowed');
            selectedDifficulty = null;
        });
    </script>
</body>
</html>
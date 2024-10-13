<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FitCheck | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <style>
        video {
            width: 100%;
            max-width: 600px;
            border: 2px solid black;
        }
        #camera-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
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
                <div id="camera-container">
                    <video id="video" autoplay></video>
                </div>
            </div>
        </x-app-layout>    
    </main>
    <script>
        const video = document.getElementById('video');
    
        // Request access to the camera
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error("Error accessing the camera: ", err);
            });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Camera</title>
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

<div id="camera-container">
    <video id="video" autoplay></video>
</div>

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
// Workout information with procedures
const workouts = {
    pushUp: [
        { 
            name: "Standard Push Up", 
            description: "A classic upper body workout targeting the chest, shoulders, and triceps.", 
            procedure: "Start in a plank position, keep your body straight, lower yourself down, and then push back up.", 
            img: "../assets/images/pu_standard.jpg" 
        },
        { 
            name: "Knee Push Up", 
            description: "A modified version of the push-up, perfect for beginners.", 
            procedure: "Start in a plank position with your knees on the ground, lower yourself down and push back up.", 
            img: "../assets/images/pu_knee.jpg" 
        },
        { 
            name: "Bear Plank Push Up", 
            description: "A variation that increases core engagement.", 
            procedure: "Start in a bear plank with knees bent. Lower your chest and push back up.", 
            img: "../assets/images/pu_bearplank.jpg" 
        },
        { 
            name: "Pike Push Up", 
            description: "Targets the shoulders and upper chest.", 
            procedure: "In a pike position, lower your head and push back up while maintaining form.", 
            img: "../assets/images/pu_pike.jpg" 
        }
    ],
    squat: [
        { 
            name: "Standard Squat", 
            description: "A fundamental lower body exercise that works your quads, glutes, and hamstrings.", 
            procedure: "Stand with feet shoulder-width apart, lower down by bending your knees, and push back up.", 
            img: "../assets/images/sq_standard.jpg" 
        },
        { 
            name: "Plie Squat", 
            description: "Targets inner thighs and glutes with a wider stance.", 
            procedure: "Take a wider stance with toes pointing out, squat down and push back up.", 
            img: "../assets/images/sq_plie.jpg" 
        },
        { 
            name: "Pistol Squat", 
            description: "A challenging single-leg squat that tests balance and strength.", 
            procedure: "Extend one leg out, squat down on the standing leg and push back up.", 
            img: "../assets/images/sq_pistol.jpg" 
        },
        { 
            name: "Split Squat", 
            description: "Focuses on the quads and glutes with a split stance.", 
            procedure: "Step forward with one leg, lower down into a lunge, and push back up.", 
            img: "../assets/images/sq_split.jpg" 
        }
    ],
    crunch: [
        { 
            name: "Standard Crunch", 
            description: "A core exercise targeting the upper abdominal muscles.", 
            procedure: "Lie on your back with knees bent, curl your torso towards your knees, and lower back down.", 
            img: "../assets/images/cr_standard.jpg" 
        },
        { 
            name: "Bicycle Crunch", 
            description: "Engages both the upper and lower abs with a twisting motion.", 
            procedure: "Lie on your back, bring opposite elbow to knee while extending the other leg.", 
            img: "../assets/images/cr_bicycle.jpg" 
        },
        { 
            name: "Reverse Crunch", 
            description: "Targets the lower abs.", 
            procedure: "Lie on your back, lift your legs towards the ceiling, and curl your hips off the ground.", 
            img: "../assets/images/cr_reverse.jpg" 
        },
        { 
            name: "Oblique Crunch", 
            description: "Focuses on the obliques for a more defined waistline.", 
            procedure: "Lie on your side, curl your torso upwards to engage the oblique muscles.", 
            img: "../assets/images/cr_oblique.jpg" 
        }
    ]
};

// Get references to modal elements
const modal = document.getElementById('workoutModal');
const modalContent = document.getElementById('carouselContent');
const closeModal = document.querySelector('.close');
const nextBtn = document.querySelector('.next');
const prevBtn = document.querySelector('.prev');

// Variables to track current workout and index
let currentWorkout = [];
let currentIndex = 0;

// Event listeners for opening modals
document.getElementById('pushUp').addEventListener('click', () => openModal('pushUp'));
document.getElementById('squat').addEventListener('click', () => openModal('squat'));
document.getElementById('crunch').addEventListener('click', () => openModal('crunch'));

// Close the modal when the close button is clicked
closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Open the modal with the selected workout type
function openModal(type) {
    currentWorkout = workouts[type];
    currentIndex = 0;
    updateModal();
    modal.style.display = 'flex';
}

// Update modal content based on current workout and index
function updateModal() {
    const workout = currentWorkout[currentIndex];
    modalContent.innerHTML = `
        <h2>${workout.name}</h2>
        <img src="${workout.img}" alt="${workout.name}">
        <p><strong>Description:</strong> ${workout.description}</p>
        <p><strong>Procedure:</strong> ${workout.procedure}</p>
    `;
}

// Event listeners for carousel controls
nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % currentWorkout.length;
    updateModal();
});

prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + currentWorkout.length) % currentWorkout.length;
    updateModal();
});
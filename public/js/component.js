
// Wait for the entire page to load before running the script
document.addEventListener('DOMContentLoaded', (event) => {


    const clickSound = document.getElementById('click-sound');
    const resultSound = document.getElementById('result-sound');
    const retrySound = document.getElementById('retry-sound');


    const soundButtons = document.querySelectorAll('.clickable-sound');
    const resultButtons = document.querySelectorAll('.result-sound');
    const retryButtons = document.querySelectorAll('.retry-sound');

    const myModal = document.getElementById('hintModal');
    const openButton = document.getElementById('hint-btn');
    const closeButton = document.getElementById('close-modal-btn');

    openButton.addEventListener('click', () => {
        myModal.showModal();
    });
    closeButton.addEventListener('click', () => {
        myModal.close();
    });
    myModal.addEventListener('click', (event) => {
        if (event.target === myModal) {
            myModal.close();
        }
    });

    // Loop through each of the found elements
    soundButtons.forEach(button => {
        // Add a 'click' event listener to each one
        button.addEventListener('click', () => {
            // Stop the sound if it's already playing and reset it to the start
            clickSound.currentTime = 0;
            clickSound.play();
        });
    });
    resultButtons.forEach(button => {


        button.addEventListener('click', () => {

            resultSound.currentTime = 0;

            resultSound.play();
        });

    });
    retryButtons.forEach(button => {

        button.addEventListener('click', () => {

            retrySound.currentTime = 0;

            retrySound.play();
        });
    });
});

// Wait for the page to fully load before setting up the canvas
        window.addEventListener('load', () => {
            const canvas = document.getElementById('drawing-canvas');
            const ctx = canvas.getContext('2d');
            let isDrawing = false;

            // Set drawing styles
            ctx.strokeStyle = '#333';
            ctx.lineWidth = 12;
            ctx.lineCap = 'round'; // Makes the line ends smooth
            ctx.lineJoin = 'round'; // Makes the line corners smooth

            // Function to start drawing
            function startDrawing(e) {
                isDrawing = true;
                draw(e); // Start drawing immediately
            }

            // Function to stop drawing
            function stopDrawing() {
                isDrawing = false;
                ctx.beginPath(); // Reset the path
            }

            // The main drawing function
            function draw(e) {
                if (!isDrawing) return;

                // Adjust mouse position to be relative to the canvas
                const rect = canvas.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                ctx.lineTo(x, y);
                ctx.stroke();
                ctx.beginPath();
                ctx.moveTo(x, y);
            }

            // Event Listeners for mouse
            canvas.addEventListener('mousedown', startDrawing);
            canvas.addEventListener('mouseup', stopDrawing);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseout', stopDrawing); // Stop if mouse leaves canvas

            // --- Button Logic ---
            const finishBtn = document.getElementById('finish-btn');
            const clearBtn = document.getElementById('clear-btn');
            const answerOverlay = document.getElementById('answer-overlay');

            // Show the answer when "Finish" is clicked
            finishBtn.addEventListener('click', () => {
                answerOverlay.classList.remove('hidden');
            });

            // Clear the canvas when "Clear" is clicked
            clearBtn.addEventListener('click', () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                answerOverlay.classList.add('hidden'); // Also hide the answer again
            });
        });

       window.addEventListener('load', () => {
    // Find the timer container element in the HTML
    const timerContainer = document.getElementById('overall-timer-container');

    // If the timer container doesn't exist on this page, do nothing.
    if (!timerContainer) {
        return;
    }

    const minutesDisplay = document.getElementById('timer-minutes');
    const secondsDisplay = document.getElementById('timer-seconds');

    // Read the data passed from the Blade file
    let totalSeconds = parseInt(timerContainer.dataset.timeLeft || '0');
    const resultsUrl = timerContainer.dataset.resultsUrl;

    const timerInterval = setInterval(() => {
        if (totalSeconds <= 0) {
            clearInterval(timerInterval);
            // Use the URL we read from the data attribute
            if (resultsUrl) {
                window.location.href = resultsUrl;
            }
            return;
        }

        totalSeconds--;

        const minutes = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;

        minutesDisplay.textContent = String(minutes).padStart(2, '0');
        secondsDisplay.textContent = String(seconds).padStart(2, '0');

        if (totalSeconds <= 10) {
            timerContainer.classList.add('low-time');
        }

    }, 1000);
});

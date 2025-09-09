
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

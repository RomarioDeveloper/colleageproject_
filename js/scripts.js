document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.slider').forEach(function(slider) {
        let images = slider.querySelectorAll('img');
        let currentIndex = 0;

        images[currentIndex].classList.add('active');

        slider.insertAdjacentHTML('beforeend', `
            <div class="slider-buttons">
                <button class="slider-button prev">&lt;</button>
                <button class="slider-button next">&gt;</button>
            </div>
        `);

        let nextButton = slider.querySelector('.next');
        let prevButton = slider.querySelector('.prev');

        nextButton.addEventListener('click', function() {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add('active');
        });

        prevButton.addEventListener('click', function() {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            images[currentIndex].classList.add('active');
        });
    });
});

function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

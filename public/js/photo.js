document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');

    modals.forEach(modal => {
        const images = modal.querySelectorAll('.zoomable-image');
        let currentImageIndex = 0;
        let zoom;

        const updateNavigationButtons = () => {
            const prevButton = modal.querySelector('.prev-image-button');
            const nextButton = modal.querySelector('.next-image-button');

            prevButton.style.display = currentImageIndex === 0 ? 'none' : 'block';
            nextButton.style.display = currentImageIndex === images.length - 1 ? 'none' : 'block';
        };

        const changeImage = (index) => {
            currentImageIndex = index;
            zoom.detach();
            zoom.attach(images[currentImageIndex]);
            updateNavigationButtons();
        };

        const prevButton = modal.querySelector('.prev-image-button');
        const nextButton = modal.querySelector('.next-image-button');

        prevButton.addEventListener('click', () => {
            if (currentImageIndex > 0) {
                changeImage(currentImageIndex - 1);
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentImageIndex < images.length - 1) {
                changeImage(currentImageIndex + 1);
            }
        });

        images.forEach((image, index) => {
            image.addEventListener('click', () => {
                currentImageIndex = index;
                if (!zoom) {
                    zoom = mediumZoom(images, {
                        background: 'rgba(0, 0, 0, 0)',
                        zIndex: 1060,
                    });
                }
                zoom.show(image);
                updateNavigationButtons();
            });
        });
    });

    const zoomableImages = document.querySelectorAll('.zoomable-image');

    zoomableImages.forEach(image => {
        image.addEventListener('click', function () {
            const overlay = document.createElement('div');
            overlay.classList.add('overlay');
            overlay.innerHTML = "<img src='" + image.src + "'>";
            document.body.appendChild(overlay);

            overlay.addEventListener('click', function (e) {
                if (e.target === overlay) {
                    overlay.remove();
                }
            });
        });
    });
});

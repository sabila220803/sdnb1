document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.querySelector('.prestasi-wrapper');
    const items = document.querySelectorAll('.prestasi-item');
    const prevBtn = document.querySelector('.prestasi-prev');
    const nextBtn = document.querySelector('.prestasi-next');
    
    let currentIndex = 0;
    const totalItems = items.length;
    const itemsPerView = 4;
    const maxIndex = totalItems - itemsPerView;
    const itemWidth = wrapper.clientWidth / itemsPerView;
    let isAnimating = false;
    
    // Fungsi untuk menggeser carousel dengan animasi
    function slideCarousel(direction) {
        if (isAnimating) return;
        
        isAnimating = true;
        
        if (direction === 'next' && currentIndex < maxIndex) {
            currentIndex++;
        } else if (direction === 'prev' && currentIndex > 0) {
            currentIndex--;
        } else {
            isAnimating = false;
            return;
        }
        
        const translateX = -currentIndex * itemWidth;
        wrapper.style.transform = `translateX(${translateX}px)`;
        
        setTimeout(() => {
            isAnimating = false;
        }, 500); // Sesuaikan dengan durasi transisi CSS
    }
    
    // Event listener untuk tombol navigasi
    prevBtn.addEventListener('click', () => slideCarousel('prev'));
    nextBtn.addEventListener('click', () => slideCarousel('next'));
    
    // Auto slide setiap 5 detik
    const autoSlideInterval = setInterval(() => {
        if (currentIndex < maxIndex) {
            slideCarousel('next');
        } else {
            currentIndex = -1; // Reset ke awal
            slideCarousel('next');
        }
    }, 5000);
    
    // Hentikan auto slide saat user berinteraksi
    wrapper.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });
    
    // Tambahkan touch support untuk mobile
    let touchStartX = 0;
    let touchEndX = 0;
    
    wrapper.addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].clientX;
    });
    
    wrapper.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].clientX;
        const difference = touchStartX - touchEndX;
        
        if (Math.abs(difference) > 50) { // Minimal swipe distance
            if (difference > 0) {
                slideCarousel('next');
            } else {
                slideCarousel('prev');
            }
        }
    });
}
)
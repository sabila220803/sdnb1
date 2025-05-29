document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.querySelector('.prestasi-wrapper');
    const items = document.querySelectorAll('.prestasi-item');
    const prevBtn = document.querySelector('.prestasi-prev');
    const nextBtn = document.querySelector('.prestasi-next');
    
    let currentIndex = 0;
    const totalItems = items.length;
    const itemsPerView = 3; // Menampilkan 3 item per view
    const maxIndex = Math.max(0, totalItems - itemsPerView);
    let itemWidth = 0;
    let isAnimating = false;
    let autoSlideInterval;
    
    // Fungsi untuk menghitung lebar item
    function calculateItemWidth() {
        // Mendapatkan lebar wrapper dan menghitung lebar item berdasarkan jumlah item per view
        const wrapperWidth = wrapper.clientWidth;
        itemWidth = wrapperWidth / itemsPerView;
        
        // Mengatur lebar item
        items.forEach(item => {
            item.style.flex = `0 0 ${itemWidth}px`;
        });
    }
    
    // Panggil fungsi untuk menghitung lebar item
    calculateItemWidth();
    
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
    prevBtn.addEventListener('click', function(e) {
        e.preventDefault();
        slideCarousel('prev');
    });
    
    nextBtn.addEventListener('click', function(e) {
        e.preventDefault();
        slideCarousel('next');
    });
    
    // Fungsi untuk auto slide
    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            if (currentIndex < maxIndex) {
                slideCarousel('next');
            } else {
                // Reset ke awal
                currentIndex = 0;
                wrapper.style.transform = 'translateX(0)';
            }
        }, 5000);
    }
    
    // Mulai auto slide
    startAutoSlide();
    
    // Hentikan auto slide saat hover
    wrapper.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });
    
    // Mulai kembali auto slide setelah hover selesai
    wrapper.addEventListener('mouseleave', () => {
        startAutoSlide();
    });
    
    // Recalculate item width on window resize
    window.addEventListener('resize', () => {
        calculateItemWidth();
        // Reset position after resize
        currentIndex = 0;
        wrapper.style.transform = 'translateX(0)';
    });
});
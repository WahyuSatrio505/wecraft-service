document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.slider-image');
            const dots = document.querySelectorAll('.dot');
            let currentIndex = 0;
            const intervalTime = 4000; // Gambar berganti setiap 4 detik

            function nextImage() {
                // Hapus kelas active dari gambar dan dot saat ini
                images[currentIndex].classList.remove('active');
                dots[currentIndex].classList.remove('active');

                // Pindah ke indeks berikutnya
                currentIndex = (currentIndex + 1) % images.length;

                // Tambah kelas active ke gambar dan dot baru
                images[currentIndex].classList.add('active');
                dots[currentIndex].classList.add('active');
            }

            // Jalankan interval otomatis
            setInterval(nextImage, intervalTime);

            // Opsional: Klik dot untuk pindah gambar
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    images[currentIndex].classList.remove('active');
                    dots[currentIndex].classList.remove('active');
                    
                    currentIndex = index;
                    
                    images[currentIndex].classList.add('active');
                    dots[currentIndex].classList.add('active');
                });
            });
        });
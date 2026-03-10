     // Init Animation
        AOS.init({ once: true, offset: 50, duration: 1000 });

        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if(window.scrollY > 50) {
                nav.style.background = 'rgba(11, 15, 25, 0.95)';
                nav.style.padding = '0.8rem 0';
            } else {
                nav.style.background = 'rgba(11, 15, 25, 0.6)';
                nav.style.padding = '1.2rem 0';
            }
        });

        // Typing Effect
        const words = ["Websites", "Portfolios", "Online Stores", "Landing Pages"];
        let i = 0;
        let timer;

        function typingEffect() {
            const element = document.getElementById('typing-text');
            element.innerText = words[i];
            i = (i + 1) % words.length;
        }
        setInterval(typingEffect, 2000);

        // Card Mouse Effect (Glow mengikuti mouse)
        document.querySelectorAll('.bento-card').forEach(card => {
            card.onmousemove = e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            }
        });

        // Number Counter Animation
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const inc = target / 100;
            
            const updateCount = () => {
                const count = +counter.innerText;
                if(count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target + "+";
                }
            }
            // Trigger animation only when visible (Simple implementation)
            setTimeout(updateCount, 1500); 
        });

        // Pricing Switcher
        function switchPricing(type) {
            const switchBg = document.querySelector('.switch-bg');
            const labels = document.querySelectorAll('.pricing-label');
            const prices = document.querySelectorAll('.price-text');
            const cycles = document.querySelectorAll('.billing-cycle');

            if(type === 'monthly') {
                switchBg.style.transform = 'translateX(100%)';
                labels[1].classList.add('active');
                labels[0].classList.remove('active');
                
                prices.forEach(price => {
                    price.innerText = "Rp " + price.getAttribute('data-month');
                });
                cycles.forEach(cycle => cycle.innerText = "Per bulan (Cicilan 3x)");
            } else {
                switchBg.style.transform = 'translateX(0)';
                labels[0].classList.add('active');
                labels[1].classList.remove('active');
                
                prices.forEach(price => {
                    price.innerText = "Rp " + price.getAttribute('data-one');
                });
                cycles.forEach(cycle => cycle.innerText = "Bayar sekali, milik selamanya");
            }
        }

        // AI Generator Logic
        function generateAI() {
            const input = document.getElementById('aiInput').value;
            const output = document.getElementById('aiOutput');
            const loading = document.getElementById('aiLoading');

            if(input.length < 5) {
                output.innerHTML = "<span class='text-danger'>// Error: Input ide terlalu pendek.</span>";
                return;
            }

            loading.classList.remove('d-none');
            output.innerHTML = "<span class='text-muted'>// Memproses data...</span>";

            setTimeout(() => {
                loading.classList.add('d-none');
                output.innerHTML = `
                    <div class='mb-2'><span class='text-warning'>[SUCCESS]</span> Konsep Ditemukan:</div>
                    <ul class='list-unstyled ms-2'>
                        <li><strong>Nama Saran:</strong> "${input.split(" ")[0]}ify" atau "Royal ${input.split(" ")[0]}"</li>
                        <li><strong>Warna Utama:</strong> Navy Blue & Gold (Kesan Mewah)</li>
                        <li><strong>Halaman Wajib:</strong> Home, Katalog Produk, Tentang Kami, Testimoni.</li>
                        <li><strong>Fitur Kunci:</strong> Galeri Zoom-in produk, Form Custom Order WA.</li>
                    </ul>
                    <span class='text-muted opacity-50'>// Siap dieksekusi oleh YuCraft.</span>
                `;
            }, 2000);
        }


        
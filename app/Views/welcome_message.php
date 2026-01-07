<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>appsbee - Solusi Digital Masa Depan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Outfit', sans-serif; }
        h1, h2, h3, .brand-font { font-family: 'Space Grotesk', sans-serif; }
        .font-mono { font-family: 'Fira Code', monospace; }
        
        /* Custom Animations */
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 5s ease infinite;
        }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }

        .glass-card {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .text-glow {
            text-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }

        /* Floating Code Animation */
        @keyframes floatQuote {
            0% { transform: translateY(0) scale(0.9); opacity: 0; }
            20% { opacity: 0.6; transform: translateY(-20px) scale(1); }
            80% { opacity: 0.6; transform: translateY(-80px) scale(1); }
            100% { transform: translateY(-100px) scale(0.9); opacity: 0; }
        }
        .code-particle {
            position: absolute;
            pointer-events: none;
            animation: floatQuote linear forwards;
            font-family: 'Fira Code', monospace;
            white-space: nowrap;
        }
    </style>
</head>
<body class="bg-[#050511] text-white antialiased selection:bg-pink-500 selection:text-white overflow-x-hidden">

    <!-- Dynamic Background & Code Particles Container -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-blue-700/20 rounded-full mix-blend-screen filter blur-[100px] animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-purple-700/20 rounded-full mix-blend-screen filter blur-[100px] animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/3 w-[500px] h-[500px] bg-pink-700/20 rounded-full mix-blend-screen filter blur-[100px] animate-blob animation-delay-4000"></div>
        
        <!-- Code Particles Will Spawn Here -->
        <div id="code-container" class="absolute inset-0 w-full h-full z-0 opacity-40"></div>
    </div>

    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-[#050511]/80 backdrop-blur-lg border-b border-white/5 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 h-24 flex items-center justify-between">
            <div class="flex items-center gap-3 group cursor-pointer" onclick="window.scrollTo(0,0)">
                <!-- Animated Logo -->
                <div class="relative w-10 h-10">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-pink-600 rounded-xl blur opacity-75 group-hover:opacity-100 transition duration-300"></div>
                    <div class="relative w-full h-full bg-[#0a0a1a] rounded-xl flex items-center justify-center border border-white/10 group-hover:border-white/20 transition-all">
                        <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-br from-white to-slate-400">A</span>
                    </div>
                </div>
                <span class="text-2xl font-bold tracking-tight text-white group-hover:text-glow transition-all brand-font">appsbee</span>
            </div>
            
            <div class="hidden md:flex items-center space-x-10 text-sm font-medium tracking-wide">
                <a href="#services" class="text-slate-400 hover:text-white transition-colors relative group">
                    Layanan
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-500 transition-all group-hover:w-full"></span>
                </a>
                <a href="#" class="text-slate-400 hover:text-white transition-colors relative group">
                    Portofolio
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-500 transition-all group-hover:w-full"></span>
                </a>
                <a href="#" class="text-slate-400 hover:text-white transition-colors relative group">
                    Tentang
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-pink-500 transition-all group-hover:w-full"></span>
                </a>
            </div>
            
            <a href="#" class="hidden md:inline-flex relative group px-8 py-3 rounded-full overflow-hidden bg-white/5 border border-white/10 hover:border-white/30 transition-all">
                <div class="absolute inset-0 w-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 transition-all duration-[250ms] ease-out group-hover:w-full opacity-0 group-hover:opacity-100"></div>
                <span class="relative text-sm font-bold text-white group-hover:tracking-wide transition-all duration-300">Hubungi Kami</span>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="md:hidden text-white">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-48 pb-32 px-6 lg:px-8 min-h-screen flex items-center justify-center overflow-hidden">
        <div class="max-w-6xl mx-auto text-center relative z-10 w-full">
            
            <!-- Real-time Clock -->
            <div data-aos="fade-down" data-aos-duration="1000" class="mb-6 font-mono text-blue-400 text-lg md:text-xl font-bold tracking-wider" id="realtime-clock">
                <!-- Clock will be inserted here -->
            </div>

            <!-- IP Address -->
            <div data-aos="fade-down" data-aos-duration="1000" class="mb-10 font-mono text-slate-500 text-sm tracking-widest">
                IP: <span id="user-ip">Mendeteksi...</span>
            </div>

            <!-- Badge -->
            <div data-aos="fade-down" data-aos-duration="1000" class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-card mb-10 hover:shadow-[0_0_20px_rgba(59,130,246,0.5)] transition-shadow cursor-default">
                <span class="relative flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
                </span>
                <span class="text-sm font-medium text-blue-300 tracking-wide">MITRA DIGITAL TERDEPAN</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tighter text-white mb-8 leading-[1.1]">
                <div class="overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                    <span class="inline-block">Selamat Datang di</span>
                </div>
                <div class="overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                    <span class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-400 to-pink-500 animate-gradient-x pb-4">appsbee</span>
                </div>
            </h1>

            <p data-aos="fade-up" data-aos-delay="600" class="text-xl md:text-2xl text-slate-400 mb-14 max-w-2xl mx-auto font-light leading-relaxed">
                Belajar bersama menuju <span class="text-white font-medium">era digital</span>.
            </p>

        </div>
    </section>

    <!-- Features / Services Grid -->
    <section id="services" class="py-32 relative z-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20" data-aos="fade-up">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">Era Kami</h2>
                    <p class="text-slate-400 text-lg max-w-md">Solusi komprehensif yang dirancang untuk berkembang bersama.</p>
                </div>
                <div class="hidden md:block w-32 h-[1px] bg-slate-700"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div data-aos="fade-up" data-aos-delay="100" class="group relative p-1 rounded-2xl bg-gradient-to-b from-white/10 to-transparent hover:from-blue-500/50 hover:to-pink-500/50 transition-all duration-500">
                    <div class="bg-[#0a0a1a] rounded-xl p-10 h-full relative overflow-hidden group-hover:bg-[#0c0c20] transition-colors">
                        <div class="absolute top-0 right-0 p-10 opacity-20 group-hover:opacity-100 transition-opacity duration-500 transform translate-x-10 -translate-y-10 group-hover:translate-x-0 group-hover:translate-y-0">
                            <div class="w-32 h-32 bg-blue-500 rounded-full blur-[60px]"></div>
                        </div>
                        
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500/20 to-blue-600/5 border border-blue-500/20 flex items-center justify-center text-blue-400 mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                           <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold mb-4 group-hover:text-blue-400 transition-colors">Pengembangan Web</h3>
                        <p class="text-slate-400 leading-relaxed group-hover:text-slate-300 transition-colors">
                            Website super cepat menggunakan teknologi modern seperti React, Next.js, dan CodeIgniter. Dioptimalkan untuk performa dan SEO.
                        </p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div data-aos="fade-up" data-aos-delay="200" class="group relative p-1 rounded-2xl bg-gradient-to-b from-white/10 to-transparent hover:from-purple-500/50 hover:to-blue-500/50 transition-all duration-500">
                    <div class="bg-[#0a0a1a] rounded-xl p-10 h-full relative overflow-hidden group-hover:bg-[#0c0c20] transition-colors">
                        <div class="absolute top-0 right-0 p-10 opacity-20 group-hover:opacity-100 transition-opacity duration-500 transform translate-x-10 -translate-y-10 group-hover:translate-x-0 group-hover:translate-y-0">
                            <div class="w-32 h-32 bg-purple-500 rounded-full blur-[60px]"></div>
                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500/20 to-purple-600/5 border border-purple-500/20 flex items-center justify-center text-purple-400 mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                           <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold mb-4 group-hover:text-purple-400 transition-colors">Solusi Mobile</h3>
                        <p class="text-slate-400 leading-relaxed group-hover:text-slate-300 transition-colors">
                             Pengalaman mobile yang memukau (iOS & Android) yang menghubungkan pengguna dengan brand Anda di mana saja, kapan saja.
                        </p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div data-aos="fade-up" data-aos-delay="300" class="group relative p-1 rounded-2xl bg-gradient-to-b from-white/10 to-transparent hover:from-pink-500/50 hover:to-purple-500/50 transition-all duration-500">
                    <div class="bg-[#0a0a1a] rounded-xl p-10 h-full relative overflow-hidden group-hover:bg-[#0c0c20] transition-colors">
                        <div class="absolute top-0 right-0 p-10 opacity-20 group-hover:opacity-100 transition-opacity duration-500 transform translate-x-10 -translate-y-10 group-hover:translate-x-0 group-hover:translate-y-0">
                            <div class="w-32 h-32 bg-pink-500 rounded-full blur-[60px]"></div>
                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-pink-500/20 to-pink-600/5 border border-pink-500/20 flex items-center justify-center text-pink-400 mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                           <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold mb-4 group-hover:text-pink-400 transition-colors">Desain UI/UX</h3>
                        <p class="text-slate-400 leading-relaxed group-hover:text-slate-300 transition-colors">
                             Antarmuka visual yang menakjubkan dan intuitif. Kami merancang sistem, bukan sekadar halaman.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-blue-600/5"></div>
        <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
            <h2 data-aos="fade-up" class="text-4xl md:text-6xl font-bold mb-8">Siap <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-pink-500">Meningkatkan</span> Pemikiran Anda?</h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-xl text-slate-400 mb-12 max-w-2xl mx-auto">
                Mari ciptakan sesuatu yang luar biasa bersama.
            </p>
            
            <button id="cta-btn" data-aos="zoom-in" data-aos-delay="400" class="relative inline-flex items-center gap-4 group">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-pink-600 rounded-full blur-[20px] opacity-70 group-hover:opacity-100 transition-opacity duration-300"></div>
                <a href="#" class="relative bg-white text-slate-900 px-10 py-5 rounded-full font-bold text-xl flex items-center gap-3 hover:scale-105 transition-transform">
                    <span>Chat via WhatsApp</span>
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </div>
                </a>
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#02020a] py-16 border-t border-white/5 text-sm text-slate-500">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8 justify-between items-center">
            <div>
                 <div class="flex items-center gap-2 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center font-bold text-slate-900">A</div>
                    <span class="text-xl font-bold tracking-tight text-white">appsbee</span>
                </div>
                <p class="max-w-sm mb-6">
                    Memberdayakan bisnis dengan solusi digital terkini.
                    <br>&copy; <?= date('Y') ?> appsbee. Hak cipta dilindungi undang-undang.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-8 md:justify-items-end">
                <div class="flex flex-col gap-4">
                    <h4 class="text-white font-bold">Perusahaan</h4>
                    <a href="#" class="dummy-link hover:text-white transition-colors">Tentang Kami</a>
                    <a href="#" class="dummy-link hover:text-white transition-colors">Portofolio</a>
                    <a href="#" class="dummy-link hover:text-white transition-colors">Karir</a>
                </div>
                 <div class="flex flex-col gap-4">
                    <h4 class="text-white font-bold">Legal</h4>
                    <a href="#" class="dummy-link hover:text-white transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="dummy-link hover:text-white transition-colors">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS animation library
        AOS.init({
            once: true,
            offset: 100,
            duration: 800,
            easing: 'ease-out-cubic',
        });

        // Generate Random Code Particles
        document.addEventListener('DOMContentLoaded', function() {
            const codeContainer = document.getElementById('code-container');
            const codeSnippets = [
                '<' + '?php', '</div>', 'const', 'import', 'function()', 
                '=>', '&&', '||', 'return', 'class', 
                '#include', 'echo', 'print', '[]', '{}', 
                'git push', 'npm i', '0', '1', '// TODO'
            ];
            const colors = ['text-blue-500', 'text-pink-500', 'text-purple-500', 'text-green-500', 'text-slate-600'];

            function createParticle() {
                const el = document.createElement('div');
                el.classList.add('code-particle');
                el.innerText = codeSnippets[Math.floor(Math.random() * codeSnippets.length)];
                
                // Random Style
                el.classList.add(colors[Math.floor(Math.random() * colors.length)]);
                
                // Random Position
                el.style.left = Math.random() * 100 + '%';
                el.style.top = Math.random() * 100 + '%';
                
                // Random Size
                el.style.fontSize = Math.floor(Math.random() * 20 + 10) + 'px';
                
                // Random Animation Duration
                const duration = Math.random() * 5 + 5 + 's'; // 5-10s
                el.style.animationDuration = duration;

                codeContainer.appendChild(el);

                // Remove after animation
                setTimeout(() => {
                    el.remove();
                }, parseFloat(duration) * 1000);
            }

            // Spawn loop
            setInterval(createParticle, 400); // Create new particle every 400ms

            
            // SweetAlert Logic
            const links = document.querySelectorAll('.dummy-link, a[href="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.getAttribute('href') === '#' || this.classList.contains('dummy-link')) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'Segera Hadir!',
                            text: 'Fitur ini sedang dalam tahap pengembangan.',
                            icon: 'info',
                            confirmButtonText: 'Mengerti',
                            background: '#0f172a',
                            color: '#fff',
                            confirmButtonColor: '#3b82f6',
                            backdrop: `rgba(0,0,123,0.4)`
                        });
                    }
                });
            });

            const contactButtons = document.querySelectorAll('a[href="#contact"]');
            contactButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                     Swal.fire({
                        title: '<span class="text-2xl font-bold">Mulai Proyek Anda</span>',
                        html: '<p class="text-slate-300">Ngobrol dengan kami di WhatsApp untuk mendiskusikan ide Anda!</p>',
                        icon: 'question',
                        iconColor: '#22c55e',
                        confirmButtonText: 'Buka WhatsApp',
                        showCancelButton: true,
                        cancelButtonText: 'Nanti Dulu',
                        background: '#0f172a',
                        color: '#fff',
                        confirmButtonColor: '#22c55e',
                        cancelButtonColor: '#334155',
                        customClass: {
                            popup: 'border border-slate-700 rounded-3xl glow-popup'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                           window.open('https://wa.me/6285183214612', '_blank');
                        }
                    });
                });
            });

            // Real-time Clock Logic
            function updateClock() {
                const now = new Date();
                const options = { 
                    weekday: 'long', 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric', 
                    hour: '2-digit', 
                    minute: '2-digit', 
                    second: '2-digit',
                    hour12: false
                };
                const formattedTime = now.toLocaleString('id-ID', options);
                document.getElementById('realtime-clock').innerText = formattedTime;
            }
            setInterval(updateClock, 1000);
            updateClock(); // Initial call

            // Fetch Public IP
            fetch('https://api.ipify.org?format=json')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('user-ip').innerText = data.ip;
                })
                .catch(error => {
                    document.getElementById('user-ip').innerText = 'Gagal memuat IP';
                });
        });
    </script>
</body>
</html>

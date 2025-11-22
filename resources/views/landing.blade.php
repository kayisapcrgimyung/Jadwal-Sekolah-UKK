<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengelolaan Jadwal Pelajaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        
        @keyframes floating {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(2deg); }
            75% { transform: translateY(-10px) rotate(-2deg); }
        }
        
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(70px);
            opacity: 0.5;
            animation: blob 7s infinite;
        }
        
        @keyframes blob {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        
        .card-minimal {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-minimal:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.15);
        }
        
        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="bg-gray-50 overflow-x-hidden">
    <!-- Background Blobs -->
    <div class="blob w-96 h-96 bg-green-400 top-0 left-0"></div>
    <div class="blob w-96 h-96 bg-emerald-400 bottom-0 right-0"></div>
    
    <!-- Minimal Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-effect">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800">SchoolTime</span>
                </div>
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-600">
                    <a href="#fitur" class="hover:text-gray-900 transition">Fitur</a>
                    <a href="#tentang" class="hover:text-gray-900 transition">Tentang</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-8">
                    <div class="inline-flex items-center space-x-2 bg-green-50 px-4 py-2 rounded-full">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-sm font-medium text-green-600">Solusi Manajemen Jadwal Modern</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Kelola Jadwal
                        <span class="gradient-text block">Lebih Efisien</span>
                    </h1>
                    
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Platform all-in-one untuk manajemen jadwal pelajaran yang memudahkan admin dan user dalam mengakses informasi secara real-time.
                    </p>
                    
                    <div class="flex flex-wrap gap-4 pt-4">
                        <div class="flex items-center space-x-2 text-gray-700">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm font-medium">Interface Intuitif</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-700">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm font-medium">Akses Real-time</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-700">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm font-medium">Aman & Terpercaya</span>
                        </div>
                    </div>
                </div>

                <!-- Right Illustration -->
                <div class="relative hidden lg:block">
                    <div class="floating">
                        <div class="relative w-full h-96">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-emerald-500 rounded-3xl opacity-20"></div>
                            <div class="absolute top-8 left-8 right-8 bottom-8 bg-white rounded-2xl shadow-2xl p-8">
                                <div class="space-y-4">
                                    <div class="h-4 bg-gradient-to-r from-green-200 to-green-300 rounded w-3/4"></div>
                                    <div class="h-4 bg-gradient-to-r from-emerald-200 to-emerald-300 rounded w-1/2"></div>
                                    <div class="grid grid-cols-2 gap-4 pt-4">
                                        <div class="h-24 bg-gradient-to-br from-green-50 to-green-100 rounded-xl"></div>
                                        <div class="h-24 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl"></div>
                                    </div>
                                    <div class="space-y-2 pt-2">
                                        <div class="h-3 bg-gray-100 rounded"></div>
                                        <div class="h-3 bg-gray-100 rounded w-5/6"></div>
                                        <div class="h-3 bg-gray-100 rounded w-4/6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Cards Section -->
    <section class="relative py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Masuk ke Portal</h2>
                <p class="text-gray-600">Pilih role Anda untuk melanjutkan</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 max-w-3xl mx-auto">
                <!-- Admin Card -->
                <a href="/login" class="card-minimal group block bg-white rounded-2xl p-8 border-2 border-gray-100 hover:border-green-400 transition-all">
                    <div class="flex flex-col items-center text-center space-y-4">
                        <div class="w-14 h-14 bg-green-50 group-hover:bg-green-100 rounded-xl flex items-center justify-center transition-colors">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Administrator</h3>
                            <p class="text-sm text-gray-500">Kelola sistem secara menyeluruh</p>
                        </div>
                        <div class="pt-2 flex items-center text-green-600 text-sm font-medium group-hover:translate-x-1 transition-transform">
                            Masuk
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- User Card -->
                <a href="/login-user" class="card-minimal group block bg-white rounded-2xl p-8 border-2 border-gray-100 hover:border-emerald-400 transition-all">
                    <div class="flex flex-col items-center text-center space-y-4">
                        <div class="w-14 h-14 bg-emerald-50 group-hover:bg-emerald-100 rounded-xl flex items-center justify-center transition-colors">
                            <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">User</h3>
                            <p class="text-sm text-gray-500">Akses untuk guru dan siswa</p>
                        </div>
                        <div class="pt-2 flex items-center text-emerald-600 text-sm font-medium group-hover:translate-x-1 transition-transform">
                            Masuk
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Kenapa Memilih Kami?</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Solusi terbaik untuk manajemen jadwal pelajaran dengan teknologi modern</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Cepat & Responsif</h3>
                    <p class="text-gray-600">Interface yang ringan dan responsif membuat akses informasi menjadi lebih cepat</p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Keamanan Terjamin</h3>
                    <p class="text-gray-600">Data terlindungi dengan sistem enkripsi dan autentikasi yang kuat</p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Update Real-time</h3>
                    <p class="text-gray-600">Perubahan jadwal langsung tersinkronisasi ke semua pengguna secara otomatis</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-gray-800">SchoolTime</span>
                </div>
                <p class="text-gray-600 text-sm">&copy; 2024 SchoolTime. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
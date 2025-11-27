<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/Klipaa Original.png') }}">
    <title>Halaman Tidak Ditemukan • SchoolTime</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
            100% { transform: translateY(0px); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-green-50 to-green-100 min-h-screen flex items-center justify-center p-4">

    <div class="text-center max-w-xl">

        <!-- Animasi lingkaran hijau -->
        <div class="w-40 h-40 mx-auto mb-6 rounded-full bg-green-200/50 backdrop-blur-sm flex items-center justify-center shadow-lg float-animation">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.98 8.223c.63-2.37 2.88-4.216 5.42-4.216h4.64c2.53 0 4.79 1.846 5.42 4.216a3.246 3.246 0 013.04 3.243v2.066a3.246 3.246 0 01-3.04 3.243c-.63 2.37-2.88 4.216-5.42 4.216H9.4c-2.53 0-4.79-1.846-5.42-4.216A3.246 3.246 0 011 13.532v-2.066a3.246 3.246 0 012.98-3.243z"/>
            </svg>
        </div>

        <h1 class="text-7xl font-extrabold text-green-700 drop-shadow-sm">
            404
        </h1>

        <p class="mt-4 text-2xl text-gray-800 font-semibold">
            Halaman Tidak Ditemukan
        </p>

        <p class="mt-2 text-gray-600 leading-relaxed">
            Kamu tersesat di hutan, halaman yang kamu cari sudah tidak ada  
            atau mungkin berpindah tempat.
        </p>

        <a
            href="{{ url('/') }}"
            class="mt-8 inline-block bg-green-600 hover:bg-green-700 text-white font-medium px-8 py-3 rounded-xl shadow-lg transition-all duration-300 hover:scale-[1.03]"
        >
            Kembali ke Beranda
        </a>

        <p class="mt-6 text-sm text-gray-500">
            Dolphin Assignments • Stay on the Right Path
        </p>
    </div>

</body>
</html>

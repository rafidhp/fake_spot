<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Login Page
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center">
        <video id="bgVideo" autoplay loop playsinline class="fixed inset-0 w-full h-full object-cover -z-10">
            <source src="{{ asset('assets/video/BG_Login.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <script>
            document.addEventListener('click', () => {
                const video = document.getElementById('bgVideo');
                video.muted = false;
                video.play().catch((e) => {
                    console.warn('Video gagal diputar otomatis:', e);
                });
            }, {
                once: true
            });
        </script>

        <form action="{{ route('auth.authorization') }}" method="POST"
            class="bg-black/30 backdrop-blur-md rounded-2xl p-8 w-80 sm:w-96 flex flex-col items-center shadow-lg">
            @csrf
            <h1 class="text-white text-2xl font-extrabold text-center mb-1 leading-tight">
                Selamat Datang
                <br />
                Kembali
            </h1>
            <p class="text-white text-xs text-center mb-6">
                Silakan masukkan detail akun Anda
            </p>
            <label class="self-start text-sm mb-1 font-normal text-white" for="username">
                Username
            </label>
            <div class="flex items-center mb-4 w-full bg-white/10 border border-white/20 rounded-lg px-3 py-2">
                <i class="fas fa-user text-white"></i>
                <input id="username" type="text"
                    class="ml-3 w-full outline-none text-white placeholder-white bg-transparent"
                    placeholder="Username" />
            </div>
            <label class="self-start text-sm mb-1 font-normal text-white" for="password">
                Password
            </label>
            <div class="flex items-center mb-6 w-full bg-white/10 border border-white/20 rounded-lg px-3 py-2">
                <i class="fas fa-lock text-white text-lg mr-3"></i>
                <input class="w-full outline-none text-white bg-transparent placeholder:text-white" id="password"
                    placeholder="Password" type="password" />
                <i class="fas fa-eye-slash text-white text-lg cursor-pointer" id="togglePassword"
                    title="Show password"></i>
            </div>
            <button
                class="bg-black text-white rounded-full w-full py-3 text-center text-base font-semibold mb-6 transition duration-300 ease-in-out transform hover:bg-gray-800 hover:scale-105"
                type="submit">
                Login
            </button>

            </button>
            <p class="text-white text-xs text-center text-black">
                Belum punya akun?
                <a class="text-blue-600 hover:underline" href="{{ route('auth.register') }}">
                    Daftar
                </a>
            </p>
        </form>
    </div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle the eye / eye-slash icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>

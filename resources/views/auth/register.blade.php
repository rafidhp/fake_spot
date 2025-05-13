<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Register Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center">
        <img alt="Background" class="fixed inset-0 w-full h-full object-cover -z-10"
            src="{{ asset('assets/img/Arisu.png') }}" />
        <form action="{{ route('auth.store') }}" method="post">
            @csrf
            <div class="bg-black/30 backdrop-blur-md rounded-xl w-80 p-6 drop-shadow-lg">
                <h1 class="text-3xl font-bold text-center mb-2 text-white">Selamat Datang</h1>
                <p class="text-center text-sm mb-8 text-white">
                    Silakan daftarkan akun Anda
                </p>

                <label class="block text-sm mb-1 text-white" for="fullname">Nama Lengkap</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-5 bg-white/20">
                    <i class="fas fa-user text-white text-lg mr-3"></i>
                    <input class="w-full outline-none text-white bg-transparent placeholder:text-gray-300"
                        id="fullname" placeholder="Zaky Rizzan Zain" type="text" />
                </div>

                <label class="block text-sm mb-1 text-white" for="email">Email</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-5 bg-white/20">
                    <i class="fas fa-envelope text-white text-lg mr-3"></i>
                    <input class="w-full outline-none text-white bg-transparent placeholder:text-gray-300"
                        id="email" placeholder="email@gmail.com" type="email" />
                </div>

                <label class="block text-sm mb-1 text-white" for="username">Username</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-5 bg-white/20">
                    <i class="fas fa-user text-white text-lg mr-3"></i>
                    <input class="w-full outline-none text-white bg-transparent placeholder:text-gray-300"
                        id="username" placeholder="Username" type="text" />
                </div>

                <label class="block text-sm mb-1 text-white" for="password">Password</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-8 bg-white/20">
                    <i class="fas fa-lock text-white text-lg mr-3"></i>
                    <input class="w-full outline-none text-white bg-transparent placeholder:text-gray-300"
                        id="password" placeholder="Password" type="password" />
                    <i class="fas fa-eye-slash text-white text-lg cursor-pointer" id="togglePassword"
                        title="Show password"></i>
                </div>

                <button
                    class="bg-black text-white rounded-full w-full py-3 text-center text-base font-semibold mb-6 transition duration-300 ease-in-out transform hover:bg-gray-800 hover:scale-105"
                    type="submit">
                    Register
                </button>
                <p class="text-center text-sm text-white">
                    Sudah punya akun?
                    <a class="text-blue-300 hover:underline" href="{{ route('auth.login') }}">Masuk</a>
                </p>
            </div>
        </form>

        <script>
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                togglePassword.classList.toggle('fa-eye');
                togglePassword.classList.toggle('fa-eye-slash');
            });
        </script>
    </div>
</body>

</html>

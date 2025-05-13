<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Fake Spot</title>
    <link rel="shortcut icon" href="{{ asset('assets/icon/upi.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=inter:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "inter", sans-serif;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center">
        <img alt="Background" class="fixed inset-0 w-full h-full object-cover -z-10"
            src="{{ asset('assets/img/Arisu.png') }}" />
        <form action="{{ route('auth.store') }}" method="post">
            @csrf
            <div class="my-12 bg-black/50 backdrop-blur-md rounded-xl w-full p-8 sm:w-96 drop-shadow-lg ">
                <h1 class="text-3xl font-bold text-center mb-2 text-white">Selamat Datang</h1>
                <p class="text-center text-sm mb-8 text-white">
                    Silakan daftarkan akun Anda
                </p>

                <label class="block text-sm mb-1 text-white" for="nama">Nama Lengkap</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-5">
                    <i class="fas fa-user text-white text-lg mr-3"></i>
                    <input name="nama"
                        class="w-full outline-none text-white bg-transparent placeholder:text-white"
                        placeholder="Ainz Ool Gown" type="text" />
                </div>

                <label class="block text-sm mb-1 text-white" for="email">Email</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-5">
                    <i class="fas fa-envelope text-white text-lg mr-3"></i>
                    <input name="email"
                        class="w-full outline-none text-white bg-transparent placeholder:text-white"
                        placeholder="email@gmail.com" type="email" />
                </div>

                <label class="block text-sm mb-1 text-white" for="username">Username</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-5">
                    <i class="fas fa-user text-white text-lg mr-3"></i>
                    <input name="username"
                        class="w-full outline-none text-white bg-transparent placeholder:text-white"
                        placeholder="Username" type="text" />
                </div>

                <label class="block text-sm mb-1 text-white" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-5">
                    <i class="fas fa-venus-mars text-white text-lg mr-3"></i>
                    <select name="jenis_kelamin"
                        class="w-full outline-none text-white bg-transparent placeholder:text-white">
                        <option disabled selected>Pilih Jenis Kelamin</option>
                        <option class="text-black" value="L">Laki-laki</option>
                        <option class="text-black" value="P">Perempuan</option>
                    </select>
                </div>

                <label class="block text-sm mb-1 text-white" for="password">Password</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-8">
                    <i class="fas fa-lock text-white text-lg mr-3"></i>
                    <input name="password" class="w-full outline-none text-white bg-transparent placeholder:text-white"
                        id="password" placeholder="Password" type="password" />
                    <i class="fas fa-eye-slash text-white text-lg cursor-pointer" id="togglePassword"
                        title="Show password"></i>
                </div>

                <label class="block text-sm mb-1 text-white" for="password_confirmation">Konfirmasi Password</label>
                <div class="flex items-center border border-white rounded-lg px-4 py-2 mb-8">
                    <i class="fas fa-lock text-white text-lg mr-3"></i>
                    <input name="password_confirmation"
                        class="w-full outline-none text-white bg-transparent placeholder:text-white"
                        id="password_confirmation" placeholder="Ulangi Password" type="password" />
                    <i class="fas fa-eye-slash text-white text-lg cursor-pointer" id="togglePasswordConfirmation"
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
            // Toggle password utama
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            // Toggle konfirmasi password
            const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
            const passwordConfirmation = document.getElementById('password_confirmation');

            togglePasswordConfirmation.addEventListener('click', function() {
                const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmation.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        </script>

    </div>
</body>

</html>

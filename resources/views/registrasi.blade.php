<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Memuat Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        // Fungsi togglePassword untuk menampilkan atau menyembunyikan kata sandi
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('togglePasswordIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        function togglePasswordConfirmation() {
            var passwordConfirmationInput = document.getElementById('password_confirmation');
            var eyeIconConfirmation = document.getElementById('togglePasswordConfirmationIcon');
            
            if (passwordConfirmationInput.type === 'password') {
                passwordConfirmationInput.type = 'text';
                eyeIconConfirmation.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordConfirmationInput.type = 'password';
                eyeIconConfirmation.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</head>
<body class="flex items-center justify-center min-h-screen text-white" 
      style="background: linear-gradient(to bottom, #040e32 0%, #267a9e 100%);">
    <div class="w-full max-w-md px-8 py-10 space-y-6 rounded-lg shadow-lg" 
         style="background: linear-gradient(to bottom, #040E32, #267A9E);">
        <!-- Logo Section -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-32 lg:w-48">
        </div>

        <!-- Heading -->
        <h2 class="text-3xl font-bold text-center">DAFTAR</h2>

        <!-- Form Section -->
        <form class="space-y-4" action="#" method="POST">
            @csrf
            <!-- Username Field -->
            <div>
                <label for="username" class="sr-only">Nama Pengguna</label>
                <input id="username" type="text" name="username" placeholder="Nama Pengguna" required 
                       pattern="[A-Za-z0-9_]{5,20}" 
                       aria-label="Nama Pengguna"
                       class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Status Field -->
            <div>
                <label for="status" class="sr-only">Status Pengguna</label>
                <select id="status" name="status" required 
                        aria-label="Status Pengguna"
                        class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Status Pengguna</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Pegawai">Pegawai</option>
                </select>
            </div>

            <!-- Password Field -->
            <div class="relative">
                <label for="password" class="sr-only">Kata Sandi</label>
                <input id="password" type="password" name="password" placeholder="Kata Sandi" required 
                       aria-label="Kata Sandi"
                       class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i id="togglePasswordIcon" class="fa fa-eye absolute right-4 top-3 cursor-pointer" 
                   onclick="togglePassword()"></i>
            </div>

            <!-- Password Confirmation Field -->
            <div class="relative">
                <label for="password_confirmation" class="sr-only">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required 
                       aria-label="Konfirmasi Kata Sandi"
                       class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i id="togglePasswordConfirmationIcon" class="fa fa-eye absolute right-4 top-3 cursor-pointer" 
                   onclick="togglePasswordConfirmation()"></i>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="w-full py-2 font-bold text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    DAFTAR
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="text-center text-sm text-gray-400">
            Sudah memiliki akun? 
            <a href="{{ route('login') }}" class="font-semibold hover:underline text-blue-400">MASUK</a>
        </div>
    </div>

    <!-- Script for Toggling Password Visibility -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            icon.classList.toggle('fa-eye-slash', isPassword);
        }

        function togglePasswordConfirmation() {
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const icon = document.getElementById('togglePasswordConfirmationIcon');
            const isPassword = confirmPasswordInput.type === 'password';
            confirmPasswordInput.type = isPassword ? 'text' : 'password';
            icon.classList.toggle('fa-eye-slash', isPassword);
        }
    </script>
</body>
</html>
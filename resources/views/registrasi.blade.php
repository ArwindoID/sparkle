<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-white">
    <div class="w-full max-w-md p-8 space-y-6 bg-gray-800 rounded-lg shadow-lg">
        <div class="flex justify-center mb-6">
            <!-- Logo atau ikon di bagian atas form -->
            <img src="logo.png" alt="Logo" class="w-16 h-16">
        </div>

        <h2 class="text-2xl font-bold text-center">DAFTAR</h2>

        <!-- Formulir Daftar -->
        <form class="space-y-4" action="#" method="POST">
            
            <!-- Nama Pengguna -->
            <div>
                <label for="username" class="sr-only">Nama Pengguna</label>
                <input id="username" type="text" name="username" placeholder="Nama Pengguna" required 
                       aria-label="Nama Pengguna"
                       class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <!-- Status Pengguna -->
            <div>
                <label for="status" class="sr-only">Status Pengguna</label>
                <select id="status" name="status" required 
                        aria-label="Status Pengguna"
                        class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Status Pengguna</option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            
            <!-- Kata Sandi -->
            <div>
                <label for="password" class="sr-only">Kata Sandi</label>
                <input id="password" type="password" name="password" placeholder="Kata Sandi" required 
                       aria-label="Kata Sandi"
                       class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <!-- Konfirmasi Kata Sandi -->
            <div>
                <label for="password_confirmation" class="sr-only">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required 
                       aria-label="Konfirmasi Kata Sandi"
                       class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Tombol Daftar -->
            <div>
                <button type="submit" 
                        class="w-full py-2 font-bold text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    DAFTAR
                </button>
            </div>
        </form>

        <!-- Link ke halaman login -->
        <div class="text-center text-sm text-gray-400">
            Sudah memiliki akun? 
            <a href="{{ route('login') }}" class="font-semibold text-blue-400 hover:underline">MASUK</a>
        </div>
    </div>
</body>
</html>

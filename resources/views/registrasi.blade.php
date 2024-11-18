<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-white">
<div class="w-full max-w-md px-20 space-y-6 rounded-lg shadow-lg " 
     style="background: linear-gradient(to bottom, #040E32 , #267A9E);">
        <div class="flex justify-center mb-6 md:mb-8 lg:mb-10">
            <!-- Logo atau ikon di bagian atas form -->
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-16 md:w-32 lg:w-48">
            </div>

        <h2 class="text-3xl font-bold text-center">DAFTAR</h2>s

        <form class="space-y-4" action="#" method="POST">
            <div>
                <label for="username" class="sr-only">Nama Pengguna</label>
                <input id="username" type="text" name="username" placeholder="Nama Pengguna" required 
                       pattern="[A-Za-z0-9_]{5,20}" 
                       aria-label="Nama Pengguna"
                       class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

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

            <div>
                <label for="password" class="sr-only">Kata Sandi</label>
                <input id="password" type="password" name="password" placeholder="Kata Sandi" required 
                       aria-label="Kata Sandi"
                       class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password_confirmation" class="sr-only">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required 
                       aria-label="Konfirmasi Kata Sandi"
                       class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <button type="submit" 
                        class="w-full py-2 font-bold text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    DAFTAR
                </button>
            </div>
        </form>

        <!-- Link ke halaman login -->
        <div class="text-center text-sm text-white-400">
    Sudah memiliki akun? 
    <a href="{{ route('login') }}" class="font-semibold hover:underline" style="color: #0000CD;">MASUK</a>
        </div>
    </div>
</body>
</html>
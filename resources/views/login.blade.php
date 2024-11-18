<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-white">
    <div class="w-full max-w-md p-8 space-y-6 bg-gray-800 rounded-lg shadow-lg">
        <div class="flex justify-center">
            <img src="images/icon.png" alt="Logo" class="w-40 h-40">
        </div>

        <h2 class="text-3xl font-bold text-center">MASUK</h2>

                <form class="space-y-4" action="{{ route('login_proses') }}" method="POST">
                    @csrf
            <div>
                <label for="username" class="sr-only">Nama Pengguna</label>
                <input id="username" type="text" name="username" placeholder="Nama Pengguna" required 
                    aria-label="Nama Pengguna"
                    class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="sr-only">Kata Sandi</label>
                <input id="password" type="password" name="password" placeholder="Kata Sandi" required 
                    aria-label="Kata Sandi"
                    class="w-full px-4 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <button type="submit" 
                        class="w-full py-2 font-bold text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Masuk
                </button>
            </div>
        </form>


        <div class="text-center text-sm text-gray-400">
            Sudah memiliki akun? 
            <a href="{{ route('registrasi') }}" class="font-semibold text-blue-400 hover:underline">DAFTAR</a>
        </div>
    </div>
</body>
</html>
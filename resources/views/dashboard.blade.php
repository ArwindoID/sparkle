@extends('layout.main')

@section('title', 'Smart Parking Dashboard')

@section('content')
    <div class="relative h-screen bg-gray-900">
        <!-- Header -->
        <header
            class="relative z-10 flex items-center justify-between px-4 py-3 shadow-md bg-gradient-to-r from-black to-blue-500 md:px-6 md:py-4">
            <!-- Nama SPARKLE dengan Ikon -->
            <div class="flex items-center">
                <img src="{{ asset('images/icon.png') }}" alt="SPARKLE Icon" class="w-12 h-10 sm:w-16 sm:h-12 md:w-20 md:h-16">
                <h1 class="text-lg font-bold text-white sm:text-xl md:text-2xl">SPARKLE</h1>
            </div>

            <!-- Tombol Logout -->
            <div class="flex justify-end w-full col-span-3">
                <button id="logoutButton"
                    class="px-6 py-2 text-white transition-all duration-300 bg-red-500 rounded-full hover:bg-red-600 hover:px-5"
                    type="button">
                    <div class="relative inline-flex items-center">
                        <p class="p-1 text-md">Logout</p>
                    </div>
                </button>
            </div>
            <div id="popup-modal" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-gray-900 bg-opacity-50">
                <div class="relative w-full h-auto max-w-md px-4 md:px-0">
                    <!-- Modal Content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal Header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Konfirmasi Logout
                            </h3>
                        </div>
                        <!-- Modal Body -->
                        <div class="p-6">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Apakah Anda yakin ingin keluar dari akun ini?
                            </p>
                        </div>
                        <!-- Modal Footer -->
                        <div
                            class="flex flex-col-reverse items-center justify-end p-6 space-y-2 border-t border-gray-200 rounded-b md:flex-row md:space-y-0 md:space-x-2 dark:border-gray-700">
                            <button id="cancelLogout" type="button"
                                class="w-full px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-200 rounded-lg md:w-auto hover:bg-gray-100 hover:text-gray-900 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                                Batal
                            </button>
                            <form method="POST" action="{{ route('logout') }}" class="w-full md:w-auto">
                                @csrf
                                <button type="submit"
                                    class="w-full px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg md:w-auto hover:bg-red-600">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Map Container -->
        <div id="mapContainer" class="relative overflow-hidden w-full h-[calc(100vh-4rem)]">
            <img id="mapImage" src="{{ asset('images/mapview.png') }}" usemap="#ParkingMap"
                class="absolute top-0 left-0 block object-cover w-full h-full md:w-full md:h-full"
                style="min-width: 1200px;">
            <!-- Map Area -->
            <map name="ParkingMap">
                @foreach ($zonaParkir as $zona)
                    <area target="" alt="{{ $zona->nama_zona }}" title="{{ $zona->nama_zona }}"
                        href="{{ route('zona.show', ['id' => $zona->id]) }}" coords="{{ $zona->coords }}"
                        shape="{{ $zona->shape }}">
                @endforeach
            </map>

            @php
                $zonaPositions = [
                    ['top' => '73%', 'left' => '30.5%'],
                    ['top' => '73%', 'left' => '49%'],
                    ['top' => '28%', 'left' => '4.7%'],
                    ['top' => '42%', 'left' => '16.5%'],
                    ['top' => '39%', 'left' => '67%'],
                    ['top' => '29%', 'left' => '90.5%'],
                ];
            @endphp

            @foreach ($zonaPositions as $index => $position)
                <a href="#"
                    class="absolute px-4 py-2 text-xl font-bold text-white bg-blue-600 rounded-md zona-button hover:bg-blue-700"
                    style="top: {{ $position['top'] }}; left: {{ $position['left'] }};
                    @if ($index == 2) transform: rotate(-90deg); @endif"
                    data-zona="{{ $index + 1 }}">
                    Zona {{ $index + 1 }}
                </a>

                <!-- Modal Konfirmasi Zona -->
                <div id="modal-zona-{{ $index + 1 }}" tabindex="-1"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 zona-modal">
                    <div class="relative w-full max-w-md m-auto bg-white rounded-lg shadow-lg">
                        <!-- Modal Header -->
                        <div class="p-4 border-b">
                            <h3 class="text-lg font-semibold text-gray-800">
                                Konfirmasi Masuk Zona {{ $index + 1 }}
                            </h3>
                        </div>
                        <!-- Modal Body -->
                        <div class="p-4">
                            <p class="text-sm text-gray-600">
                                Apakah Anda yakin ingin masuk ke Zona {{ $index + 1 }}?
                            </p>
                        </div>
                        <!-- Modal Footer -->
                        <div class="flex items-center justify-end gap-2 p-4 border-t">
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-lg cancel-zona hover:bg-gray-300">
                                Batal
                            </button>
                            <a href="{{ route('zona.show', ['id' => $index + 1]) }}"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Setuju
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        #mapContainer {
            height: calc(100vh - 4rem);
            position: relative;
            overflow-x: hidden;
        }

        #mapImage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            #mapContainer {
                overflow-x: auto;
            }

            #mapImage {
                width: 1200px;
                height: auto;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Logout Modal Handling
            const logoutButton = document.getElementById('logoutButton');
            const logoutModal = document.getElementById('popup-modal');
            const cancelLogoutButton = document.getElementById('cancelLogout');

            logoutButton.addEventListener('click', () => {
                logoutModal.classList.remove('hidden');
            });

            cancelLogoutButton.addEventListener('click', () => {
                logoutModal.classList.add('hidden');
            });

            // Zone Modal Handling
            const zonaButtons = document.querySelectorAll('.zona-button');
            const zonaModals = document.querySelectorAll('.zona-modal');
            const cancelZonaButtons = document.querySelectorAll('.cancel-zona');

            zonaButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const zonaId = button.getAttribute('data-zona');
                    const modal = document.getElementById(`modal-zona-${zonaId}`);
                    modal.classList.remove('hidden');
                });
            });

            cancelZonaButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('.zona-modal');
                    modal.classList.add('hidden');
                });
            });

            // Close modals when clicking outside
            window.addEventListener('click', (e) => {
                zonaModals.forEach(modal => {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                    }
                });

                if (e.target === logoutModal) {
                    logoutModal.classList.add('hidden');
                }
            });
        });

        const mapImage = document.getElementById('mapImage');
        const areas = document.querySelectorAll('area');

        function updateAreaCoords() {
            const imgWidth = mapImage.naturalWidth;
            const imgCurrentWidth = mapImage.offsetWidth;
            const scale = imgCurrentWidth / imgWidth;

            areas.forEach(area => {
                const originalCoords = area.dataset.originalCoords.split(',').map(Number);
                const scaledCoords = originalCoords.map(coord => Math.round(coord * scale));
                area.coords = scaledCoords.join(',');
            });
        }

        window.addEventListener('load', updateAreaCoords);
        window.addEventListener('resize', updateAreaCoords);
    </script>
@endsection

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
                    ['top' => '67%', 'left' => '30%'],
                    ['top' => '60.5%', 'left' => '59%'],
                    ['top' => '22%', 'left' => '4.4%'],
                    ['top' => '38%', 'left' => '16.5%'],
                    ['top' => '34.9%', 'left' => '67%'],
                    ['top' => '24%', 'left' => '90%'],
                ];
            @endphp

            @foreach ($zonaPositions as $index => $position)
                <div class="absolute flex flex-col items-center justify-center bg-blue-600 border-4 border-white rounded-md cursor-pointer"
                    style="width: 100px; height: 100px; top: {{ $position['top'] }}; left: {{ $position['left'] }};"
                    data-modal-target="modal-zona-{{ $index + 1 }}">
                    <!-- Teks Zona -->
                    <p class="pt-2 -mt-3 text-xl font-bold text-white">ZONA {{ $index + 1 }}</p>
                    <div class="w-full my-2 border-t-2 border-white"></div>
                    <!-- Ikon -->
                    <div class="flex items-center justify-around w-full">
                        @if (in_array($index + 1, [1, 3]))
                            <!-- Ikon Motor untuk Zona 1 dan 3 -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white"
                                viewBox="0 0 256 256">
                                <path
                                    d="M216,120a41,41,0,0,0-6.6.55l-5.82-15.14A55.64,55.64,0,0,1,216,104a8,8,0,0,0,0-16H196.88L183.47,53.13A8,8,0,0,0,176,48H144a8,8,0,0,0,0,16h26.51l9.23,24H152c-18.5,0-33.5,4.31-43.37,12.46a16,16,0,0,1-16.76,2.07C81.29,97.72,31.13,77.33,26.71,75.6L21,73.36A17.74,17.74,0,0,0,16,72a8,8,0,0,0-2.87,15.46h0c.46.18,47.19,18.3,72.13,29.63a32.15,32.15,0,0,0,33.56-4.29c4.86-4,14.57-8.8,33.19-8.8h18.82a71.74,71.74,0,0,0-24.17,36.59A15.86,15.86,0,0,1,131.32,152H79.2a40,40,0,1,0,0,16h52.12a31.91,31.91,0,0,0,30.74-23.1,56,56,0,0,1,26.59-33.72l5.82,15.13A40,40,0,1,0,216,120ZM40,168H62.62a24,24,0,1,1,0-16H40a8,8,0,0,0,0,16Zm176,16a24,24,0,0,1-15.58-42.23l8.11,21.1a8,8,0,1,0,14.94-5.74L215.35,136l.65,0a24,24,0,0,1,0,48Z">
                                </path>
                            </svg>
                        @elseif (in_array($index + 1, [2, 6]))
                            <!-- Ikon Motor dan Mobil untuk Zona 2 dan 6 -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white"
                                viewBox="0 0 256 256">
                                <path
                                    d="M216,120a41,41,0,0,0-6.6.55l-5.82-15.14A55.64,55.64,0,0,1,216,104a8,8,0,0,0,0-16H196.88L183.47,53.13A8,8,0,0,0,176,48H144a8,8,0,0,0,0,16h26.51l9.23,24H152c-18.5,0-33.5,4.31-43.37,12.46a16,16,0,0,1-16.76,2.07C81.29,97.72,31.13,77.33,26.71,75.6L21,73.36A17.74,17.74,0,0,0,16,72a8,8,0,0,0-2.87,15.46h0c.46.18,47.19,18.3,72.13,29.63a32.15,32.15,0,0,0,33.56-4.29c4.86-4,14.57-8.8,33.19-8.8h18.82a71.74,71.74,0,0,0-24.17,36.59A15.86,15.86,0,0,1,131.32,152H79.2a40,40,0,1,0,0,16h52.12a31.91,31.91,0,0,0,30.74-23.1,56,56,0,0,1,26.59-33.72l5.82,15.13A40,40,0,1,0,216,120ZM40,168H62.62a24,24,0,1,1,0-16H40a8,8,0,0,0,0,16Zm176,16a24,24,0,0,1-15.58-42.23l8.11,21.1a8,8,0,1,0,14.94-5.74L215.35,136l.65,0a24,24,0,0,1,0,48Z">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white"
                                viewBox="0 0 256 256">
                                <path
                                    d="M240,104H229.2L201.42,41.5A16,16,0,0,0,186.8,32H69.2a16,16,0,0,0-14.62,9.5L26.8,104H16a8,8,0,0,0,0,16h8v80a16,16,0,0,0,16,16H64a16,16,0,0,0,16-16V184h96v16a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16V120h8a8,8,0,0,0,0-16ZM69.2,48H186.8l24.89,56H44.31ZM64,200H40V184H64Zm128,0V184h24v16Zm24-32H40V120H216ZM56,144a8,8,0,0,1,8-8H80a8,8,0,0,1,0,16H64A8,8,0,0,1,56,144Zm112,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H176A8,8,0,0,1,168,144Z">
                                </path>
                            </svg>
                        @elseif (in_array($index + 1, [4, 5]))
                            <!-- Ikon Mobil untuk Zona 4 dan 5 -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white"
                                viewBox="0 0 256 256">
                                <path
                                    d="M240,104H229.2L201.42,41.5A16,16,0,0,0,186.8,32H69.2a16,16,0,0,0-14.62,9.5L26.8,104H16a8,8,0,0,0,0,16h8v80a16,16,0,0,0,16,16H64a16,16,0,0,0,16-16V184h96v16a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16V120h8a8,8,0,0,0,0-16ZM69.2,48H186.8l24.89,56H44.31ZM64,200H40V184H64Zm128,0V184h24v16Zm24-32H40V120H216ZM56,144a8,8,0,0,1,8-8H80a8,8,0,0,1,0,16H64A8,8,0,0,1,56,144Zm112,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H176A8,8,0,0,1,168,144Z">
                                </path>
                            </svg>
                        @endif
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-zona-{{ $index + 1 }}" tabindex="-1"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto bg-black bg-opacity-50">
                    <div class="relative w-full max-w-md m-auto bg-white rounded-lg shadow-lg">
                        <!-- Header -->
                        <div class="p-4 border-b">
                            <h3 class="text-lg text-black font-semibol">Konfirmasi Masuk Zona {{ $index + 1 }}</h3>
                        </div>
                        <!-- Body -->
                        <div class="p-4 text-gray-500">
                            <p>Apakah Anda ingin masuk ke Zona {{ $index + 1 }}?</p>
                        </div>
                        <!-- Footer -->
                        <div class="flex items-center justify-end gap-2 p-4 border-t">
                            <button class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 cancel-zona">Batal</button>
                            <a href="{{ route('zona.show', $index + 1) }}"
                                class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Setuju</a>
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
    // Logout Modal
    const logoutButton = document.getElementById('logoutButton');
    const logoutModal = document.getElementById('popup-modal');
    const cancelLogoutButton = document.getElementById('cancelLogout');

    logoutButton.addEventListener('click', () => {
        logoutModal.classList.remove('hidden');
    });

    cancelLogoutButton.addEventListener('click', () => {
        logoutModal.classList.add('hidden');
    });

    // Zone Modals
    const zoneElements = document.querySelectorAll('[data-modal-target]');
    const cancelZoneButtons = document.querySelectorAll('.cancel-zona');

    zoneElements.forEach(element => {
        element.addEventListener('click', () => {
            const modalId = element.getAttribute('data-modal-target');
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
        });
    });

    cancelZoneButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('[id^="modal-zona-"]');
            modal.classList.add('hidden');
        });
    });

    // Close modals on outside click
    window.addEventListener('click', (event) => {
        if (event.target.id === 'popup-modal') {
            logoutModal.classList.add('hidden');
        }

        const zoneModals = document.querySelectorAll('[id^="modal-zona-"]');
        zoneModals.forEach(modal => {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });

    // Map coordinates update
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
});
</script>

@endsection

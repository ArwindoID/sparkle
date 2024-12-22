@extends('layout.main')

@section('title', 'Smart Parking Dashboard')

@section('content')
    <div class="relative h-screen bg-gray-900">
        <!-- Header -->
        <header
            class="relative z-10 flex items-center justify-between px-4 py-3 shadow-md bg-gradient-to-r from-black to-blue-500 md:px-6 md:py-4">
            <!-- Nama SPARKLE dengan Ikon -->
            <div class="flex items-center">
                <!-- Ikon SVG -->
                <img src="{{ asset('images/icon.png') }}" alt="SPARKLE Icon" class="w-12 h-10 sm:w-16 sm:h-12 md:w-20 md:h-16">

                <!-- Nama SPARKLE -->
                <h1 class="text-lg font-bold text-white sm:text-xl md:text-2xl">SPARKLE</h1>
            </div>

            <!-- Tombol Logout -->
            <div class="flex justify-end w-full col-span-3">
                <button
                    class="px-6 py-2 text-white transition-all duration-300 bg-red-500 rounded-full hover:bg-red-600 hover:px-5"
                    data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button">
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
                            <button data-modal-hide="popup-modal" type="button"
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

        <div id="mapContainer" class="relative overflow-hidden w-full h-[calc(100vh-4rem)]">
            <img id="mapImage" src="{{ asset('images/mapview.png') }}" usemap="#ParkingMap"
                class="absolute top-0 left-0 block object-cover w-full h-full md:w-full md:h-full"
                style="min-width: 1200px;">
            <!-- Map Area -->
            <map name="ParkingMap">
                <map name="ParkingMap">
                    @foreach ($zonaParkir as $zona)
                    <area
                    target=""
                    alt="{{ $zona->nama_zona }}"
                    title="{{ $zona->nama_zona }}"
                    href="{{ route('zona.show', ['id' => $zona->id]) }}"
                    coords="{{ $zona->coords }}"
                    shape="{{ $zona->shape }}">
                    @endforeach
                </map>
            </map>
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
        const modal = document.getElementById('popup-modal');
        const modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
        const modalHideButtons = document.querySelectorAll('[data-modal-hide]');

        modalToggleButtons.forEach(button => {
            button.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });
        });

        modalHideButtons.forEach(button => {
            button.addEventListener('click', () => {
                modal.classList.add('hidden');
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

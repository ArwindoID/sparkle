@extends('layout.main')

@section('title', 'Smart Parking Dashboard')

@section('content')
    <div class="relative h-screen bg-gray-900">
        <!-- Header -->
        <header class="relative z-10 flex items-center justify-between px-4 py-3 shadow-md bg-gradient-to-r from-black to-blue-500 md:px-6 md:py-4">
            <!-- Nama SPARKLE dengan Ikon -->
            <div class="flex items-center">
                <!-- Ikon SVG -->
                <img src="{{ asset('images/icon.png') }}" alt="SPARKLE Icon"
                    class="w-12 h-10 sm:w-16 sm:h-12 md:w-20 md:h-16">

                <!-- Nama SPARKLE -->
                <h1 class="text-lg font-bold text-white sm:text-xl md:text-2xl">SPARKLE</h1>
            </div>

            <!-- Tombol Logout -->
            <div class="flex justify-end w-full col-span-3">
                <button class="text-white transition-all duration-300 bg-red-500 rounded-full hover:bg-red-600 hover:px-5"
                    data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button">
                    <div class="relative inline-flex items-center">
                        <p class="p-1 text-md">Logout</p>
                    </div>
                </button>
            </div>

        </header>



        <div id="mapContainer" class="relative overflow-hidden w-full h-[calc(100vh-4rem)]">
            <img id="mapImage" src="{{ asset('images/mapview.png') }}" usemap="#ParkingMap"
                class="absolute top-0 left-0 block object-cover w-full h-full md:w-full md:h-full" style="min-width: 1200px;">
            <!-- Map Area -->
            <map name="ParkingMap">
                <area shape="poly" data-original-coords="213,416,340,411,447,416,528,477,528,583,498,603,462,629,325,532,310,477,295,446,264,472,208,466" href="{{ route('zona.zona1')}}" alt="Zona 1">
                <area shape="poly" data-original-coords="604,472,689,402,1050,400,1052,458,964,532,942,534,877,463,853,483,830,456,810,470,799,456,779,474,765,461,736,490,747,501,723,523,736,539,694,570,716,593,700,604,714,615,687,640,674,622,658,635,606,590" href="{{ route('zona.zona2')}}" alt="Zona 2">
                <area shape="rect" data-original-coords="138,382,60,76" href="{{ route('zona.zona3')}}" alt="Zona 3">
                <area shape="poly" data-original-coords="168,200,293,196,351,326,313,351,206,344,175,326" href="{{ route('zona.zona4')}}" alt="Zona 4">
                <area shape="poly" data-original-coords="750,335,792,295,781,284,817,246,846,253,1014,250,1016,329,976,364,785,371" href="{{ route('zona.zona5')}}" alt="Zona 5">
                <area shape="poly" data-original-coords="1128,170,1273,170,1273,255,1211,340,1132,338" href="{{ route('zona.zona6')}}" alt="Zona 6">
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

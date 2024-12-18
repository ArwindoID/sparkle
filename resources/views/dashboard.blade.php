@extends('layout.main')

@section('title', 'Smart Parking Dashboard')

@section('content')
    <div class="relative h-screen bg-gray-900">
        <!-- Header -->
        <header class="relative z-10 py-4 text-center bg-gray-300 shadow-md">
            <h1 class="text-xl font-bold text-black">SPARKLE</h1>
        </header>

        <div id="mapContainer" class="relative overflow-hidden w-full h-[calc(100vh-4rem)]">
            <img id="mapImage" src="{{ asset('images/mapview.jpg') }}" usemap="#ParkingMap"
                class="absolute top-0 left-0 block object-cover w-full h-full md:w-full md:h-full" style="min-width: 1200px;">
            <!-- Map Area -->
            <map name="ParkingMap">
                <area shape="rect" data-original-coords="205,644,542,401" href="/1" alt="Zona 1">
                <area shape="rect" data-original-coords="1057,394,601,647" href="/2" alt="Zona 2">
                <area shape="rect" data-original-coords="138,382,60,76" href="/3" alt="Zona 3">
                <area shape="rect" data-original-coords="169,278,373,381" href="/4" alt="Zona 4">
                <area shape="rect" data-original-coords="1023,243,742,377" href="/5" alt="Zona 5">
                <area shape="rect" data-original-coords="1279,163,1122,349" href="/6" alt="Zona 6">
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

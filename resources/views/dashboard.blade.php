<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking Dashboard</title>
    @vite('resources/css/app.css')
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/images/mapview.jpg');
            /* background-size: cover; */
            background-repeat: no-repeat;
            z-index: -1;
        }

        header {
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 10px;
        }

        .map-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        map {
            display: block;
            width: 100%;
            height: 100%;
        }

        area {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="background-image"></div>

    <header>
        <button id="logoutButton" style="position: absolute; top: 10px; left: 10px;">Logout</button>
        <h1 style="text-align: center;">SPARKLE</h1> 
        <button id="backButton" style="position: absolute; top: 10px; right: 10px;">Back</button> 
    </header>

    <div class="map-container">
        <img id="mapImage" src="/images/mapview.jpg" usemap="#ParkingMap" style="opacity: 0; width: 100%; height: 100%;">
        <map name="ParkingMap">
            <area target="_self" alt="1" title="1" href="/1" coords="205,644,542,401" shape="rect">
            <area target="_self" alt="2" title="2" href="/2" coords="1057,394,601,647" shape="rect">
            <area target="_self" alt="3" title="3" href="/3" coords="138,382,60,76" shape="rect">
            <area target="_self" alt="4" title="4" href="/4" coords="169,278,373,381" shape="rect">
            <area target="_self" alt="5" title="5" href="/5" coords="1023,243,742,377" shape="rect">
            <area target="_self" alt="6" title="6" href="/6" coords="1279,163,1122,349" shape="rect">
            <!-- <area target="_blank" alt="ZONA 3" title="ZONA 3" onclick="location.href='/zone/3'" data-coords="[Koordinat ZONA 3]" shape="rect">
            <area target="_blank" alt="ZONA 4" title="ZONA 4" onclick="location.href='/zone/4'" data-coords="[Koordinat ZONA 4]" shape="rect">
            <area target="_blank" alt="ZONA 5" title="ZONA 5" onclick="location.href='/zone/5'" data-coords="[Koordinat ZONA 5]" shape="rect">
            <area target="_blank" alt="ZONA 6" title="ZONA 6" onclick="location.href='/zone/6'" data-coords="[Koordinat ZONA 6]" shape="rect">
            <area target="_blank" alt="ZONA 1" title="ZONA 1" onclick="location.href='/zone/1'" data-coords="205,644,542,401" shape="rect">
            <area target="_blank" alt="ZONA 2" title="ZONA 2" onclick="location.href='/zone/2'" data-coords="1057,394,601,647" shape="rect"> -->
        </map>
    </div>

    <script>
        const mapImage = document.getElementById('mapImage');
        const areas = document.querySelectorAll('area');

        function updateCoords() {
            areas.forEach(area => {
                const originalCoords = area.dataset.coords.split(',').map(Number);
                const imageWidth = mapImage.naturalWidth;
                const imageHeight = mapImage.naturalHeight;

                if (imageWidth && imageHeight) { 
                    const newCoords = originalCoords.map((coord, index) => {
                        return (index % 2 === 0) ? (coord / imageWidth) * 100 : (coord / imageHeight) * 100;
                    }).join('% ,') + '%';
                    area.coords = newCoords;
                    console.log(newCoords)
                }
                
            });
        }

        mapImage.onload = updateCoords;
        window.addEventListener('resize', updateCoords);
    </script>
</body>
</html>
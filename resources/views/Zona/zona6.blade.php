@extends('layout.main')

@section('content')
<div style="position: relative; width: 100vw; height: 100vh; overflow: hidden;" class="bg-black">
    <img
        src="{{ asset('images/zona6.png') }}"
        alt="Background"
        class="block"
        style="width: 150%; height: 100%;"
    >

    <!-- Tombol Kembali -->
    <div style="position: absolute; top: 1rem; left: 1rem;">
        <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 text-lg text-white bg-blue-400 border border-current rounded-xl">
            <span class="mr-2">&lt;</span> Kembali
        </a>
    </div>

    @php
        // Posisi koordinat untuk masing-masing slot parkir
        $slotPositions = [
            ['top' => '73%', 'left' => '5%'], // Slot 1
            ['top' => '73%', 'left' => '8.5%'], // Slot 2
            ['top' => '73%', 'left' => '12%'], // Slot 3
            ['top' => '73%', 'left' => '15.5%'], // Slot 4
        ];
    @endphp

    <!-- Render mobil jika keterangan = "Terisi" -->
    @foreach ($slots as $index => $slot)
        @if ($slot->keterangan === 'Terisi')
            <div style="position: absolute; top: {{ $slotPositions[$index]['top'] }}; left: {{ $slotPositions[$index]['left'] }};">
                <img
                    src="{{ asset('images/mobil.png') }}"
                    alt="Mobil"
                    style="width: 80px; height: 80px;"
                >
            </div>
        @endif
    @endforeach
</div>
@endsection

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
</div>
@endsection

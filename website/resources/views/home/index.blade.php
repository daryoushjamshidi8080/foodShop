@extends('layout.master')


@section('title', 'Home Page')


@section('link')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin="">
    </script>
@endsection

@section('script')
        <script>
            var map = L.map('map').setView([37.33741761, 46.06130471], 25);
            var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
            }).addTo(map);
            var marker = L.marker([37.33741761, 46.06130471]).addTo(map)
                .bindPopup('<b>مهرآباد</b>').openPopup();
        </script>
@endsection

@section('content')

    <!-- features section -->
    @include('home.features')
    <!-- end features section -->

    <!-- food section -->
    @include('home.products')
    <!-- end food section -->

    @include('home.about')

    <!-- contact section -->
    @include('home.contact')
    <!-- end contact section -->

@endsection

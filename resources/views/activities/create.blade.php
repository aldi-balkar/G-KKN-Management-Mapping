@extends('layouts.app')

@section('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url('/users') }}">Users</a></div>
                <div class="breadcrumb-item active">Tambah Data User</div>
            </div>
        </div>

        @if(session('message'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session('message') }}
            </div>
        </div>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-2"></div>
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data KKN</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/activities') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror">
                                    @error('student_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>No Telp Mahasiswa</label>
                                    <input type="text" name="student_phone" class="form-control @error('student_phone') is-invalid @enderror">
                                    @error('student_phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Program Studi Mahasiswa</label>
                                    <input type="text" name="student_study_program" class="form-control @error('student_study_program') is-invalid @enderror">
                                    @error('student_study_program')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Dosen Pembimbing</label>
                                    <input type="text" name="lecturer_name" class="form-control @error('lecturer_name') is-invalid @enderror">
                                    @error('lecturer_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>No Telp Dosen Pembimbing</label>
                                    <input type="text" name="lecturer_phone" class="form-control @error('lecturer_phone') is-invalid @enderror">
                                    @error('lecturer_phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Program Studi Dosen Pembimbing</label>
                                    <input type="text" name="lecturer_study_program" class="form-control @error('lecturer_study_program') is-invalid @enderror">
                                    @error('lecturer_study_program')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Desa</label>
                                    <input type="text" name="village_name" class="form-control @error('village_name') is-invalid @enderror">
                                    @error('village_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat Desa</label>
                                    <textarea name="village_address" class="form-control @error('village_address') is-invalid @enderror" rows="3"></textarea>
                                    @error('village_address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="pac-input" class="form-control" type="text" placeholder="Search Box" style="font-size:17px; width: 50%">
                                    <div id="map" class="mx-auto my-auto" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" required>
                                    @error('latitude')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" required>
                                    @error('longitude')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Judul KKN</label>
                                    <input type="text" name="activity_name" class="form-control @error('activity_name') is-invalid @enderror">
                                    @error('activity_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Program Kerja</label>
                                    <textarea name="activity_description" class="form-control @error('activity_description') is-invalid @enderror" rows="3"></textarea>
                                    @error('activity_description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/auth-register.js') }}"></script>

    <!-- Map -->
    <script>
        var marker;

        function initMap() {
            directionsRenderer = new google.maps.DirectionsRenderer();
            directionsService = new google.maps.DirectionsService();

            const loc = {
                lat: -6.9146916,
                lng: 107.6382977
            }

            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: loc
            });

            var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));

            google.maps.event.addListener(searchBox, 'places_changed', function() {
                searchBox.set('map', null);

                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });

                map.fitBounds(bounds);
                searchBox.set('map', map);
                map.setZoom(Math.min(map.getZoom(),15));

            });

            map.addListener("click", (e) => {

                var latitude = e.latLng.lat();
                var longitude = e.latLng.lng();

                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude;

                placeMarker(e.latLng);
                calculate();
            });

            function placeMarker(location) {

                if (marker == null)
                {
                    marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                }
                else
                {
                    marker.setPosition(location);
                }
            }

        }
    </script>
    <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&callback=initMap&libraries=places&v=weekly"
          async
    ></script>
@endsection

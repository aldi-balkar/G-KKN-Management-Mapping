@extends('layouts.app')

@section('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
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
            <div id="map"></div>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="data-modal-delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="#">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>Apakah Anda yakin akan menghapus data ini?</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-danger btn-shadow">Ya</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

        <!-- Map -->
    <script>
        var marker;
        let markers = [];
        let infoWindow;
        let data = <?php echo json_encode($activities); ?>;;

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

            infoWindow = new google.maps.InfoWindow();

            for (let i = 0; i < data.length; i++) {
                placeMarker(data[i]);
            }

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

            function placeMarker(data) {
                let position = new google.maps.LatLng(data.latitude, data.longitude);

                let marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: data.activity_name,
                });

                marker.addListener("click", () => {
                    let html = `
                        <div>
                            <h5>${data.activity_name}</h5>
                            <p>${data.activity_description}</p>
                            <h5>${data.village_name}</h5>
                            <p>${data.village_address}</p>
                            <span> Mahasiswa : ${data.student} - ${data.student_study_program} - ${data.student_phone}</span><br>
                            <span> Dosen : ${data.lecturer} - ${data.lecturer_study_program} - ${data.lecturer_phone}</span>
                        </div>
                    `;
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });

                markers.push(marker);

            }

        }
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&callback=initMap&libraries=places,geometry&v=weekly"
          async
    ></script>
@endsection

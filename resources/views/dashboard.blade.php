@extends('layouts.app')

@section('style')
    <!-- CSS Libraries -->
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
        </div>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    Kata sandi telah berhasil diatur ulang.
                </div>
            </div>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <h1>{{ $students }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Dosen</h4>
                        </div>
                        <div class="card-body">
                            <h1>{{ $lecturers }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah KKN</h4>
                        </div>
                        <div class="card-body">
                            <h1>{{ $activities }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endsection

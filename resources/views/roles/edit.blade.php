@extends('layouts.app')

@section('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url('/roles') }}">Peran</a></div>
                <div class="breadcrumb-item active">Ubah Data Peran</div>
            </div>
        </div>

        @error('permissions')
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ $message }}
            </div>
        </div>
        @enderror

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Data Peran</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/roles/' .$role->id) }}" class="needs-validation" novalidate="">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $role->name) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="control-label">Hak Akses</div>
                                    <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-3">
                                            <label class="custom-switch mt-2">
                                                <input type="checkbox" name="permissions[]" class="custom-switch-input" value="{{ $permission->id }}"
                                                @if(old('permissions'))
                                                    {{ (in_array($permission->id, old('permissions')) ? 'checked' : '') }}
                                                @else
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                @endif>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">{{ $permission->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                    </div>
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
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endsection

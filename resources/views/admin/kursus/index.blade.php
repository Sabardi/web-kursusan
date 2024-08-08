@extends('admin.layouts.app')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kursus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="courseForm" method="POST" action="{{ route('kursus.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                placeholder="Masukkan Judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="durasi" class="form-label">Durasi (Hari)</label>
                            <input type="number" class="form-control" id="durasi" name="durasi"
                                placeholder="Masukkan Durasi" min="1" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Kursus</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('index') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Kursus</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">data</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>durasi</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>durasi</th>
                                            <th>aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($kursus as $kursus)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kursus->judul }}</td>
                                                <td>{{ $kursus->deskripsi }}</td>
                                                <td>{{ $kursus->durasi }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#show{{ $kursus->id }}">Show</button>

                                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $kursus->id }}">edit</button>

                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delet{{ $kursus->id }}">delet</button>
                                                </td>
                                            </tr>
                                            <!-- Modal show data -->
                                            <div class="modal fade" id="show{{ $kursus->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Detail Kursus
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $kursus->judul }}</h5>
                                                                    <p class="card-text">
                                                                        <strong>Deskripsi:</strong>
                                                                        {{ $kursus->deskripsi }}
                                                                    </p>
                                                                    <p class="card-text">
                                                                        <strong>Durasi:</strong> {{ $kursus->durasi }} hari
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal update -->
                                            <div class="modal fade" id="edit{{ $kursus->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel"> Edit Data
                                                                Kursus <b>{{ $kursus->judul }}!</b> </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="courseForm" method="POST"
                                                                action="{{ route('kursus.update', $kursus->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="judul" class="form-label">Judul</label>
                                                                    <input type="text" class="form-control"
                                                                        id="judul" name="judul"
                                                                        value="{{ $kursus->judul }}"
                                                                        placeholder="Masukkan Judul" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="deskripsi"
                                                                        class="form-label">Deskripsi</label>
                                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi"
                                                                        required>{{ $kursus->deskripsi }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="durasi" class="form-label">Durasi
                                                                        (Hari)
                                                                    </label>
                                                                    <input type="number" class="form-control"
                                                                        id="durasi" name="durasi"
                                                                        value="{{ $kursus->durasi }}"
                                                                        placeholder="Masukkan Durasi" min="1"
                                                                        required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal delete -->
                                            <div class="modal fade" id="delet{{ $kursus->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel"> Anda Yakin
                                                                Data
                                                                Kursus <b>{{ $kursus->judul }}</b> Di Hapus </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="courseForm" method="POST"
                                                                action="{{ route('kursus.destroy', $kursus->id) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">{{ $kursus->judul }}</h5>
                                                                        <p class="card-text">
                                                                            <strong>Deskripsi:</strong>
                                                                            {{ $kursus->deskripsi }}
                                                                        </p>
                                                                        <p class="card-text">
                                                                            <strong>Durasi:</strong> {{ $kursus->durasi }}
                                                                            hari
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-info"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

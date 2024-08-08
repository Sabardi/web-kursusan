@extends('admin.layouts.app')
@section('content')
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Materi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="courseForm" action="{{ route('materi.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="jenis_kursus" class="form-label">Jenis Kursus</label>
                            <select class="form-select" id="kursus_id" name="kursus_id" required>
                                <option value="" disabled selected>Pilih Jenis Kursus</option>
                                @foreach ($kursus as $item)
                                    <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
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
                            <label for="embed_link" class="form-label">Embed Link</label>
                            <input type="url" class="form-control" id="embed_link" name="embed_link"
                                placeholder="Masukkan Embed Link" required>
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
                <h3 class="fw-bold mb-3">Data Materi</h3>
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
                        <a href="#">Materi</a>
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
                                            <th>kursus</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Materi url</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>kursus</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Materi url</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($materi as $materi)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $materi->kursus->judul }}</td>
                                                <td>{{ $materi->judul }}</td>
                                                <td>{{ $materi->deskripsi }}</td>
                                                <td>{{ $materi->embed_link }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#show{{ $materi->id }}">Show</button>

                                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $materi->id }}">edit</button>

                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delet{{ $materi->id }}">delet</button>
                                                </td>
                                            </tr>
                                            <!-- Modal show data -->
                                            <div class="modal fade" id="show{{ $materi->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Detail Materi
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $materi->judul }}</h5>
                                                                    <p class="card-text">
                                                                        <strong>Kursus:</strong>
                                                                        {{ $materi->kursus->judul }}
                                                                    </p>
                                                                    <p class="card-text">
                                                                        <strong>Deskripsi:</strong>
                                                                        {{ $materi->deskripsi }}
                                                                    </p>
                                                                    <p class="card-text">
                                                                        <strong>link:</strong> <a
                                                                            href="{{ $materi->embed_link }}">klik me</a>
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
                                            <div class="modal fade" id="edit{{ $materi->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel"> Edit Data
                                                                Materi <b>{{ $materi->judul }}!</b> </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="courseForm"
                                                                action="{{ route('materi.update', $materi->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUt')
                                                                <div class="mb-3">
                                                                    <label for="jenis_kursus" class="form-label">Jenis
                                                                        Kursus</label>
                                                                    <select class="form-select" id="kursus_id"
                                                                        name="kursus_id" required>
                                                                        <option value="" disabled>Pilih Jenis Kursus
                                                                        </option>
                                                                        @foreach ($kursus as $item)
                                                                            <option value="{{ $item->id }}"
                                                                                @if (isset($currentKursusId) && $currentKursusId == $item->id) selected @endif>
                                                                                {{ $item->judul }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="judul" class="form-label">Judul</label>
                                                                    <input type="text" class="form-control"
                                                                        id="judul" name="judul"
                                                                        value="{{ $materi->judul }}"
                                                                        placeholder="Masukkan Judul" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="deskripsi"
                                                                        class="form-label">Deskripsi</label>
                                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi"
                                                                        required>{{ $materi->deskripsi }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="embed_link" class="form-label">Embed
                                                                        Link</label>
                                                                    <input type="url" class="form-control"
                                                                        id="embed_link" name="embed_link"
                                                                        value="{{ $materi->embed_link }}"
                                                                        placeholder="Masukkan Embed Link" required>
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
                                            <div class="modal fade" id="delet{{ $materi->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel"> Anda Yakin
                                                                Data
                                                                Materi <b>{{ $materi->judul }}</b> Di Hapus </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="courseForm" method="POST"
                                                                action="{{ route('materi.destroy', $materi->id) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">{{ $materi->judul }}</h5>
                                                                        <p class="card-text">
                                                                            <strong>Deskripsi:</strong>
                                                                            {{ $materi->deskripsi }}
                                                                        </p>
                                                                        <p class="card-text">
                                                                            <strong>link:</strong>
                                                                            {{ $materi->embed_link }}
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

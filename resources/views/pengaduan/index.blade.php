@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pengaduan Masyarakat</h1>

    @if (isset($pengaduan) && $pengaduan->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th style="width:60px;">No</th>
                        <th>Pelapor</th>
                        <th>Email</th>
                        <th>Kategori</th>
                        <th>Isi Pengaduan</th>
                        <th style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengaduan as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->nama ?? ($p->user->name ?? '—') }}</td>
                            <td>{{ $p->email ?? ($p->user->email ?? '—') }}</td>
                            <td>{{ $p->kategori ?? '—' }}</td>
                            
                            <td>
                                <a href="{{ route('pengaduan.show', $p->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        
        <div class="card mb-4">
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr class="table-secondary">
                                <th style="width:60px;">No</th>
                                <th>Pelapor</th>
                                <th>Email</th>
                                <th>Kategori</th>
                                <th>Isi Pengaduan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-secondary text-white d-inline-flex justify-content-center align-items-center" style="width:40px;height:40px;font-weight:600;margin-right:10px;">A</div>
                                        <div>
                                            <div class="fw-bold">Ani Wijaya</div>
                                            <div class="text-muted small">Warga RT 02</div>
                                        </div>
                                    </div>
                                </td>
                                <td>ani@example.com</td>
                                <td><span class="badge bg-danger">Infrastruktur</span></td>
                                <td>Jalan berlubang di depan rumah.</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-secondary text-white d-inline-flex justify-content-center align-items-center" style="width:40px;height:40px;font-weight:600;margin-right:10px;">B</div>
                                        <div>
                                            <div class="fw-bold">Budi Santoso</div>
                                            <div class="text-muted small">Warga Perumahan A</div>
                                        </div>
                                    </div>
                                </td>
                                <td>budi@example.com</td>
                                <td><span class="badge bg-warning text-dark">Penerangan</span></td>
                                <td>Lampu jalan tidak menyala sejak seminggu lalu.</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-secondary text-white d-inline-flex justify-content-center align-items-center" style="width:40px;height:40px;font-weight:600;margin-right:10px;">S</div>
                                        <div>
                                            <div class="fw-bold">Siti Aminah</div>
                                            <div class="text-muted small">Warga RT 05</div>
                                        </div>
                                    </div>
                                </td>
                                <td>siti@example.com</td>
                                <td><span class="badge bg-success">Kebersihan</span></td>
                                <td>Sampah menumpuk di selokan RT 05.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

</div>

@endsection

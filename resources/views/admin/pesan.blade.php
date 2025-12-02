@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Pesan Terkirim</h3>

    @if($pesan->isEmpty())
        <div class="alert alert-info">Belum ada pesan masuk.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pesan as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->telepon }}</td>
                        <td style="white-space:pre-wrap; max-width:420px;">{{ $p->pesan }}</td>
                        <td>{{ $p->created_at }}</td>

                        <!-- Tombol EDIT & HAPUS -->
                        <td>
                            <a href="{{ route('pesan.edit', $p->id) }}" 
                               class="btn btn-warning btn-sm">
                               Edit
                            </a>

                            <form action="{{ route('pesan.destroy', $p->id) }}" 
                                  method="POST" 
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

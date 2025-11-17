<form action="{{ route('pengaduan.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Isi Pengaduan</label>
        <textarea name="isi_pengaduan" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Kirim Pengaduan</button>
</form>

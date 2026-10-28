@extends('layouts.app')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col">
        <h2 class="fw-bold mb-1">Tambah Buku Baru</h2>
        <p class="text-muted mb-0">Isi formulir berikut untuk menambahkan buku ke sistem perpustakaan.</p>
    </div>
    <div class="col-auto">
        <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">
            &larr; Kembali
        </a>
    </div>
</div>

<div class="card p-4 shadow-sm bg-white border-0">
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label fw-semibold">Judul Buku <span class="text-danger">*</span></label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Contoh: Pemrograman Web dengan Laravel" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="penulis" class="form-label fw-semibold">Penulis <span class="text-danger">*</span></label>
                <input type="text" name="penulis" id="penulis" class="form-control @error('penulis') is-invalid @enderror" placeholder="Contoh: John Doe" value="{{ old('penulis') }}" required>
                @error('penulis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="penerbit" class="form-label fw-semibold">Penerbit <span class="text-danger">*</span></label>
                <input type="text" name="penerbit" id="penerbit" class="form-control @error('penerbit') is-invalid @enderror" placeholder="Contoh: Informatika Bandung" value="{{ old('penerbit') }}" required>
                @error('penerbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="tahun_terbit" class="form-label fw-semibold">Tahun Terbit <span class="text-danger">*</span></label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ old('tahun_terbit', date('Y')) }}" required>
                @error('tahun_terbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-4">
                <label for="stok" class="form-label fw-semibold">Jumlah Stok <span class="text-danger">*</span></label>
                <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', 1) }}" min="0" required>
                @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('buku.index') }}" class="btn btn-light border">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Buku</button>
        </div>
    </form>
</div>
@endsection
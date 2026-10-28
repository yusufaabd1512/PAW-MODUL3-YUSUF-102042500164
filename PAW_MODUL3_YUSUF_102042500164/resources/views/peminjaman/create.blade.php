@extends('layouts.app')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col">
        <h2 class="fw-bold mb-1">Transaksi Peminjaman Buku</h2>
        <p class="text-muted mb-0">Catat peminjaman buku oleh anggota perpustakaan.</p>
    </div>
    <div class="col-auto">
        <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary">
            &larr; Kembali
        </a>
    </div>
</div>

<div class="card p-4 shadow-sm bg-white border-0">
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="anggota_id" class="form-label fw-semibold">Pilih Anggota <span class="text-danger">*</span></label>
            <select name="anggota_id" id="anggota_id" class="form-select @error('anggota_id') is-invalid @enderror" required>
                <option value="">-- Pilih Anggota Peminjam --</option>
                @foreach ($anggota as $item)
                    <option value="{{ $item->id }}" {{ old('anggota_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }} - {{ $item->email }}
                    </option>
                @endforeach
            </select>
            @error('anggota_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="buku_id" class="form-label fw-semibold">Pilih Buku <span class="text-danger">*</span></label>
            <select name="buku_id" id="buku_id" class="form-select @error('buku_id') is-invalid @enderror" required>
                <option value="">-- Pilih Buku yang Dipinjam --</option>
                @foreach ($buku as $item)
                    <option value="{{ $item->id }}" {{ old('buku_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->judul }} (Stok: {{ $item->stok }})
                    </option>
                @endforeach
            </select>
            <div class="form-text text-muted">Hanya buku dengan stok &gt; 0 yang muncul dalam pilihan. Stok akan otomatis berkurang 1.</div>
            @error('buku_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tanggal_pinjam" class="form-label fw-semibold">Tanggal Pinjam <span class="text-danger">*</span></label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>
            @error('tanggal_pinjam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('peminjaman.index') }}" class="btn btn-light border">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Peminjaman</button>
        </div>
    </form>
</div>
@endsection
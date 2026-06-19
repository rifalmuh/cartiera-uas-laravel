@extends('admin.layouts.app')
@section('title', $service->exists ? 'Ubah Produk / Layanan' : 'Tambah Produk / Layanan')
@section('content')
<div class="heading"><div><h1>{{ $service->exists ? 'Ubah Produk / Layanan' : 'Tambah Produk / Layanan' }}</h1><p>Lengkapi nama, deskripsi, dan gambar.</p></div></div>@include('admin.partials.errors')
<div class="card"><div class="card-body"><form method="POST" enctype="multipart/form-data" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}">@csrf @if($service->exists)@method('PUT')@endif
<div class="form-grid"><div class="field full"><label for="name">Nama Produk / Layanan</label><input id="name" name="name" value="{{ old('name', $service->name) }}" maxlength="120" required></div><div class="field full"><label for="description">Deskripsi</label><textarea id="description" name="description" required>{{ old('description', $service->description) }}</textarea></div><div class="field full"><label for="image">Gambar {{ $service->exists ? '(kosongkan jika tidak diganti)' : '' }}</label><input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp" {{ $service->exists ? '' : 'required' }}>@if($service->image)<img class="preview" src="{{ str_starts_with($service->image, 'images/') ? asset($service->image) : asset('storage/'.$service->image) }}">@endif</div></div>
<div class="form-actions"><button class="btn" type="submit">Simpan Produk / Layanan</button><a class="btn light" href="{{ route('admin.services.index') }}">Batal</a></div></form></div></div>
@endsection

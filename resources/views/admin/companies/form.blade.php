@extends('admin.layouts.app')
@section('title', $company->exists ? 'Ubah Profil' : 'Tambah Profil')
@section('content')
<div class="heading"><div><h1>{{ $company->exists ? 'Ubah Profil Perusahaan' : 'Tambah Profil Perusahaan' }}</h1><p>Informasi utama identitas Cartiera.</p></div></div>@include('admin.partials.errors')
<div class="card"><div class="card-body"><form method="POST" action="{{ $company->exists ? route('admin.companies.update', $company) : route('admin.companies.store') }}">@csrf @if($company->exists)@method('PUT')@endif
<div class="form-grid"><div class="field full"><label for="name">Nama Perusahaan</label><input id="name" name="name" value="{{ old('name', $company->name) }}" required></div><div class="field full"><label for="description">Deskripsi</label><textarea id="description" name="description" required>{{ old('description', $company->description) }}</textarea></div><div class="field full"><label for="address">Alamat</label><textarea id="address" name="address" style="min-height:90px" required>{{ old('address', $company->address) }}</textarea></div></div>
<div class="form-actions"><button class="btn" type="submit">Simpan Profil</button><a class="btn light" href="{{ route('admin.companies.index') }}">Batal</a></div></form></div></div>
@endsection

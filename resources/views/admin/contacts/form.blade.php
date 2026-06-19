@extends('admin.layouts.app')
@section('title', $contact->exists ? 'Ubah Kontak' : 'Tambah Kontak')
@section('content')
<div class="heading"><div><h1>{{ $contact->exists ? 'Ubah Kontak' : 'Tambah Kontak' }}</h1><p>Gunakan informasi kontak yang aktif.</p></div></div>@include('admin.partials.errors')
<div class="card"><div class="card-body"><form method="POST" action="{{ $contact->exists ? route('admin.contacts.update', $contact) : route('admin.contacts.store') }}">@csrf @if($contact->exists)@method('PUT')@endif
<div class="form-grid"><div class="field"><label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email', $contact->email) }}" required></div><div class="field"><label for="phone">Nomor Telepon</label><input id="phone" name="phone" value="{{ old('phone', $contact->phone) }}" required></div><div class="field full"><label for="address">Alamat</label><textarea id="address" name="address" style="min-height:90px" required>{{ old('address', $contact->address) }}</textarea></div></div>
<div class="form-actions"><button class="btn" type="submit">Simpan Kontak</button><a class="btn light" href="{{ route('admin.contacts.index') }}">Batal</a></div></form></div></div>
@endsection

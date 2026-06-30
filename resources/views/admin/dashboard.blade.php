@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="heading"><div><h1>Dashboard</h1><p>Ringkasan pengelolaan Company Profile Cartiera dan Data Koleksi Fashion.</p></div><a class="btn gold" href="{{ route('admin.fashion-collections.create') }}">+ Tambah Fashion</a></div>
<div class="stats">@foreach($counts as $label => $count)<div class="stat"><span>{{ $label }}</span><strong>{{ $count }}</strong></div>@endforeach</div>
<div class="two-col">
    <div class="card"><div class="card-body"><h3>Koleksi Fashion Terbaru</h3></div><div class="table-wrap"><table><thead><tr><th>ID Fashion</th><th>Nama Item</th><th>Brand</th></tr></thead><tbody>@forelse($latestFashionCollections as $item)<tr><td>{{ $item->id_fashion }}</td><td>{{ $item->nama_item }}</td><td>{{ $item->brand }}</td></tr>@empty<tr><td colspan="3" class="empty">Belum ada koleksi fashion.</td></tr>@endforelse</tbody></table></div></div>
    <div class="card"><div class="card-body"><h3>Menu Cepat</h3><p><a class="btn light" href="{{ route('admin.fashion-collections.create') }}">Tambah Koleksi Fashion</a></p><p><a class="btn light" href="{{ route('admin.services.create') }}">Tambah Produk / Layanan</a></p><p><a class="btn light" href="{{ route('admin.companies.index') }}">Ubah Profil Perusahaan</a></p><p><a class="btn gold" href="{{ route('admin.reports.fashion-collections') }}">Cetak PDF Fashion</a></p></div></div>
</div>
@endsection

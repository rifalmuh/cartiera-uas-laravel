@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="heading"><div><h1>Dashboard</h1><p>Ringkasan pengelolaan Company Profile Cartiera.</p></div><a class="btn gold" href="{{ route('admin.articles.create') }}">+ Tambah Artikel</a></div>
<div class="stats">@foreach($counts as $label => $count)<div class="stat"><span>{{ $label }}</span><strong>{{ $count }}</strong></div>@endforeach</div>
<div class="two-col">
    <div class="card"><div class="card-body"><h3>Artikel Terbaru</h3></div><div class="table-wrap"><table><thead><tr><th>Judul</th><th>Tanggal</th></tr></thead><tbody>@forelse($latestArticles as $article)<tr><td>{{ $article->title }}</td><td>{{ $article->created_at?->format('d/m/Y') }}</td></tr>@empty<tr><td colspan="2" class="empty">Belum ada artikel.</td></tr>@endforelse</tbody></table></div></div>
    <div class="card"><div class="card-body"><h3>Menu Cepat</h3><p><a class="btn light" href="{{ route('admin.services.create') }}">Tambah Produk / Layanan</a></p><p><a class="btn light" href="{{ route('admin.companies.index') }}">Ubah Profil Perusahaan</a></p><p><a class="btn gold" href="{{ route('admin.reports.articles') }}">Cetak Report PDF</a></p></div></div>
</div>
@endsection

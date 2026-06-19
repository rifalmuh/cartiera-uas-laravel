@extends('admin.layouts.app')
@section('title', 'Profil Perusahaan')
@section('content')
<div class="heading"><div><h1>Profil Perusahaan</h1><p>Data ini ditampilkan pada website publik.</p></div><a class="btn" href="{{ route('admin.companies.create') }}">+ Tambah</a></div>
<div class="card"><div class="table-wrap"><table><thead><tr><th>Nama Perusahaan</th><th>Deskripsi</th><th>Alamat</th><th>Aksi</th></tr></thead><tbody>@forelse($companies as $company)<tr><td><strong>{{ $company->name }}</strong></td><td>{{ Str::limit($company->description, 80) }}</td><td>{{ $company->address }}</td><td><div class="actions"><a class="btn light" href="{{ route('admin.companies.edit', $company) }}">Ubah</a><form method="POST" action="{{ route('admin.companies.destroy', $company) }}" onsubmit="return confirm('Hapus profil perusahaan ini?')">@csrf @method('DELETE')<button class="btn red">Hapus</button></form></div></td></tr>@empty<tr><td colspan="4" class="empty">Belum ada profil perusahaan.</td></tr>@endforelse</tbody></table></div><div class="pagination">{{ $companies->links() }}</div></div>
@endsection

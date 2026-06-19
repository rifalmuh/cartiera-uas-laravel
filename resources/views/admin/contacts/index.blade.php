@extends('admin.layouts.app')
@section('title', 'Kontak')
@section('content')
<div class="heading"><div><h1>Kontak</h1><p>Kelola informasi kontak resmi perusahaan.</p></div><a class="btn" href="{{ route('admin.contacts.create') }}">+ Tambah</a></div>
<div class="card"><div class="table-wrap"><table><thead><tr><th>Email</th><th>Telepon</th><th>Alamat</th><th>Aksi</th></tr></thead><tbody>@forelse($contacts as $contact)<tr><td>{{ $contact->email }}</td><td>{{ $contact->phone }}</td><td>{{ $contact->address }}</td><td><div class="actions"><a class="btn light" href="{{ route('admin.contacts.edit', $contact) }}">Ubah</a><form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('Hapus kontak ini?')">@csrf @method('DELETE')<button class="btn red">Hapus</button></form></div></td></tr>@empty<tr><td colspan="4" class="empty">Belum ada kontak.</td></tr>@endforelse</tbody></table></div><div class="pagination">{{ $contacts->links() }}</div></div>
@endsection

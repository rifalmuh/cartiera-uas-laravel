@extends('admin.layouts.app')
@section('title', $article->exists ? 'Ubah Artikel' : 'Tambah Artikel')
@section('content')
<div class="heading"><div><h1>{{ $article->exists ? 'Ubah Artikel' : 'Tambah Artikel' }}</h1><p>Semua kolom akan divalidasi oleh Laravel.</p></div></div>
@include('admin.partials.errors')
<div class="card"><div class="card-body"><form method="POST" enctype="multipart/form-data" action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}">@csrf @if($article->exists)@method('PUT')@endif
<div class="form-grid"><div class="field full"><label for="title">Judul Artikel</label><input id="title" name="title" value="{{ old('title', $article->title) }}" maxlength="150" required></div><div class="field full"><label for="content">Isi Artikel</label><textarea id="content" name="content" required>{{ old('content', $article->content) }}</textarea></div><div class="field full"><label for="image">Gambar {{ $article->exists ? '(kosongkan jika tidak diganti)' : '' }}</label><input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp" {{ $article->exists ? '' : 'required' }}>@if($article->image)<img class="preview" src="{{ str_starts_with($article->image, 'images/') ? asset($article->image) : asset('storage/'.$article->image) }}">@endif</div></div>
<div class="form-actions"><button class="btn" type="submit">Simpan Artikel</button><a class="btn light" href="{{ route('admin.articles.index') }}">Batal</a></div></form></div></div>
@endsection

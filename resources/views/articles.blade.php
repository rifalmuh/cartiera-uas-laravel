@extends('layouts.app')
@section('title', 'Artikel - Cartiera')
@section('content')
<div class="section-head"><div class="eyebrow">JOURNAL</div><h2>Artikel dan Berita</h2><p class="muted">Inspirasi fashion pria dan perkembangan terbaru Cartiera.</p></div><div class="grid">@forelse($articles as $article)<article class="card">@if($article->image)<img src="{{ str_starts_with($article->image, 'images/') ? asset($article->image) : asset('storage/'.$article->image) }}" alt="{{ $article->title }}">@endif<div class="card-body"><small class="muted">{{ $article->created_at?->format('d M Y') }}</small><h3 style="margin-top:8px">{{ $article->title }}</h3><p class="muted">{{ Str::limit($article->content, 130) }}</p><a href="{{ route('articles.show', $article) }}">Baca artikel</a></div></article>@empty<div class="empty">Belum ada artikel yang dipublikasikan.</div>@endforelse</div>
@endsection

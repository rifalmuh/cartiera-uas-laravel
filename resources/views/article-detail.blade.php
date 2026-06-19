@extends('layouts.app')
@section('title', $article->title.' - Cartiera')
@section('content')
<article style="max-width:850px;margin:auto"><a href="{{ route('articles.index') }}">&larr; Kembali ke artikel</a><div class="eyebrow" style="margin-top:30px">{{ $article->created_at?->format('d M Y') }}</div><h1 style="font:700 44px Georgia,serif">{{ $article->title }}</h1>@if($article->image)<img class="detail-img" src="{{ str_starts_with($article->image, 'images/') ? asset($article->image) : asset('storage/'.$article->image) }}" alt="{{ $article->title }}">@endif<p class="muted" style="font-size:17px;white-space:pre-line">{{ $article->content }}</p></article>
@endsection

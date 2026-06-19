@extends('layouts.app')
@section('title', 'Produk dan Layanan - Cartiera')
@section('content')
<div class="section-head"><div class="eyebrow">OUR COLLECTION</div><h2>Produk dan Layanan</h2><p class="muted">Menswear lokal yang modern, fungsional, dan elegan.</p></div><div class="grid">@forelse($services as $service)<article class="card">@if($service->image)<img src="{{ str_starts_with($service->image, 'images/') ? asset($service->image) : asset('storage/'.$service->image) }}" alt="{{ $service->name }}">@endif<div class="card-body"><h3>{{ $service->name }}</h3><p class="muted">{{ $service->description }}</p></div></article>@empty<div class="empty">Produk dan layanan belum tersedia.</div>@endforelse</div>
@endsection

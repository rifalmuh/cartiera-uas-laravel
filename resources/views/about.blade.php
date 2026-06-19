@extends('layouts.app')
@section('title', 'Tentang Cartiera')
@section('content')
<section class="feature"><img src="{{ asset('images/Secondary-black.png') }}" alt="Cartiera Indonesia"><div><div class="eyebrow">ABOUT CARTIERA</div><h1 style="font:700 44px Georgia,serif">{{ $company->name ?? 'PT Cartiera Indonesia' }}</h1><p class="muted">{{ $company->description ?? 'Cartiera adalah brand fashion pria lokal dengan pendekatan modern dan elegan.' }}</p><p class="muted"><strong>Alamat:</strong><br>{{ $company->address ?? 'Gading Serpong, Tangerang' }}</p></div></section>
<section class="section"><div class="section-head"><h2>Nilai Kami</h2></div><div class="grid"><div class="card"><div class="card-body"><h3>Quality</h3><p class="muted">Material terpilih dan pengerjaan detail untuk produk yang nyaman serta tahan lama.</p></div></div><div class="card"><div class="card-body"><h3>Timeless</h3><p class="muted">Desain bersih yang tetap relevan melampaui perubahan tren.</p></div></div><div class="card"><div class="card-body"><h3>Local Pride</h3><p class="muted">Tumbuh bersama industri fashion lokal Indonesia dan konsumennya.</p></div></div></div></section>
@endsection

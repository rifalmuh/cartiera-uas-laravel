@extends('layouts.app')
@section('title', 'Cartiera Indonesia - Modern Menswear')
@section('content')
<section class="home-hero">
    <div class="home-hero-inner">
        <div class="eyebrow">Cartiera Official Menswear</div>
        <h1>Modern essentials for daily movement.</h1>
        <p>{{ $company->description ?? 'Brand fashion pria lokal dengan potongan modern, material nyaman, dan karakter visual yang rapi untuk gaya formal maupun kasual.' }}</p>
        <div class="hero-actions">
            <a class="btn gold" href="{{ route('fashion-collections.index') }}">Jelajahi Koleksi Fashion</a>
            <a class="btn light" href="{{ route('login') }}">Masuk Admin UAS</a>
        </div>
        <div class="proof-strip">
            <div class="proof"><strong>4.9/5</strong><span>Rating toko dari pelanggan</span></div>
            <div class="proof"><strong>100RB+</strong><span>Produk Cartiera terjual</span></div>
            <div class="proof"><strong>6</strong><span>Data koleksi fashion UAS</span></div>
        </div>
    </div>
</section>

<section class="section spotlight">
    <div class="spotlight-main">
        <div class="spotlight-caption">
            <div class="eyebrow">Best Seller Look</div>
            <h2>Tailored comfort, cleaner silhouette.</h2>
            <p>Visual website dibuat lebih dekat dengan karakter Cartiera: tegas, modern, dan fokus ke produk.</p>
        </div>
    </div>
    <div class="spotlight-list">
        @foreach($fashionCollections->take(3) as $item)
            <article class="mini-product">
                @if($item->gambar)
                    <img src="{{ str_starts_with($item->gambar, 'images/') ? asset($item->gambar) : asset('storage/'.$item->gambar) }}" alt="{{ $item->nama_item }}">
                @endif
                <div>
                    <div class="eyebrow">{{ $item->id_fashion }}</div>
                    <h3>{{ Str::limit($item->nama_item, 58) }}</h3>
                    <p class="muted">{{ $item->warna }}</p>
                </div>
            </article>
        @endforeach
    </div>
</section>

<section class="brand-band">
    <div><strong>Original</strong><span>Data memakai brand Cartiera dan asset produk yang ditampilkan pada marketplace resmi.</span></div>
    <div><strong>Responsive</strong><span>Frontend dibuat dengan Blade, CSS, dan layout yang nyaman untuk desktop maupun mobile.</span></div>
    <div><strong>CRUD Ready</strong><span>Admin dapat tambah, lihat, ubah, hapus, upload gambar, validasi, dan export PDF.</span></div>
</section>

<section class="section">
    <div class="section-head">
        <div class="eyebrow">Data Koleksi Fashion</div>
        <h2>Koleksi Fashion Cartiera</h2>
        <p class="muted">Kategori digit terakhir NIM 5: ID Fashion, gambar, nama item, ukuran, warna, dan brand.</p>
    </div>
    <div class="grid">
        @forelse($fashionCollections as $item)
            <article class="card collection-card">
                @if($item->gambar)
                    <img src="{{ str_starts_with($item->gambar, 'images/') ? asset($item->gambar) : asset('storage/'.$item->gambar) }}" alt="{{ $item->nama_item }}">
                @endif
                <div class="card-body">
                    <div class="eyebrow">{{ $item->id_fashion }}</div>
                    <h3>{{ Str::limit($item->nama_item, 72) }}</h3>
                    <div class="meta-list muted">
                        <span><strong>Ukuran:</strong> {{ $item->ukuran }}</span>
                        <span><strong>Warna:</strong> {{ $item->warna }}</span>
                        <span><strong>Brand:</strong> {{ $item->brand }}</span>
                    </div>
                </div>
            </article>
        @empty
            <div class="empty">Koleksi fashion akan segera tersedia.</div>
        @endforelse
    </div>
    <p style="text-align:center;margin-top:28px"><a class="btn gold" href="{{ route('fashion-collections.index') }}">Lihat Semua Koleksi Fashion</a></p>
</section>

<section class="section feature">
    <img src="{{ asset('images/fashion/fsh-006-loco-polo-scuba.png') }}" alt="Cartiera polo shirt">
    <div>
        <div class="eyebrow">Tentang Cartiera</div>
        <h2 style="font:700 38px Georgia,serif;margin:10px 0">Designed for modern gentlemen.</h2>
        <p class="muted">Cartiera menggabungkan material berkualitas, detail yang rapi, dan kenyamanan untuk menemani gaya formal maupun kasual pria Indonesia.</p>
        <a class="btn" href="{{ route('about') }}">Kenali Cartiera</a>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Artikel Terbaru</h2>
        <p class="muted">Cerita, inspirasi gaya, dan kabar dari Cartiera.</p>
    </div>
    <div class="grid">
        @forelse($articles as $article)
            <article class="card">
                @if($article->image)
                    <img src="{{ str_starts_with($article->image, 'images/') ? asset($article->image) : asset('storage/'.$article->image) }}" alt="{{ $article->title }}">
                @endif
                <div class="card-body">
                    <h3>{{ $article->title }}</h3>
                    <p class="muted">{{ Str::limit($article->content, 105) }}</p>
                    <a href="{{ route('articles.show', $article) }}">Baca selengkapnya</a>
                </div>
            </article>
        @empty
            <div class="empty">Belum ada artikel.</div>
        @endforelse
    </div>
</section>
@endsection

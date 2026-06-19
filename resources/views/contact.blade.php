@extends('layouts.app')
@section('title', 'Kontak - Cartiera')
@section('content')
<div class="section-head"><div class="eyebrow">GET IN TOUCH</div><h2>Hubungi Cartiera</h2><p class="muted">Kami siap membantu kebutuhan informasi produk dan kolaborasi.</p></div><div class="contact-grid"><div class="card"><div class="card-body"><h3>Informasi Kontak</h3><p class="muted"><strong>Email</strong><br>{{ $contact->email ?? 'cartieraindonesia@gmail.com' }}</p><p class="muted"><strong>Telepon</strong><br>{{ $contact->phone ?? '0821 3060 9314' }}</p><p class="muted"><strong>Alamat</strong><br>{{ $contact->address ?? 'Gading Serpong, Tangerang' }}</p></div></div><div class="card"><div class="card-body"><h3>Jam Operasional</h3><p class="muted">Senin - Jumat<br>09.00 - 17.00 WIB</p><p class="muted">Untuk respons lebih cepat, hubungi kami melalui email atau nomor telepon resmi di samping.</p></div></div></div>
@endsection

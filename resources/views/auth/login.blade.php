<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Cartiera</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;background:#f1eee8;color:#1d1d1b}.page{min-height:100vh;display:grid;grid-template-columns:1.1fr .9fr}.brand{background:#171714;color:#fff;padding:70px;display:flex;flex-direction:column;justify-content:center}.brand small{letter-spacing:4px;color:#c9a96e}.brand h1{font-family:Georgia,serif;font-size:52px;margin:12px 0}.brand p{color:#c8c8c2;line-height:1.7;max-width:520px}.login{display:flex;align-items:center;justify-content:center;padding:32px}.card{background:#fff;width:100%;max-width:430px;padding:42px;border-radius:18px;box-shadow:0 18px 60px #1d1d1b1c}.card h2{margin:0 0 6px}.muted{color:#777;margin:0 0 28px}.field{margin-bottom:18px}label{display:block;font-weight:700;margin-bottom:8px}input{width:100%;padding:13px 14px;border:1px solid #d7d1c7;border-radius:9px;font-size:15px}input:focus{outline:2px solid #c9a96e55;border-color:#9d7b40}.btn{width:100%;border:0;border-radius:9px;padding:14px;background:#171714;color:#fff;font-weight:700;cursor:pointer}.alert{padding:12px 14px;border-radius:8px;margin-bottom:18px;background:#ffe8e8;color:#a42121}.success{background:#e7f6ec;color:#176b35}.hint{margin-top:22px;padding:14px;background:#f7f5f0;border-radius:8px;font-size:13px;line-height:1.6}@media(max-width:800px){.page{grid-template-columns:1fr}.brand{display:none}}
    </style>
</head>
<body>
<div class="page">
    <section class="brand">
        <small>ADMINISTRATION SYSTEM</small>
        <h1>CARTIERA</h1>
        <p>Kelola profil perusahaan, artikel, produk atau layanan, kontak, gambar, dan laporan melalui satu dashboard.</p>
    </section>
    <section class="login">
        <div class="card">
            <h2>Login Administrator</h2>
            <p class="muted">Masukkan akun admin untuk melanjutkan.</p>
            @if(session('success'))<div class="alert success">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert">{{ session('error') }}</div>@endif
            @if($errors->any())<div class="alert">{{ $errors->first() }}</div>@endif
            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf
                <div class="field"><label for="username">Username</label><input id="username" name="username" value="{{ old('username') }}" autocomplete="username" autofocus required></div>
                <div class="field"><label for="password">Password</label><input id="password" name="password" type="password" autocomplete="current-password" required></div>
                <button class="btn" type="submit">Login ke Dashboard</button>
            </form>
            <div class="hint"><strong>Akun demo</strong><br>Username: admin<br>Password: Cartiera123!</div>
        </div>
    </section>
</div>
</body>
</html>

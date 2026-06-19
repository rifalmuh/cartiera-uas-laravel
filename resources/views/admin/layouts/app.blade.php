<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - Cartiera</title>
    <style>
        :root{--ink:#191916;--gold:#b18a4b;--paper:#f4f2ed;--line:#ddd8ce;--red:#aa3030}*{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;background:var(--paper);color:#252522}.shell{display:grid;grid-template-columns:250px 1fr;min-height:100vh}.sidebar{background:var(--ink);color:#fff;padding:28px 18px;position:sticky;top:0;height:100vh}.logo{font:700 27px Georgia,serif;letter-spacing:3px;padding:6px 12px 26px}.logo small{display:block;font:10px Arial,sans-serif;letter-spacing:2px;color:#c9a96e;margin-top:6px}.nav-title{font-size:10px;color:#888;text-transform:uppercase;letter-spacing:2px;margin:20px 12px 8px}.nav a{display:block;color:#d7d7d2;text-decoration:none;padding:12px;border-radius:8px;margin:4px 0}.nav a:hover,.nav a.active{background:#ffffff14;color:#fff}.content{min-width:0}.topbar{height:72px;background:#fff;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;padding:0 32px}.topbar strong{font-size:14px}.topbar form{margin:0}.logout{border:1px solid var(--line);background:#fff;padding:9px 13px;border-radius:8px;cursor:pointer}.main{padding:30px;max-width:1400px}.heading{display:flex;align-items:center;justify-content:space-between;gap:15px;margin-bottom:22px}.heading h1{font:700 30px Georgia,serif;margin:0}.heading p{margin:6px 0 0;color:#777}.btn{display:inline-block;border:0;border-radius:8px;padding:11px 15px;background:var(--ink);color:#fff;text-decoration:none;font-weight:700;font-size:13px;cursor:pointer}.btn.gold{background:var(--gold)}.btn.light{background:#fff;color:#333;border:1px solid var(--line)}.btn.red{background:var(--red)}.alert{padding:14px 16px;border-radius:9px;margin-bottom:20px;background:#e8f6ed;color:#176b35;border:1px solid #bfe1ca}.alert.error{background:#fff0f0;color:#922;border-color:#efc3c3}.card{background:#fff;border:1px solid var(--line);border-radius:12px;box-shadow:0 4px 16px #2221;overflow:hidden}.card-body{padding:22px}.table-wrap{overflow:auto}table{border-collapse:collapse;width:100%}th,td{text-align:left;padding:14px 16px;border-bottom:1px solid #eee;vertical-align:middle}th{font-size:11px;text-transform:uppercase;letter-spacing:1px;color:#777;background:#faf9f6}td{font-size:14px}.thumb{width:70px;height:52px;object-fit:cover;border-radius:7px;background:#eee}.actions{display:flex;gap:7px}.actions form{margin:0}.empty{text-align:center;padding:50px;color:#888}.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}.field.full{grid-column:1/-1}.field label{display:block;font-weight:700;font-size:13px;margin-bottom:8px}.field input,.field textarea{width:100%;padding:12px;border:1px solid var(--line);border-radius:8px;font:inherit}.field textarea{min-height:150px;resize:vertical}.invalid{color:#a22;font-size:12px;margin-top:5px}.preview{max-width:220px;max-height:150px;border-radius:9px;margin-top:10px}.form-actions{display:flex;gap:10px;margin-top:22px}.pagination{padding:18px}.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px}.stat{padding:23px;background:#fff;border:1px solid var(--line);border-radius:12px}.stat span{color:#777;font-size:13px}.stat strong{display:block;font:700 34px Georgia,serif;margin-top:10px}.two-col{display:grid;grid-template-columns:1.4fr .6fr;gap:20px}@media(max-width:900px){.shell{grid-template-columns:1fr}.sidebar{height:auto;position:static}.nav{display:flex;flex-wrap:wrap}.nav-title{display:none}.content{}.stats{grid-template-columns:1fr 1fr}.two-col{grid-template-columns:1fr}}@media(max-width:600px){.main,.topbar{padding:20px}.form-grid,.stats{grid-template-columns:1fr}.field.full{grid-column:auto}.heading{align-items:flex-start;flex-direction:column}}
    </style>
</head>
<body>
<div class="shell">
    <aside class="sidebar">
        <div class="logo">CARTIERA<small>ADMIN PANEL</small></div>
        <nav class="nav">
            <div class="nav-title">Utama</div>
            <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <div class="nav-title">Kelola Konten</div>
            <a class="{{ request()->routeIs('admin.companies.*') ? 'active' : '' }}" href="{{ route('admin.companies.index') }}">Profil Perusahaan</a>
            <a class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}" href="{{ route('admin.articles.index') }}">Artikel / Berita</a>
            <a class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">Produk / Layanan</a>
            <a class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">Kontak</a>
            <div class="nav-title">Website</div><a href="{{ route('home') }}" target="_blank">Lihat Website Publik</a>
        </nav>
    </aside>
    <section class="content">
        <header class="topbar"><strong>{{ session('admin_name', 'Administrator') }}</strong><form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="logout" type="submit">Logout</button></form></header>
        <main class="main">
            @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert error">{{ session('error') }}</div>@endif
            @yield('content')
        </main>
    </section>
</div>
</body>
</html>

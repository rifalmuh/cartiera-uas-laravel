@if($errors->any())<div class="alert error"><strong>Data belum dapat disimpan.</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

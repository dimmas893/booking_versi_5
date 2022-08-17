<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Booking Kamar Hotel</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="/dist/css/adminlte.min.css?v=3.2.0">
<script nonce="a99f7dd9-f7ad-4af3-864f-7ae257c6f951">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{};a.zarazData.executed=[];a.zaraz={deferred:[]};a.zaraz.q=[];a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text);a.zarazData.x=Math.random();a.zarazData.w=a.screen.width;a.zarazData.h=a.screen.height;a.zarazData.j=a.innerHeight;a.zarazData.e=a.innerWidth;a.zarazData.l=a.location.href;a.zarazData.r=e.referrer;a.zarazData.k=a.screen.colorDepth;a.zarazData.n=e.characterSet;a.zarazData.o=(new Date).getTimezoneOffset();a.zarazData.q=[];for(;a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin";z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData)));t.parentNode.insertBefore(z,t)};["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
<div class="container">
<a href="/index3.html" class="navbar-brand">
<img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
<span class="brand-text font-weight-light">Booking Kamar Hotel</span>
</a>
<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse order-3" id="navbarCollapse">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
</li>
                                
</ul>

<form class="form-inline ml-0 ml-md-3">
<div class="input-group input-group-sm">
<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</form>
</div>

<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

</ul>
</div>
</nav>

<aside class="control-sidebar control-sidebar-dark">

</aside>

    <div class="container">
      <h1>Daftar Transaksi</h1>
                    @foreach ($booking as $channel)
                        <div class="col-12">
                            <div>  
                                <div class="card-body">
                                    <table class="table table-bordered table-hover">
                                    <thead>
                                        <th>NAME</th>
                                        <th>KAMAR</th>
                                        <th>JUMLAH KAMAR</th>
                                        <th>TAGIHAN</th>
                                        <th>BUKTI BAYAR</th>
                                        <th>STATUS</th>
                                        <th>TANGGAL</th>
                                        <th>ACTION</th>
                                    </thead>
                                    <tbody>
                                        <td>{{ $channel->user->name }}</td>
                                        <td>{{ $channel->products->name }}</td>
                                        <td>{{ $channel->jumlah }}</td>
                                        <td>{{ $channel->tagihan }}</td>
                                        <td><img src="{{ asset('storage/'.$channel->bukti_bayar) }}" class="img-fluid" width="50px"></td>
                                        <td>{{ $channel->status->name }}</td>
                                        <td>{{ $channel->tanggal }}</td>
                                        <td>
                                            @if ($channel->status_id == 2)
                                                    @if ($channel->bukti_bayar == null)
                                                        <a href="{{ route('edit_bukti_bayar', ['id' => $channel->id]) }}" class="btn btn-success">
                                                            Bayar
                                                        </a>
                                                    @endif          
                                            @endif

                                            @if ($channel->status_id == 4)
                                                <a href="{{ route('invoice', ['id' => $channel->id]) }}" class="btn btn-success">
                                                    Dapatkan Nomor invoice
                                                </a>
                                            @endif
                                        </td>
                                    </tbody>
                                </table>
                                </div>
                            </div>






                        </div>
                    @endforeach
    </div>


</div>



<script src="/plugins/jquery/jquery.min.js"></script>

<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="/dist/js/demo.js"></script>
</body>
</html>

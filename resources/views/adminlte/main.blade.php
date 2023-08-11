<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tirta Danu Arta | Admin Panel</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="/plugins/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <link rel="stylesheet" href="/plugins/adminlte/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="/plugins/adminlte/plugins/summernote/summernote-bs4.min.css">

        <script nonce="e5f5615e-7b13-48f6-8c06-6f44ce727af4">(function(w,d){!function(bt,bu,bv,bw){bt[bv]=bt[bv]||{};bt[bv].executed=[];bt.zaraz={deferred:[],listeners:[]};bt.zaraz.q=[];bt.zaraz._f=function(bx){return function(){var by=Array.prototype.slice.call(arguments);bt.zaraz.q.push({m:bx,a:by})}};for(const bz of["track","set","debug"])bt.zaraz[bz]=bt.zaraz._f(bz);bt.zaraz.init=()=>{var bA=bu.getElementsByTagName(bw)[0],bB=bu.createElement(bw),bC=bu.getElementsByTagName("title")[0];bC&&(bt[bv].t=bu.getElementsByTagName("title")[0].text);bt[bv].x=Math.random();bt[bv].w=bt.screen.width;bt[bv].h=bt.screen.height;bt[bv].j=bt.innerHeight;bt[bv].e=bt.innerWidth;bt[bv].l=bt.location.href;bt[bv].r=bu.referrer;bt[bv].k=bt.screen.colorDepth;bt[bv].n=bu.characterSet;bt[bv].o=(new Date).getTimezoneOffset();if(bt.dataLayer)for(const bG of Object.entries(Object.entries(dataLayer).reduce(((bH,bI)=>({...bH[1],...bI[1]})),{})))zaraz.set(bG[0],bG[1],{scope:"page"});bt[bv].q=[];for(;bt.zaraz.q.length;){const bJ=bt.zaraz.q.shift();bt[bv].q.push(bJ)}bB.defer=!0;for(const bK of[localStorage,sessionStorage])Object.keys(bK||{}).filter((bM=>bM.startsWith("_zaraz_"))).forEach((bL=>{try{bt[bv]["z_"+bL.slice(7)]=JSON.parse(bK.getItem(bL))}catch{bt[bv]["z_"+bL.slice(7)]=bK.getItem(bL)}}));bB.referrerPolicy="origin";bB.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bt[bv])));bA.parentNode.insertBefore(bB,bA)};["complete","interactive"].includes(bu.readyState)?zaraz.init():bt.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>
        @section('style')
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a onclick="return confirm('Yakin ingin logout')" href="{{ route('logout') }}" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="index3.html" class="brand-link">
                    <img src="/img/danuarta.jpg" alt="Tirta Danu Arta Logo" class="brand-image elevation-3" style="opacity: .8; border-radius: 1vmin;">
                    <span class="brand-text font-weight-light">Tirta Danu Arta</span>
                </a>

                <div class="sidebar">

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link {{ str_contains(Request::path(), 'admin/dashboard') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('profil') }}" class="nav-link {{ str_contains(Request::path(), 'admin/profil') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profil
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kecamatan') }}" class="nav-link {{ str_contains(Request::path(), 'admin/kecamatan') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-map-marker-alt"></i>
                                    <p>
                                       Kecamatan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelurahan') }}" class="nav-link {{ str_contains(Request::path(), 'admin/kelurahan') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-thumbtack"></i>
                                    <p>
                                      Kelurahan
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('area') }}" class="nav-link {{ str_contains(Request::path(), 'admin/area') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-map-pin"></i>
                                    <p>
                                        Area
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('pelanggan') }}" class="nav-link {{ str_contains(Request::path(), 'admin/pelanggan') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        Pelanggan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pegawai') }}" class="nav-link {{ str_contains(Request::path(), 'admin/pegawai') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-tie"></i>
                                    <p>
                                        Pegawai
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user') }}" class="nav-link {{ str_contains(Request::path(), 'admin/user') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-lock"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('rekening') }}" class="nav-link {{ str_contains(Request::path(), 'admin/rekening') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-id-card"></i>
                                    <p>
                                        Rekening
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pengaduan') }}" class="nav-link {{ str_contains(Request::path(), 'admin/pengaduan') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-comment-alt"></i>
                                    <p>
                                        Pengaduan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pengumuman') }}" class="nav-link {{ str_contains(Request::path(), 'admin/pengumuman') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-newspaper"></i>
                                    <p>
                                       Pengumuman
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('baca-meter-mandiri') }}" class="nav-link {{ str_contains(Request::path(), 'admin/baca-meter-mandiri') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tint"></i>
                                    <p>
                                        Baca Meter Mandiri
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">

                @yield('content')
            </div>


            <aside class="control-sidebar control-sidebar-dark">
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>


            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline">
                    Tirta Danu Arta
                </div>

                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
        </div>

        <script src="/plugins/adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="/plugins/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/plugins/adminlte/dist/js/adminlte.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="/plugins/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
        @yield('script')
    </body>
</html>


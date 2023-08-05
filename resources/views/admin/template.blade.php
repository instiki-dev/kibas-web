<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE-Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <link rel="stylesheet" type="text/css" href="/style/main.css">

        @yield('style')
    </head>
    <body class="w-100 pt-3 pb-3 d-flex justify-content-end">
        <div class="bar h-100 ml-2 mr-3 d-flex justify-content-start align-items-center p-3">
            <img src="/img/logo.png">
            <ul class="mt-3 w-100" id="menuOption">
                <li id="clsWrapper">
                    <div id="btnClose">
                        <ion-icon class="close-menu" name="close-outline"></ion-icon>
                    </div>
                </li>
                <li><a href="{{ route('profil') }}" class="{{ str_contains(Request::path(), 'admin/profil') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="id-card-outline"></ion-icon>Profil</a></li>
                <li><a href="{{ route('pelanggan') }}" class="{{ str_contains(Request::path(), 'admin/pelanggan') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="person-outline"></ion-icon>Pelanggan</a></li>
                <li><a href="{{ route('pegawai') }}" class="{{ str_contains(Request::path(), 'admin/pegawai') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="briefcase-outline"></ion-icon>Pegawai</a></li>
                <li><a href="{{ route('golongan') }}" class="{{ str_contains(Request::path(), 'admin/golongan') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="layers-outline"></ion-icon>Golongan</a></li>
                <li><a href="{{ route('user') }}" class="{{ str_contains(Request::path(), 'admin/user') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="people-outline"></ion-icon>User</a></li>
                <li><a href="{{ route('kecamatan') }}" class="{{ str_contains(Request::path(), 'admin/kecamatan') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="location-outline"></ion-icon>Kecamatan</a></li>
                <li><a href="{{ route('kelurahan') }}" class="{{ str_contains(Request::path(), 'admin/kelurahan') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="compass-outline"></ion-icon>Kelurahan</a></li>
                <li><a href="{{ route('area') }}" class="{{ str_contains(Request::path(), 'admin/area') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="locate-outline"></ion-icon>Area</a></li>
                <li><a href="{{ route('rekening') }}" class="{{ str_contains(Request::path(), 'admin/rekening') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="document-text-outline"></ion-icon>Rekening</a></li>
                <li><a href="{{ route('pengaduan') }}" class="{{ str_contains(Request::path(), 'admin/pengaduan') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="chatbubble-outline"></ion-icon>Pengaduan</a></li>
                <li><a href="{{ route('tagihan') }}" class="{{ str_contains(Request::path(), 'admin/tagihan') ? 'selected' : '' }} p-2"><ion-icon class="mr-2" name="cash-outline"></ion-icon>Tagihan</a></li>
            </ul>
            <div class="menu">
                <div class="d-flex align-items-center" id="btnMenu">
                    <ion-icon id="Burger" name="menu-outline"></ion-icon>
                    <ion-icon class="close-menu" id="Close" name="close-outline"></ion-icon>
                </div>
            </div>
        </div>

        <div class="content h-100">
            @yield('content')
        </div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="/js/script.js"></script>

        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
        @yield('script')
    </body>
</html>

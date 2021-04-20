<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cotação</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminx.css') }}" media="screen" />

    <!--
      # Optional Resources
      Feel free to delete these if you don't need them in your project
    -->
</head>

<body>
    <div class="adminx-container">
        <nav class="navbar navbar-expand justify-content-between fixed-top">
            <a class="navbar-brand mb-0 h1 d-none d-md-block" href="index.html">
                <img src="{{ asset('img/logo.png') }}" class="navbar-brand-image d-inline-block align-top mr-2"
                    alt="">
                Cotação online
            </a>

            <div class="d-flex flex-1 d-block d-md-none">
                <a href="#" class="sidebar-toggle ml-3">
                    <i data-feather="menu"></i>
                </a>
            </div>

            <ul class="navbar-nav d-flex justify-content-end mr-2">
                <!-- Notificatoins -->
                <li class="nav-item dropdown d-flex align-items-center mr-2">
                    <a class="nav-link nav-link-notifications" id="dropdownNotifications" data-toggle="dropdown"
                        href="#">
                        <i class="oi oi-bell display-inline-block align-middle"></i>
                        {{-- <span class="nav-link-notification-number">{{ count($money) }}</span> --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-notifications"
                        aria-labelledby="dropdownNotifications">
                        <div class="notifications-header d-flex justify-content-between align-items-center">
                            <span class="notifications-header-title">
                                Notificações
                            </span>
                        </div>

                        <div class="list-group">
                            @if (isset($money))
                                @foreach ($money as $item)
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <p class="mb-1"><strong
                                                class="text-success">{{ $item['code'] }}-{{ $item['name'] }}</strong><br />
                                            cotação :
                                            R$:{{ $item['high'] }}
                                        </p>
                                        <small>{{ date('d/m/Y', strtotime($item['create_date'])) }}</small>
                                    </a>
                                @endforeach
                            @endif
                        </div>

                        <div class="notifications-footer text-center">
                            <a href="#"><small>Todas as notificações</small></a>
                        </div>
                    </div>
                </li>
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
                        <img src="{{ asset('img/perfil.jpg') }}" class="d-inline-block align-top" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a class="ml-3" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sair
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- expand-hover push -->
        <!-- Sidebar -->
        <div class="adminx-sidebar expand-hover push">
            <ul class="sidebar-nav">
                <li class="sidebar-nav-item">
                    <a href="{{ route('users') }}" class="sidebar-nav-link">
                        <span class="sidebar-nav-icon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="sidebar-nav-name">
                            Usuarios
                        </span>
                        <span class="sidebar-nav-end">
                        </span>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="{{ route('coin') }}" class="sidebar-nav-link">
                        <span class="sidebar-nav-icon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="sidebar-nav-name">
                            Cotação
                        </span>
                        <span class="sidebar-nav-end">

                        </span>
                    </a>
                </li>
            </ul>
            </li>
            </ul>
        </div><!-- Sidebar End -->

        <!-- adminx-content-aside -->
        <div class="adminx-content">
            <!-- <div class="adminx-aside">

        </div> -->

            <div class="adminx-main-content">
                <div class="container-fluid">
                    <!-- BreadCrumb -->
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    {{-- <script src="../js/vendor.js"></script>
    <script src="../js/adminx.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#update').click(function() {
                location.reload();
            })
            $("#money").change(function(event) {
                console.log($(this).val() + '-BRL');
                $.ajax({
                    url: '{{ route('search') }}',
                    method: "get",
                    data: {
                        coin: $(this).val() + '-BRL'
                    },
                    success: function(data) {
                        let value = $.map(data, function(u) {
                            return u.high;
                        });
                        $('#brl').text('BRL: R$:' + value + '')

                    },

                })
            })
        })

    </script>

</body>

</html>

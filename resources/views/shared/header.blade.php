<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />

        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,600"
            rel="stylesheet"
        />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img
                    src="https://appmax.com.br/assets/img/Logo_Appmax_curvas-01.svg"
                    width="100"
                    height="30"
                    class="d-inline-block align-top"
                    alt=""
                />
            </a>
            @auth
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item {{(Request::is('/home') ? 'active' : null)}}">
                    <a class="nav-link" href="/home">Home</a>
                  </li>

                  <li class="nav-item {{(Request::is('/report') ? 'active' : null)}}">
                    <a class="nav-link" href="/product/report">Relatório</a>
                  </li>
                </ul>
            </div>
            <form class="form-inline">
                <span class="navbar-text">
                    Olá, <span class="font-weight-bold">{{Auth::user()->name}}</span>
                </span>

                <a type="button" href="{{action('AuthController@logout')}}" class="btn btn-link">Sair</a>
            </form>
            @endauth
        </nav>

         <div class="d-flex pt-4 place-center flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <div class="w-50 alert alert-error alert-{{ $msg }} alert-dismissible fade show" role="alert">
                    {{ Session::get('alert-' . $msg) }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            @endforeach
        </div>

        <div class="d-flex pt-4 place-center flash-message">
            @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="w-50 alert alert-error alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
            @endif
        </div>
    </body>

    <script
    src="https://code.jquery.com/jquery-3.5.0.min.js"
    integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
    crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>

<script>
    /** Fecha os alertas após 5 segundos. */
    $(document).ready(function () {
        setTimeout(function () {
            $(".alert-error").alert('close');
        }, 5000);
    });
</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat:400,400i,700,700i|Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/muro2.css') }}">
  <link rel="stylesheet" href="{{ asset('css/posteo.css') }}">
  <script src="{{ asset('js/profile.js') }}"></script>
    <title>Buscador</title>
</head>
<body>
    @include('partials.navbar')
    <section class="mt-5 section">
        <div class="container-fluid pt-5">
            <div class="row p-0 m-0 bg-white rounded home-row-main d-flex d-flex justify-content-around">
                <div class="col-12 p-0 top-muro-image d-flex align-items-center justify-content-center">
                @foreach($user as $u)
                    <h1 class="font-weight-bold text-center">{{ $u['name'] }} {{ $u['lastname']}} </h1>
                </div>
                @endforeach

                @foreach($user as $u)
                    <?php 
                      $photo    = $u['src']; 
                      $name     = $u['name'];
                      $lastname = $u['lastname'];  
                    ?>
                 <div class="col-12 pt-4 col-md-4 col-lg-3 ml-lg-2 d-flex flex-column justify-content-flex-start align-items-center">
                    <div class="row w-100 pt-2">
                        <ul class="d-block list-unstyled w-100 py-4 border rounded shadow-perfil">
                            <li class="text-center">
                                <img src="{{ asset('images').'/'.$photo }}" alt="" style="max-width: 150px;" class="border rounded-circle" src="" alt="" id="foto-perfil">
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach

            <!-- POSTEO HTML -->
            <article id="publicaciones" style="width: 100%;">
            @if($respuesta === 'No hay post papa')
                <div class="alert alert-danger mt-5 col-12" role="alert">
                    <h1 style="font-weight: bold;">El usuario no posteo nada )':</h1>
                </div>
            @else
                @foreach($respuesta as $key)
                    <div class="col-12 p-10 pt-4">
                        <div class="articulo_post">
                            <div class="posteos_card">
                                <div class="datos_post">
                                    <img style="max-width: 30px;" class="border rounded-circle" src="{{ asset('images').'/'.$photo }}?>" alt="" id="foto-perfil">
                                    <p> {{$name}} {{$lastname}}</p>
                                </div>
                                <div class="contenido_post">
                                    <p>{{$key['post']}}</p>
                                </div>
                            <div class="post_interaccion">
                                <div class="form_interaccion">
                                    <form method="post"  name="interaccion">
                                        @csrf
                                        <label name="cantidad_mg">{{App\Like::bringLike($key['post_id'])}}</label>
                                            @if(App\Like::existLike($key['user_id'], $key['post_id']) == 1)
                                                <label for="no_gusta{{ $key['post_id'] }}" class="no_gusta" onclick="color = black" style="color: red;">No me gusta</label>
                                            @else
                                                <label for="me_gusta{{ $key['post_id'] }}">Me gusta</label>
                                            @endif
                                            <input type="hidden" value="{{$key['user_id']}}" name="user_id">
                                            <input type="hidden" value="{{$key['post_id']}}" name="post_id">
                                            <button type="submit" id="me_gusta{{ $key['post_id'] }}" hidden>
                                    </form>
                                </div>
                                <div class="form_interaccion">
                                    <label for="comentar">Comentar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </article>
        @endif
        </div>
    </div>
</div>
</section>
    @include('partials.footer')
</body>
</html>
@auth
<script>
    window.location.href = '/home'
</script>
@endauth

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('shared.header')

    <body>
        <div class="d-flex mt-5 place-center">
            <div class="w-50 card">
                <div class="card-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <span class="font-weight-bold">{{ $error }}</span>
                        </div>
                        @endforeach
                    @endif

                    <h4 class="text-center">Cadastrar-se</h4>

                    <form
                        class="mt-4"
                        action="{{ url('/user') }}"
                        method="post"
                    >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nome</label>
                            <input
                                required
                                name="name"
                                type="text"
                                class="form-control"
                                placeholder="Seu nome"
                            />
                        </div>
                        <div class="form-group">
                            <label>Usuário</label>
                            <input
                                required
                                name="user"
                                type="text"
                                class="form-control"
                                placeholder="Seu usuário"
                            />
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input
                                required
                                name="password"
                                type="password"
                                class="form-control"
                                placeholder="Sua senha"
                            />
                        </div>
                        <div class="form-group">
                            <small><a href="/">Já sou cadastrado</a></small>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Cadastrar-se
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

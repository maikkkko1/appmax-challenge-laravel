@auth
<script>
    window.location.href = '/home'
</script>
@endauth

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('shared.header')

    <body>
        <div class="d-flex mt-3 place-center">
            <div class="w-50 card">
                <div class="card-body">
                    <h4 class="text-center">Realizar login</h4>

                    <form
                        class="mt-4"
                        action="{{ url('/signin') }}"
                        method="post"
                    >
                        {{ csrf_field() }}
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
                            <small><a href="/signup">Cadastrar-se</a></small>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Entrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

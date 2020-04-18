
<!DOCTYPE html><html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('shared.header')
<body>
    <div class="container d-flex mt-3 place-center flex-column">
        <div>
            <h3>Relatório de produtos</h3>
        </div>

        <div class="mt-3">
            <div class="mt-4">
                <form id="reportFilterForm" action="" method="GET">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Filtrar por dia</label>
                        <div class="col-6">
                            <input class="form-control" required name="day" type="date">
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </form>
            </div>

            <span>Total adicionados: <span class="font-weight-bold text-success">{{$report['total_added']}}</span></span>
            <br>
            <span>Total removidos: <span class="font-weight-bold text-danger">{{$report['total_deleted']}}</span></span>

            <p class="font-weight-bold text-center">
                Resultados referentes ao dia: {{$report['filter_date']}}
            </p>

            @if (count($report['products']) == 0)
            <h5 class="mt-4">Nenhum produto encontrado.</h5>
            @endif

            @if (count($report['products']) > 0)
            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Título</th>
                        <th scope="col">Status</th>
                        <th scope="col">Status estoque</th>
                        <th scope="col">Via API</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report['products'] as $product)
                        <tr>
                            <th scope="row">{{$product['id']}}</th>
                            <td>{{$product['sku']}}</td>
                            <td>{{$product['title']}}</td>

                            <td>
                                @if ($product['deleted_at'])
                                    <span class="badge badge-pill badge-danger">REMOVIDO</span>
                                @else
                                    <span class="badge badge-pill badge-success">ADICIONADO</span>
                                @endif
                            </td>

                            <td>
                                @if ($product['quantity'] < 100)
                                    <span class="badge badge-pill badge-danger">BAIXO</span>
                                @else
                                    <span class="badge badge-pill badge-success">NORMAL</span>
                                @endif
                            </td>

                            <td>
                                @if ($product['use_api'])
                                    <span class="badge badge-pill badge-success">SIM</span>
                                @else
                                    <span class="badge badge-pill badge-danger">NÃO</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>

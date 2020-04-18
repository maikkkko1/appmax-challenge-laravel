
<!DOCTYPE html><html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('shared.header')
<body>
    <div class="container d-flex mt-3 place-center flex-column">
        <div>
            <h3>Listagem de produtos</h3>
        </div>

        <div class="mt-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newProductModal">Adicionar produto</button>
            @if (count($products) == 0)
            <h5 class="mt-4">Nenhum produto cadastrado.</h5>
            @endif

            @if (count($products) > 0)
            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Via API</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{$product['id']}}</th>
                            <td>{{$product['sku']}}</td>
                            <td>{{$product['title']}}</td>

                            <!-- Quebra o texto se for muito grande e mostra por inteiro no title. -->
                            <td title="{{$product['description']}}">{{
                                strlen($product['description']) >= 30 ?
                                substr($product['description'], 0, 30) . '...'
                                : $product['description']
                            }}</td>

                            <td>{{$product['quantity']}}</td>
                            <td>{{$product['price']}}</td>
                            <td>
                                @if ($product['use_api'])
                                    <span class="badge badge-pill badge-success">Sim</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Não</span>
                                @endif
                            </td>
                            <td>
                                <i title="Editar produto" class="fa fa-pencil-square-o cursor-pointer" data-product="{{$product}}"
                                data-toggle="modal" data-target="#editProductModal"></i>
                            </td>
                            <td>
                                <i title="Baixar produto" class="fa fa-arrow-circle-o-down cursor-pointer" data-product="{{$product}}"
                                data-toggle="modal" data-target="#downProductModal"></i>
                            </td>
                            <td>
                                <i title="Remover produto" class="fa fa-times cursor-pointer" data-idproduct="{{$product['id']}}"
                                data-toggle="modal" data-target="#deleteProductModal"></i>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    @include('home.edit-product-modal')
    @include('home.new-product-modal')
    @include('home.delete-product-modal')
    @include('home.down-product-modal')
    </body>
</html>

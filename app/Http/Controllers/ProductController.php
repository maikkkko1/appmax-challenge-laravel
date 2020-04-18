<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller {
    private $productService;

    public function __construct() {
        $this->productService = new ProductService();
    }

    public function create(ProductCreateRequest $request) {
        $request->validated();

        $this->productService->create($request->all());

        if ($request->use_api) {
            return response()->json([
                'error' => false,
                'result' => true
            ], 201);
        }

        return redirect('/home')->with('alert-success', 'Produto cadastrado com sucesso!');
    }

    public function createApi(Request $request) {
        $request['use_api'] = true;

        $this->productService->create($request->all());

        return response()->json([
            'error' => false,
            'result' => true
        ], 201);
    }

    public function getAll() {
        $products = $this->productService->getAll();

        return view('home.index')->with('products', $products);
    }

    public function update(ProductUpdateRequest $request, $id) {
        $request->validated();

        $update = $this->productService->update($request->all(), $id);

        if (!$update) {
            return redirect('/home')->with('alert-danger', 'Falha ao atualizar produto!');
        }

        return redirect('/home')->with('alert-success', 'Produto alterado com sucesso!');
    }

    public function deleteApi($id) {
        $delete = $this->productService->delete($id, true);

        if (!$delete) {
            return response()->json([
                'error' => true,
                'message' => 'Falha ao remover produto!',
                'result' => false
            ], 500);
        }

        return response()->json([
            'error' => false,
            'result' => true
        ], 200);
    }

    public function delete($id) {
        $delete = $this->productService->delete($id);

        if (!$delete) {
            return redirect('/home')->with('alert-danger', 'Falha ao remover produto!');
        }

        return redirect('/home')->with('alert-success', 'Produto removido com sucesso!');
    }

    public function downProduct(Request $request, $id) {
        if (!$request->downQuantity) {
            return redirect('/home')->with('alert-danger', 'Quantidade para baixa inválida!');
        }

        $down = $this->productService->downProduct($request->downQuantity, $id);

        if (!$down) {
            return redirect('/home')->with('alert-danger', 'Falha ao baixar produto!');
        }

        return redirect('/home')->with('alert-success', 'Produto baixado com sucesso!');
    }

    public function getReport(Request $request) {
        $report = $this->productService->getReport($request->day);

        return view('report.index')->with('report', $report);
    }
}

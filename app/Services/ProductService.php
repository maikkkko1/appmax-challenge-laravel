<?php
namespace App\Services;

use App\Product;
use Illuminate\Support\Facades\DB;

class ProductService {
    public function create($data) {
        return Product::create($data);
    }

    public function getAll() {
        return Product::orderBy('created_at', 'DESC')->get();
    }

    public function update($data, $id) {
        $find = Product::where('id', $id)->first();

        if (!$find) return false;

        return $find->update($data);
    }

    public function delete($id, $api = false) {
        $find = Product::where('id', $id)->first();

        if (!$find) return false;

        if ($api) {
            $find->update(['use_api' => true]);
        }

        return $find->delete();
    }

    public function downProduct($quantity, $id) {
        $find = Product::where('id', $id)->first();

        if (!$find) return false;

        if ($find['quantity'] < $quantity) return false;

        $newQuantity = $find['quantity'] - $quantity;

        return $find->update(['quantity' => $newQuantity]);
    }

    /**
     * Retorna os dados do relatório diário.
     * @param $day - Dia para filtrar, se não passado nada vai pegar do dia corrente.
     */
    public function getReport($day = null) {
        $filter = $day ?: date('Y-m-d');

        $available = Product::whereDate('created_at', '=', $filter)->get()->toArray();
        $deleted = Product::withTrashed()->whereDate('deleted_at', '=', $filter)->get()->toArray();

        $products = array_merge($available, $deleted);

        return [
            'products' => $products,
            'total_added' => count($available),
            'total_deleted' => count($deleted),
            'filter_date' => date('d/m/Y', strtotime($filter))
        ];
    }
}

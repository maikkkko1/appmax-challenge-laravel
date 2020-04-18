<?php
namespace App\Services;

use App\Product;

class ProductService {
    public function create($data) {
        return Product::create($data);
    }

    public function getAll() {
        return Product::orderBy('created_at')->get();
    }

    public function update($data, $id) {
        $find = Product::where('id', $id)->first();

        if (!$find) return false;

        return $find->update($data);
    }

    public function delete($id) {
        $find = Product::where('id', $id)->first();

        if (!$find) return false;

        return $find->delete();
    }

    public function downProduct($quantity, $id) {
        $find = Product::where('id', $id)->first();

        if (!$find) return false;

        if ($find['quantity'] < $quantity) return false;

        $newQuantity = $find['quantity'] - $quantity;

        return $find->update(['quantity' => $newQuantity]);
    }
}

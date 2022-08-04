<?php

namespace App\Service;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function update($data, $product)
    {
        try {
            DB::beginTransaction();




            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $product;
    }
}

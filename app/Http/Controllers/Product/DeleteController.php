<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
            $product->delete();

            return redirect()->route('product.index');
    }
}

<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{


    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        if (isset($data['preview_image'])) {

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $product->update($data);
        $product->tags()->sync($tagsIds);
        $product->colors()->sync($colorsIds);

        return view('product.show', compact('product'));
    }
}

<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class ProductsExport implements FromView, ShouldAutoSize
{
    public function __construct(array $ids) {
    	$this->ids = $ids;
    }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Product::findOrFail($this->ids);
    // }

    public function view(): View
    {
        if (empty($this->ids)) {
            return view(
                'product.export', [
                    'products' => Product::with('category')->get(),
                ],
            );
        }
        
        return view(
            'product.export', [
                'products' => Product::whereIn('id', $this->ids)->with('category')->get(),
            ],
        );
    }
}

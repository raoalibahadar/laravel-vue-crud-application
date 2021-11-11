<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return $products;
    }

    public function store(Request $request)
    {
        $product = new Product([
            'title' => $request->input('product_title'),
            'description' => $request->input('product_desc'),
            'price' => $request->input('product_price')
        ]);
        $product->save();

        return response()->json('Product created!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return response()->json('Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json('Product deleted!');
    }
    public function exportProduct(Request $request)
    {

        $data = Product::all()->toArray();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Product Title');
        $sheet->setCellValue('B1', 'Product Description');
        $sheet->setCellValue('C1', 'Product Price');
        $rows = 2;


        foreach($data as $dataKey){

            $sheet->setCellValue('A' . $rows, $dataKey['title']);
            $sheet->setCellValue('B' . $rows, $dataKey['description']);
            $sheet->setCellValue('C' . $rows, $dataKey['price']);
            $rows++;
        }



        $type='csv';
        $nameString = 'products'.date('ymdhsi').'.';
        $fileName=$nameString.$type;
        $writer = new Csv($spreadsheet);

        $writer->save("export/".$fileName);
        header("Content-Type: application/vnd.ms-excel");
        $url =  url('/')."/export/".$fileName;

        return response()->json($url);
    }
}

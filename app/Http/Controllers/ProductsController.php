<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProductModel::all();
        return response()->json(['product' => $products]);
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validasi input data
        $validatedData = $request->validate([
            'product_name' => 'required|string',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);


        $product = ProductModel::create($validatedData);

        if ($product) {
            return response()->json(['message' => 'Produk berhasil disimpan', 'product' => $product], 201);
        } else {
            return response()->json(['message' => 'Gagal menyimpan produk'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = ProductModel::find($id);
        if ($product) {
            return response()->json(['product' => $product]);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
        $product = ProductModel::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
        $product->update($validatedData);
        return response()->json(['message' => 'Produk berhasil diupdate', 'product' =>
        $product]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = ProductModel::find($id);

        if (!$product) {
            return response()->json(
                ['message' => 'Produk tidak ditemukan'],
                404
            );
        }
        $product->delete();
        return response()->json(['message' => 'Produk berhasil dihapus']);
    }

    public function restore($id)
    {
        $product = ProductModel::withTrashed()->find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
    
        $product->restore();
    
        return response()->json(['message' => 'Produk berhasil di restore']);
    }
    
}


// Bagaimana kita bisa menambahkan validasi input data di dalam store() method untuk memastikan data produk yang disimpan valid?
// apa itu return json
// Mengapa kita menggunakan delete() method untuk menghapus produk dalam method destroy()? Apakah ada alternatif metode penghapusan yang mungkin lebih baik dalam konteks ini?
// aturan khusus dalam penulisan kode untuk api 
// Apa perbedaan antara menggunakan metode find() dan findOrFail() dalam show() method? Kapan kita harus menggunakan masing-masing metode?
// Apakah Anda merekomendasikan penggunaan metode HTTP yang berbeda seperti POST, PUT, atau DELETE untuk operasi CRUD yang sesuai dalam API ini? 
// Apakah jika memiliki rencana untuk menambahkan paginasi atau filterisasi data ke dalam API ini untuk mengelola jumlah besar data produk ada metode khusus nya?
// Apakah ada manfaat dalam menggunakan format respon khusus seperti JSON dalam API ini dibandingkan dengan format respon lainnya seperti XML 

// buat store validate, soft delete, restore, tes api nya, routing dan resorusce
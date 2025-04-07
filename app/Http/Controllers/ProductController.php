<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Milon\Barcode\BarcodeGenerator;
use Picqer\Barcode\BarcodeGeneratorPNG;

class ProductController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'nowe')->get();
        return view('products.index', compact('orders'));
    }
    public function productProcess($id)
    {
        $order = Order::with('client')->findOrFail($id);
        return view('products.productProcess', compact('order'));
    }
    public function markAsShipped($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'wysłane'; 
        $order->save();

        return redirect()->back()->with('success', 'Zamówienie oznaczone jako wysłane.');
    }
    public function productInProgress()
    {
        $orders = Order::where('status', 'wysłane')->get();
        return view('products.productInProgress', compact('orders'));
    }
    public function markAsFinish($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Zakończone';
        $order->save();

        return redirect()->back()->with('success', 'Zamówienie oznaczone jako zakończone.');
    }
    public function productHistory()
    {
        $orders = Order::where('status', 'Zakończone')->get();
        return view('products.productHistory', compact('orders')); 
    }
    public function printLabel($id)
    {
        $order = Order::findOrFail($id);
    
        // Tworzenie generatora kodu kreskowego
        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode($order->order_number, BarcodeGeneratorPNG::TYPE_CODE_128);
    
        // Konwersja do base64
        $barcodeBase64 = base64_encode($barcode);
    
        // Przekazanie danych do widoku
        return view('products.etykieta', compact('order', 'barcodeBase64'));
    }
    
}

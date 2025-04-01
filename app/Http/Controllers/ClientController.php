<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Order;


class ClientController extends Controller
{

    public function index(Request $request)
    {   
        $query = Client::query();
        if($request->has('search') && $request->search != ''){
            $query->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('phone', 'like', '%' . $request->search . '%');
        }
        $clients = $query->paginate(10);
        return view('clients.client_list', [
            'clients' => $clients,
            'search' => $request->search, 
        ]);
    }
    public function create()
    {
        return view('clients.client_create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|min:3',
            'email' =>'required|email|unique:clients,email',
            'phone' =>'nullable|string'
        ]);
        Client::create($request->only(['name','email','phone']));
        return redirect()->route('clients.index')->with('success', 'Klient dodany.');
    }
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.client_edit', compact('client'));
    }
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->only(['name', 'email', 'phone']));

        return redirect()->route('clients.index')->with('success', 'Dane klienta zaktualizowane!');
    }
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->route('clients.index')->with('success', 'Klient usunięty!');
    }
    public function client_description($id)
    {
        $client = Client::with('orders')->findOrFail($id);

        return view('clients.client_description', compact('client'));
    }



    public function communication()
    {
        return view('clients.communication');
    }
    public function client_segmentation()
    {
        return view('clients.client_segmentation');
    }
    public function purchase_history()
    {   
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('clients.purchase_history', compact('orders'));
    }

}

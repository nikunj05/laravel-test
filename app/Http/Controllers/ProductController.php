<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = url('/products.json');
        if(file_exists(public_path('/products.json'))) {
            $json = file_get_contents($url, true);
            $jsondata = utf8_encode($json);
            $data = json_decode($jsondata, true);
            krsort($data);
            return view('product')->with('data', $data);
        } 
        return view('product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request)
    {
        $date = date('Y-m-d H:i:s');
        $data[] = ["name" => $request->product_name, "price" => $request->price, "quantity" => $request->quantity, "datetime" => $date];
        $data = json_encode($data);
        $fileName = 'products.json';
        if (file_exists(public_path('/'.$fileName))) {
            $data = ["name" => $request->product_name, "price" => $request->price, "quantity" => $request->quantity, "datetime" => $date];
            $inp = file_get_contents('http://localhost/testlaravel/public/products.json');
            $tempArray = (array) json_decode($inp, true);
            array_push($tempArray, $data);
            $jsonData = json_encode($tempArray);
            File::put(public_path('/'.$fileName), $jsonData);
        } else {
            File::put(public_path('/'.$fileName), $data);
        }
        exit;
    }

    public function getProducts()
    {
        $url = url('/products.json');
        if(file_exists(public_path('/products.json'))) {
            $json = file_get_contents($url, true);
            $jsondata = utf8_encode($json);
            $products = json_decode($jsondata, true);
            krsort($products);
            foreach ($products as $product) {
                echo '<tr role="row"><td>'.$product['name'].'</td><td>'.number_format($product['price'],2).'</td><td>'.$product['quantity'].'</td><td>'.$product['datetime'].'</td><td>'.number_format($product['quantity'] * $product['price'], 2).'</td><td>Edit</td></tr>';
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

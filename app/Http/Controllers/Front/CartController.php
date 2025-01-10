<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {

        if (session()->has('cart')) {
            $products = session('cart');
        } else {
            return to_route('main.index');
        }

        if (self::getCount($products) == 0) {
            session()->forget('cart');
            return redirect()->route('main.index');
        }
        $totalSum = self::getTotal($products);

        return view('front.basket.basket', compact('products', 'totalSum'));
    }


    public function addTooCart(Request $request)
    {
        $productId = $request->input('productId');
        $product = Product::query()->findOrFail($productId);
        $cart = session()->get('cart', []);
        $productId = $product->id;
        $product->qty = 1;

        if (isset($cart[$productId])) {
            if ($cart[$productId]['qty'] >= $cart[$productId]['count']) {
                return response()->json(['warning' => 'такое количество не доступно'], 400);
            } else {
                $cart[$productId]['qty'] += 1;
            }
        } else {
            $cart[$productId] = $product;
        }


        session(['cart' => $cart]);


        return response()->json(['success' => 'Товар ' . $product->title . ' успешно добавлен в корзину', 'cart' => session()->get('cart')], 200);
    }

    public function addQuantity(Request $request)
    {
        $productId = $request->input('productId');
        $cart = session()->get('cart', []);

        if (!isset($cart[$productId])) {
            return response()->json(['error' => 'Product not found'], 400);
        }

        if ($cart[$productId]['qty'] >= $cart[$productId]['count']) {
            return response()->json(['warning' => 'Такое количество недоступно'], 400);
        }

        $cart[$productId]['qty'] += 1;
        session(['cart' => $cart]);
            $totalSum = self::getTotal($cart);
            $count = self::getCount($cart);
            return response()->json(['cart' => $cart[$productId], 'totalSum' => number_format($totalSum, 0, ',', ' '), 'count' => $count], 200);
    }

    public function removeQuantity(Request $request)
    {
        $productId = $request->input('productId');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            if ($cart[$productId]['qty'] >= 1) {
                $cart[$productId]['qty'] -= 1;
            } else {
                unset($cart[$productId]);

            }

            if (self::getCount($cart) == 0) {
                session()->forget('cart');
                return response()->json(['not_found_product' => 'больше нет товаров'], 404);
            }

            session(['cart' => $cart]);

            $totalSum = self::getTotal($cart);
            $count = self::getCount($cart);

            return response()->json(['cart' => $cart, 'totalSum' => number_format($totalSum, 0, ',', ' '), 'count' => $count], 200);
        }
    }

    public function basketForm(Request $request)
    {
//        dump($request);
//        $response = Http::withOptions(['verify' => false])->post('https://api.novaposhta.ua/v2.0/json/', [
//            'apiKey' => 'f556823e8b62fa03487894e5df52bcd0',
//            'modelName' => 'AddressGeneral',
//            'calledMethod' => 'getAreas',
//            'methodProperties' => [
////                'Description' => '',
////                'CityName' =>  "сум",
//                'Page' => '1',
//                'Limit' => '150',
//            ]
//        ]);


//        $city = $_GET['city'] ?? '';
//        $response = Http::withOptions(['verify' => false])->post('https://api.novaposhta.ua/v2.0/json/', [
//            'apiKey' => 'f556823e8b62fa03487894e5df52bcd0',
//            'modelName' => 'AddressGeneral',
//            'calledMethod' => 'searchSettlements',
//            'methodProperties' => [
////                'Description' => '',
//                'CityName' =>  $city,
//                'Page' => '1',
//                'Limit' => '150',
//            ]
//        ]);
//
//        $data = $response->json();

//        dump($data['data']);
//        foreach ($data['data'] as $address) {
//            foreach ($item as $adress) {
//                dd($adress['Present']);
//            }
//            dd($address['Description']);
//        }



        $cart = session('cart');
        $totalSum = self::getTotal($cart);
        return view('front.basket.form', compact('totalSum', 'cart'));
    }

    public function confirmCart(Request $request)
    {

//        dd($request->all());


    }

    public static function getTotal($product)
    {
        $totalSum = 0;
        foreach ($product as $item) {
            $totalSum += $item['price'] * $item['qty'];
        }
        return $totalSum;
    }

    public static function getCount($products)
    {
        $count = 0;
        if (session()->has('cart')) {
            $products = session('cart') ?? 0;
            foreach ($products as $product) {
                $count += $product['qty'];
            }
        }
        return $count;
    }
}


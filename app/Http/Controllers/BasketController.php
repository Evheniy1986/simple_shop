<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();

        if (empty(session('orderId'))) {
            return redirect()->route('index');
        }

        return view('basket', compact('order'));

    }

    public function basketPlace()
    {
        $basket = new Basket();
        $order = $basket->getOrder();
        if (!$basket->countAvailable()) {
            session()->flash('warning', 'Товар не доступен для заказа');
            return redirect() ->route('basket');
        }

        return view('form_basket', compact('order'));
    }

    public function basketAdd(Product $product)
    {


        $result = (new Basket(true))->addProduct($product);
        if ($result) {
            session()->flash('success', 'Добавлен товар '.$product->name);
        } else {
            session()->flash('warning', 'Товар '.$product->name . ' в большем количестве не доступен для заказа');
        }

        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new Basket())->removeProduct($product);

        session()->flash('warning', 'Удален товар '.$product->name);

        return redirect()->route('basket');
    }

    public function basketConfirm(Request $request)
    {
        if ((new Basket())->saveOrder($request->name, $request->phone, $request->email)) {
            session()->flash('success', __('basket.your_order_confirmed'));
        } else {
            \session()->flash('warning', 'Товар не доступен для заказа');
        }
        return redirect()->route('index');
    }
}

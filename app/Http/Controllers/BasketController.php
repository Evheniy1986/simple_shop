<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if (isset($orderId)) {
            $order = Order::query()->findOrFail($orderId);
        }
        if (empty(session('orderId'))) {
            return redirect()->route('index');
        }
        return view('basket', compact('order' ));

    }

    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::query()->findOrFail($orderId);

        return view('form_basket', compact('order'));
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::findOrFail($orderId);
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->quantity++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        if (auth()->check()) {
            $order->user_id = auth()->id();
            $order->save();
        }

        $product = Product::find($productId);
        session()->flash('success', 'Добавлен товар ' . $product->name );

        return redirect()->route('basket');
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::findorFail($orderId);

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->quantity < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->quantity--;
                $pivotRow->update();
            }
        }
        $product = Product::find($productId);
        session()->flash('warning', 'Удален товар ' . $product->name );

        return redirect()->route('basket');
    }

    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::query()->findOrFail($orderId);
       $success = $order->saveOrder($request->name, $request->phone, $request->email);
        if ($success) {
            session()->flash('success', 'Ваш заказ принят в обработку');
        } else {
            \session()->flash('warning', 'Произошла ошибка');
        }
        return redirect()->route('index');
    }
}

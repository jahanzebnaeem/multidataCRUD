<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('front_page.view', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $data = $request->all();
        $lastid = Order::create($data)->id;
        if (count($request->product_name) > 0) {
            foreach ($request->product_name as $item => $v) {
                $data2 = array(
                    'order_id' => $lastid,
                    'product_name' => $request->product_name[$item],
                    'brand' => $request->brand[$item],
                    'quantity' => $request->quantity[$item],
                    'budget' => $request->budget[$item],
                    'amount' => $request->amount[$item],
                );
                Item::insert($data2);
            }
        }
        return redirect()->back()->with('success', 'Data insert successfully');
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
        $order = Order::find($id);
        $items = Item::where('order_id', '=', $id)->get();
        return view('front_page.order', compact('order', 'items'));
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
        $order = Order::find($id);

        $order->customer_name = $request->customer_name;
        $order->customer_address = $request->customer_address;
        $order->save();

        if (count($request->id) > 0) {
            foreach ($request->id as $item => $v) {
                $data2 = array(
                    'product_name' => $request->product_name[$item],
                    'brand' => $request->brand[$item],
                    'quantity' => $request->quantity[$item],
                    'budget' => $request->budget[$item],
                    'amount' => $request->amount[$item],
                );
                $item = Item::where('id', $request->id[$item])->first();
                $item->update($data2);
            }
        }
        return redirect()->back()->with('success', 'Data updated successfully');
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

    public function items($id)
    {
        $items = Item::where('order_id', '=', $id)->get();
        return view('front_page.items', compact('items'));
    }
}

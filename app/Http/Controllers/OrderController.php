<?php

namespace App\Http\Controllers;


use App\Order;


class OrderController
{
    /**
     * @var UserService
     */
    private $userService;


    public function index()
    {
        $this->userService->allows('view', 'orders');

        $order = Order::paginate();

    }

    public function show($id)
    {
        $this->userService->allows('view', 'orders');

       
    }

    public function export()
    {
        $this->userService->allows('view', 'orders');

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=orders.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ];

        $callback = function () {
            $orders = Order::all();
            $file = fopen('php://output', 'w');

            //Header Row
            fputcsv($file, ['ID', 'Name', 'Email', 'Order Title', 'Price', 'Quantity']);

            //Body
            foreach ($orders as $order) {
                fputcsv($file, [$order->id, $order->name, $order->email, '', '', '']);

                foreach ($order->orderItems as $orderItem) {
                    fputcsv($file, ['', '', '', $orderItem->product_title, $orderItem->price, $orderItem->quantity]);
                }
            }

            fclose($file);
        };

        return \Response::stream($callback, 200, $headers);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User;


class OrderController extends Controller
{
    public function store_order(Request $request)
    {

        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $item_details = session()->get('cart');

        $all_item = '';
        foreach ($item_details as $x => $val) {
            if ($all_item == '') {
                $all_item = 'Name: ' . $val['name'] . ' Qty: ' . $val['quantity'] . ' ';
            } else {
                $all_item = $all_item . ', ' . 'Name: ' . $val['name'] . ' Qty: ' . $val['quantity'] . ' ';
            }
        }

        $order = new Order;
        $order->id = $request->order;
        $order->user_id = $data->id;
        $order->user_name = $data->name;
        $order->email = $data->email;
        $order->user_phone = $request->user_phone;
        $order->user_add = $request->user_add;
        $order->product_names = $all_item;
        $order->price = $request->price;
        $order->save();
        session()->forget('cart');
        return redirect()->back()->with('message', 'Order Request Successfully Sent');
    }



    public function show_order()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.order.index', compact('orders'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }
    public function change_status(Order $orders)
    {
        if ($orders->status == 1) {
            $orders->update(['status' => 0]);
        } else {
            $orders->update(['status' => 1]);
        }
        return redirect()->back()->with('message', 'Payment Status changed successfully');
    }


    public function delete_order(Order $id)
    {
        $delete = $id->delete();
        if ($delete) {
            return redirect()->back()->with('message', 'Order deleted successfully');
        }
    }

    public function confirm_order(Order $id)
    {
        if ($id->confirm == 1) {
            $id->update(['confirm' => 0]);
        } else {
            $id->update(['confirm' => 1]);

            $name = str_replace(' ','%20', $id->user_name);
            $order_details = str_replace(' ','%20', $id->product_names);
            $msg = 'Dear' . '%20' . $name . ',%0a' . 'Your%20Order%20Id%20is%20asdf-' . $id->id . '.%20' . 'Your%20Order%20Details:%20' . $order_details . '.%20' . 'Total%20Amount:%20' . $id->price . 'Tk.%20China%20House,%20Contact:01712622555';
            $phone = $id->user_phone;

            try {
                $url = "http://api.boom-cast.com/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=Times&password=4efb9ec959512abf408b4a33f5fcc6cb&MsgType=TEXT&receiver=$phone&message=$msg";

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
            } catch (Exception $e) {
            }
        }
        return redirect()->back()->with('message', 'Order Status Has Changed with the sending of confirmation message');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Order;
use App\Http\Requests\Orders\StoreRequest;
use App\ValueObjects\OrderStatus;
use App\ValueObjects\LeadStatus;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::with('lead')->paginate(20);

    	return view('orders.index', [
    		'orders' => $orders
    	]);
    }

    public function create($leadId)
    {
    	$lead = Lead::find($leadId);

    	return view('orders.create', [
    		'lead' => $lead
    	]);
    }

    public function store(StoreRequest $request)
    {
        $data = [
            'due_date' => $request->get('due_date'), 
            'status' => OrderStatus::WAITING, 
            'comments' => [$request->get('comments')],
            'amount' => $request->get('amount'),
        ];

        $order = Order::create($data);
        if ($order) {
            $lead = Lead::where('id', $request->get('lead_id'))->update([
                'order_id' => $order->id,
                'status' => LeadStatus::CONVERTED,
            ]);

            return redirect("/pedidos/{$order->id}")->with([
                'message_type' => 'success',
                'message_content' => 'Pedido criado com sucesso',
            ]);
        }

        return redirect()->back()->with([
            'message_type' => 'danger',
            'message_content' => 'Falha ao salvar pedido',
        ]);
    }

    public function show($id)
    {
        $order = Order::with('lead')->find($id);

        return view('orders.show', [
            'order' => $order
        ]);
    }

    public function closeOrder($id)
    {
        $order = Order::find($id);
        $order->status = OrderStatus::DONE;

        if ($order->save()) {
            return redirect("/pedidos/{$order->id}")->with([
                'message_type' => 'success',
                'message_content' => 'Pedido fechado com sucesso',
            ]);
        }

        return redirect()->back()->with([
            'message_type' => 'danger',
            'message_content' => 'Falha ao fechar pedido',
        ]);

    }
}

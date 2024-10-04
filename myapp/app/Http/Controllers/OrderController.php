<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'delivery_option' => 'required|string|in:Delivery,Self Pickup',
            'total_amount' => 'required|numeric',
            'token' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create a new order
        $order = Order::create([
            'address' => $request->address,
            'description' => $request->description,
            'delivery_option' => $request->delivery_option,
            'total_amount' => $request->total_amount,
            'token' => $request->token,
            'status' => 'pending',
            'is_completed' => false,
        ]);

        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order
        ], 201);
    }
}


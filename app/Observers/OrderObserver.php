<?php

namespace App\Observers;

use App\enums\OrderStatus;
use App\Mail\OrderStatusMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $info = ['status'=>OrderStatus::PENDING];
        Mail::to($order->user->email)->send(new OrderStatusMail($info));
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        $info = ['status'=>request('status')];
        Mail::to($order->user->email)->send(new OrderStatusMail($info));
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}

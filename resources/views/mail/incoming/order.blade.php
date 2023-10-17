<x-mail::message>
Hi Admin! You just received new order from customer!</br>
Here is summary of the order!

<x-mail::panel>
    Order #{{ $order->order_no }} <br>
    Pickup Schedule : {{ date('l, d F Y -- H:i A', strtotime($order->pickup->schedule_date)) }} <br>
    Pickup Address: {{ $order->delivery->address }} <br>
    Customer : {{ $order->delivery->name }} <br>
    Phone Number : {{ $order->delivery->phone }} <br>
</x-mail::panel>

<x-mail::table>
    | Qty | Service | Total |
    | --- | ------- | -----:|
    @foreach ($order->details as $item)
    | {{ $item->qty }} | {{ $item->item }} | {{ $item->subtotal }} |
    @endforeach
    | Total | | {{ $order->total }} |
    | Tax | | {{ $order->tax }} |
    | Grand Total | | {{ $order->grand_total }} |
</x-mail::table>

let\'s take a look of the details order by clicking this button bellow

<x-mail::button :url="$url">
See Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

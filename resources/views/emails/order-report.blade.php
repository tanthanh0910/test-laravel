@php
    $url = route('admin.orders.report', [
        'order' => $order_id,
    ]);
@endphp

<div style="padding-bottom: 30px;">
    <p>Outlet: {{$outlet_name}}</p>
    <p>Order ID: #{{$order_code}}</p>

    <p>Please click the link to view details</p>
    <a style="background:#F78A29; color:black; text-decoration:none; padding:10px 20px;" href="{{ $url }}">Detail</a>
    <br>
    <br>
    <br>
    <p>Best regards,</p>
    <p>{{config('app.name')}}</p>
</div>


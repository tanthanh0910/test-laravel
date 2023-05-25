@php
    $url_outlet = route('client.orders.show', [
        'id' => $order_id,
    ]);

    $url_admin = route('admin.orders.edit',[
        'order' => $order_id,
    ])
@endphp
<div style="padding-bottom: 30px;">
    <label>Dear customer,</label>
    <br>
    <br>
    <p>Your issue report for order #{{$order_code}} has been replied. You can check details by click the link below:</p>
    <a style="background:#F78A29; color:black; text-decoration:none; padding:10px 20px;" href="{{ $url_outlet }}">Outlet</a>
    <a style="background:#F78A29; color:black; text-decoration:none; padding:10px 20px;" href="{{ $url_admin }}">Admin</a>
    <br>
    <br>
    <br>
    <p>Best regards,</p>
</div>
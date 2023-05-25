@php
    $center = "text-align: center;";
    $left = "text-align: left;";
    $changed = "color: red;";
    $deleteItem = "text-decoration-line: line-through;";
    $border ="border: 1px solid #ddd !important; padding: 8px !important;";
    $font = "font-family: Arial, Helvetica, sans-serif";
@endphp


<div class="" style="padding-bottom: 10px;">
    <p>Order ID: {{$code}}</p>
    <p>Shipping Address: {{$shippingAddress}}</p>
</div>
<div style="padding-bottom: 10px;">
    <p>Items Required</p>
    <table id="orders" style="font-family: Arial, Helvetica, sans-serif !important;
        border-collapse: collapse !important;
        width: 100% !important ;">
        <thead>
        <tr style="">
            <th style="{{$center}}{{$border}}">S/No</th>
            <th style="{{$border}}{{$left}}">Product Name</th>
            <th style="{{$border}}{{$left}}">Product ID</th>
            <th style="{{$border}}{{$left}}">Unit Price</th>
            <th style="{{$border}}{{$left}}">Quantity</th>
            <th style="{{$border}}{{$left}}">Total Price</th>
            <th style="{{$border}}{{$left}}">Remarks</th>
        </tr>
        </thead>
        <tbody>
        @php $sNo = 1; @endphp
        @if(!empty($details) && count($details) > 0)
            @php $totalQty = 0; $totalAmount = 0; @endphp
            @foreach($details as $item)
                <tr>
                    <td class="sno-number" style="{{$border}}{{$center}}">{{$sNo}}</td>
                    <td style="{{$border}}">{{$item->product_name}}</td>
                    <td style="{{$border}}">{{$item->product_code}}</td>
                    <td style="{{$border}}">${{formatNumberV1($item->price)}}</td>
                    <td style="{{$border}}">{{formatNumberV1($item->quantity)}}</td>
                    <td style="{{$border}}">${{formatNumberV1($item->amount)}}</td>
                    <td style="{{$border}}">{{$item->remarks}}</td>
                </tr>
                @php $sNo++; $totalQty+= $item->quantity; $totalAmount+= $item->amount; @endphp
            @endforeach
        @endif
        <tr>
            <td colspan="4" style="text-align: right; {{$border}}">Total Due:</td>
            <td style="{{$border}}">{{formatNumberV1($totalQty)}}</td>
            <td colspan="2" style="{{$left}};{{$border}}">${{formatNumberV1($totalAmount)}}</td>
        </tr>
        </tbody>
    </table>
</div>
<div style="padding-bottom: 10px;">
    <p>Best regards,</p>
    <p>{{config('app.name')}}</p>
</div>


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
            <th style="{{$center}}{{$border}}">Action</th>
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
        @if(!empty($resultChange) && count($resultChange) > 0)
            @if(!empty($resultChange['deleted']) && count($resultChange['deleted']) > 0)
                @foreach($resultChange['deleted'] as $item)
                    <tr>
                        <td align="center" style="{{$center}}{{$border}}">[-]</td>
                        <td class="sno-number" style="{{$deleteItem}}{{$border}}{{$center}}" >{{$sNo}}</td>
                        <td  style="{{$deleteItem}}{{$border}}">{{$item['name']}}</td>
                        <td  style="{{$deleteItem}}{{$border}}">{{$item['code']}}</td>
                        <td  style="{{$deleteItem}}{{$border}}">{{formatNumberV1(optional($item)['price'])}}</td>
                        <td  style="{{$deleteItem}}{{$border}}">{{formatNumberV1(optional($item)['quantity'])}}</td>
                        <td  style="{{$deleteItem}}{{$border}}">{{formatNumberV1(optional($item)['amount'])}}</td>
                        <td  style="{{$deleteItem}}{{$border}}">{{$item['remarks']}}</td>
                    </tr>
                     @php $sNo++; @endphp
                @endforeach
            @endif

            @if(!empty($resultChange['updated']) && count($resultChange['updated']) > 0)
                @foreach($resultChange['updated'] as $item)
                    <tr>
                        <td  style="{{$center}}{{$border}}">[*]</td>
                        <td class="sno-number"  style="{{$center}}{{$border}}">{{$sNo}}</td>
                        <td style="{{$border}}">{{$item['name']['val']}}</td>
                        <td style="{{$border}}">{{$item['code']['val']}}</td>
                        <td style="@if($item['price']['val'] != $item['price']['old_val']) {{$changed}} @endif {{$border}}">
                            @if($item['price']['val'] != $item['price']['old_val'])
                                <strong>{{formatNumberV1(optional($item)['price']['val'])}}</strong>
                            @else
                                {{formatNumberV1(optional($item)['price']['val'])}}
                            @endif

                        </td>
                        <td style="@if($item['quantity']['val'] != $item['quantity']['old_val']) {{$changed}} @endif {{$border}}">
                            @if($item['quantity']['val'] != $item['quantity']['old_val'])
                                <strong>{{formatNumberV1(optional($item)['quantity']['val'])}}</strong>
                            @else
                                {{formatNumberV1(optional($item)['quantity']['val'])}}
                            @endif

                        </td>
                        <td style="@if($item['amount']['val'] != $item['amount']['old_val']) {{$changed}} @endif {{$border}}">
                            @if($item['amount']['val'] != $item['amount']['old_val'])
                                <strong>{{formatNumberV1(optional($item)['amount']['val'])}}</strong>
                            @else
                                {{formatNumberV1(optional($item)['amount']['val'])}}
                            @endif

                        </td>
                        <td style="@if($item['remarks']['val'] != $item['remarks']['old_val']) {{$changed}} @endif {{$border}}">
                            @if($item['remarks']['val'] != $item['remarks']['old_val'])
                                <strong>{{$item['remarks']['val']}}</strong>
                            @else
                                {{$item['remarks']['val']}}
                            @endif

                        </td>
                    </tr>
                     @php $sNo++; @endphp
                @endforeach
            @endif

            @if(!empty($resultChange['created']) && count($resultChange['created']) > 0)
                @foreach($resultChange['created'] as $item)
                    <tr>
                        <td style="{{$center}}{{$border}}">[+]</td>
                        <td class="sno-number" style="{{$center}}{{$border}}"><strong>{{$sNo}}</strong></td>
                        <td style="{{$border}}"><strong>{{$item['name']}}</strong></td>
                        <td style="{{$border}}"><strong>{{$item['code']}}</strong></td>
                        <td style="{{$border}}"><strong>{{formatNumberV1(optional($item)['price'])}}</strong></td>
                        <td style="{{$border}}"><strong>{{formatNumberV1(optional($item)['quantity'])}}</strong></td>
                        <td style="{{$border}}"><strong>{{formatNumberV1(optional($item)['amount'])}}</strong></td>
                        <td style="{{$border}}"><strong>{{$item['remarks']}}</strong></td>
                    </tr>
                     @php $sNo++; @endphp
                @endforeach
            @endif



        @endif
        <tr>
            <td colspan="5" style="text-align: right; {{$border}}">Total Due:</td>
            <td style="{{$border}}">{{formatNumberV1($totalQty)}}</td>
            <td colspan="2" style="{{$left}};{{$border}}">{{formatNumberV1($totalAmount)}}</td>
        </tr>
        </tbody>
    </table>
</div>
<div style="padding-bottom: 10px;">
    <p>Best regards,</p>
    <p>{{config('app.name')}}</p>
</div>


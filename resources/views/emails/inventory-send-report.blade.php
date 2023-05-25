@php
    $center = "text-align: center;";
    $left = "text-align: left;";
    $changed = "color: red;";
    $deleteItem = "text-decoration-line: line-through;";
    $border ="border: 1px solid #ddd !important; padding: 8px !important;";
    $font = "font-family: Arial, Helvetica, sans-serif";
@endphp


<div class="" style="padding-bottom: 10px;">
</div>
<div style="padding-bottom: 10px;">
    <p>Factory: {{$factoryName}}</p>
     <p><a target="_blank" href="{{route('admin.reports.daily-production.index', ['from_date' => $fromDate, 'to_date' => $toDate, 'factory_id' => $factoryId])}}">Click here to get more details</a></p>
    <table id="orders" style="font-family: Arial, Helvetica, sans-serif !important;
        border-collapse: collapse !important;
        width: 100% !important ;">
        <thead>
        <tr style="">
            <th style="{{$border}}{{$left}}">Product Name</th>
            <th style="{{$border}}{{$left}}">Quantity</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productData as $product)
            <tr>
                <td style="{{$border}}{{$left}}">{{$product->name}}</td>
                <td style="{{$border}}{{$left}}">{{\App\Services\DailyProductionService::findQuantityOfDailyProduction($dailyProductReports, $product->id, $toDate)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
<div style="padding-bottom: 10px;">
    <p>Best regards,</p>
    <p>{{config('app.name')}}</p>
</div>


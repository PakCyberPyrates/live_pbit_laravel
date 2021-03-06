<!DOCTYPE html>
<html>
<head>
<title>Order Detail </title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    padding: 15px
}

.invoice .header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6;
    height: 117px !important;
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

/*.invoice .contacts {
    margin-bottom: 20px
}*/

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
   /* padding-bottom: 50px*/
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
<body>
<!------ Include the above in your HEAD tag ---------->
<!--Author      : @arboshiki-->
<div id="invoice">

<!--     <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div> -->
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <div class="header">
                <div class="row"  >
                    <div class="col" >
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="{{url('/public/img/logo.png')}}" data-holder-rendered="true" width="185px" />
                            </a>
                    </div>
                    <div class="col company-details" >
                        <h3 class="name">
                            <a target="_blank" href="{{url('/')}}">
                            PBIT Gorup Pvt Ltd.
                            </a>
                        </h3>
                        <div>455 Foggy Heights, AZ 85004, US</div>
                        <div>(123) 456-789</div>
                        <div>errino@epcgroup.net</div>
                    </div>
                </div>
            </div>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h3 class="to">{{$order->user->name}}</h3>
                        <div class="address">796 Silver Harbour, TX 79273, US</div>
                        <div class="email"><a href="mailto:{{$order->user->email}}">{{$order->user->email}}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h2 class="invoice-id">INVOICE #{{ $order->id}}</h2>
                        <div class="date">Date of Invoice: {{ date('d/m/Y',strtotime($order->created_at)) }}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">ITEM NAME</th>
                            <th class="text-right">AMOUNT</th>
                            <th class="text-right">QTY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $total = []; ?>
                        @foreach($order->items as $item)
                        <tr>
                          <td class="no" >#{{$item->id}}</td>
                          <td class="text-left" >{{$item->course->course_name}} </td>
                          <td class="unit" >${{$item->price}}</td>
                          <td class="qty">{{$item->quantity}}</td>
                          <td class="total">${{ ($item->price.' * '.$item->quantity)}}  = ${{ ($item->quantity*$item->price)}}</td>
                        </tr>
                        <?php $total[]= ($item->quantity*$item->price); ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>${{array_sum($total)}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td>$1,300.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>${{array_sum($total)}}</td>
                        </tr>
                    </tfoot>
                </table>
               <!--  <div class="thanks">Thank you!</div> -->
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
<script>
    window.print();
</script>
</body>
</html>
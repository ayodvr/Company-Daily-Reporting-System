<table>
    <tr>
        <th>Location</th>
        <th>{{ $t_store }}</th>
        <th></th>
    </tr>
    <tr>
        <td>Date</td>
        <td>{{ $t_date }}</td>
        <td></td>
    </tr>
    <tr>
        <td>Total Sales</td>
        <td>@money($t_sum)</td>
        <td></td>
    </tr>
</table>
<table>
    <thead>
        <tr>
            <th style="font-family: sans-serif;font-weight:bold">S/N</th>
            <th style="font-family: sans-serif;font-weight:bold">Customer Name</th>
            <th style="font-family: sans-serif;font-weight:bold">Phone</th>
            <th style="font-family: sans-serif;font-weight:bold">Email</th>
            <th style="font-family: sans-serif;font-weight:bold">Address</th>
            <th style="font-family: sans-serif;font-weight:bold">Invoice No</th>
            <th style="font-family: sans-serif;font-weight:bold">Product Details</th>
            <th style="font-family: sans-serif;font-weight:bold">Price</th>
            <th style="font-family: sans-serif;font-weight:bold">Units</th>
            <th style="font-family: sans-serif;font-weight:bold">Mode Of Payment</th>
            <th style="font-family: sans-serif;font-weight:bold">Sold By</th>
            <th style="font-family: sans-serif;font-weight:bold">Confirmed By</th>
            <th style="font-family: sans-serif;font-weight:bold">Total</th>
    </tr>
      </thead>
      <tbody>
        @if (isset($record_arr))
        @foreach ($record_arr as $date => $report)
        <tr>
            <td style="font-family: sans-serif">{{ $loop->iteration}}</td>
            <td style="font-family: sans-serif">{{ $report['name']}}</td>
            <td style="font-family: sans-serif">{{ $report['phone']}}</td>
            <td style="font-family: sans-serif">{{ $report['email']}}</td>
            <td style="font-family: sans-serif">{{ $report['address']}}</td>
            <td style="font-family: sans-serif">{{ $report['invoice']}}</td>
            <td style="font-family: sans-serif">{{ $report['product']}}</td>
            <td style="font-family: sans-serif">@money($report['price'])</td>
            <td style="font-family: sans-serif">{{ $report['unit']}}</td>
            <td style="font-family: sans-serif">{{ $report['payment']}}</td>
            <td style="font-family: sans-serif">{{ $report['sold_by']}}</td>
            <td style="font-family: sans-serif">{{ $report['confirm']}}</td>
            <td style="font-family: sans-serif">@money($report['amount'])</td>
        </tr>
        @endforeach
        @endif
      </tbody>
</table>
{{-- <br>
<table class="table invoice-table">
    <tr>
        <td style="font-family: sans-serif">Number of walking customer</td>
        <td style="font-family: sans-serif">{{ $t_count }}</td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif">S/N</td>
        <td style="font-family: sans-serif">Cash paid in bank analysis(PLEASE STATE BANK MONEY WAS PAID INTO WITH ATTACHMENT OF PAYMENT SLIP)</td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif">Amount</td>
    </tr>
    <tr>
        <td style="font-family: sans-serif">Cash at hand</td>
        <td style="font-family: sans-serif">@money($cash_hand)</td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif">{{ $bank_paid }}</td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif">@money($cash_bank)</td>
    </tr>
    <tr>
        <td style="font-family: sans-serif">Amount paid in bank</td>
        <td style="font-family: sans-serif">@money($cash_bank)</td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif"></td>
        <td style="font-family: sans-serif"></td>
    </tr>
</table> --}}
<h5>Inventory Analysis:</h5>
<table class="table invoice-table">
    <thead class="bg-active">
        <tr>
            <th style="font-family: sans-serif">S/N</th>
            <th style="font-family: sans-serif">Product Details</th>
            <th style="font-family: sans-serif">Qty Sold</th>
            <th style="font-family: sans-serif">Serial Number</th>
            <th style="font-family: sans-serif">SYS QTY</th>
            <th style="font-family: sans-serif">PHY QTY</th>
            {{-- <th style="font-family: sans-serif">Variance</th> --}}
          </tr>
      </thead>
      <tbody>
      @foreach ($record_arr as $date => $report)
      <tr>
        <td style="font-family: sans-serif">{{ $loop->iteration }}</td>
        <td style="font-family: sans-serif">{{ $report['name']}}</td>
        <td style="font-family: sans-serif">{{ $report['unit']}}</td>
        <td style="font-family: sans-serif">{{ $report['serial_no']}}</td>
        <td style="font-family: sans-serif">{{ $report['sys_qty']}}</td>
        <td style="font-family: sans-serif">{{ $report['phy_qty']}}</td>
        {{-- <td style="font-family: sans-serif">{{ $report['sys_qty']}}</td> --}}
      </tr>
      @endforeach
      </tbody>
</table>

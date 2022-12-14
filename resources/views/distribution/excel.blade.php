        <table>
            <thead>
            <tr>
                <th>Description</th>
                <th>Daily Target</th>
                <th>Weekly Target</th>
                <th>Monthly Target</th>
                </tr>
            </thead>
            <tr>
                <td>Target</td>
                <td>11,363,636.00</td>
                <td>68,181,816.00</td>
                <td>250,000,000.00</td>
            </tr>
            <tr>
                <td>Achievement</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Shortfall</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <h5>CLosed Transactions</h5>
        <table>
            <thead>
                <tr>
                    <th>Date of execution</th>
                    <th>Business Name</th>
                    <th>Location</th>
                    <th>Type of account</th>
                    <th>Service|Products|Category</th>
                    <th>Transaction status</th>
                    <th>Value</th>
                  </tr>
              </thead>
              <tbody>
                @if (isset($record_arr))
                @foreach ($record_arr as $date => $report)
                @if($report['status'] == 'successfull')
                <tr>
                  <td>{{ $report['created_at']->toFormattedDateString()}}</td>
                  <td>{{ $report['account_name']}}</td>
                  <td>{{ $report['location']}}</td>
                  <td>{{ $report['account_type']}}</td>
                  <td>{{ $report['product_detail']}}</td>
                  <td>{{ $report['status']}}</td>
                  <td>{{ $report['amount'] }}</td>
                </tr>
                @endif
                @endforeach
                @endif
              </tbody>
        </table>
        <br>
        <h5>Pending Transactions:</h5>
        <table>
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Account Name</th>
                    <th>Pending Transaction details</th>
                    <th>Transaction value</th>
                    <th>Transaction status</th>
                    <th>Location</th>
                  </tr>
              </thead>
              <tbody>
                @if(isset($record_arr))
                @foreach ($record_arr as $date => $report)
                @if($report['status'] !== 'successfull')
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $report['account_name']}}</td>
                <td>{{ $report['product_detail']}}</td>
                <td>{{ $report['amount'] }}</td>
                <td>{{ $report['status']}}</td>
                <td>{{ $report['location']}}</td>
              </tr>
              @endif
              @endforeach
              @endif
              </tbody>
        </table>

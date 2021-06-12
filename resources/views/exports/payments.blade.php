<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Amount</th>
            <th>Currency</th>
            <th>Transaction ID</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @if ($payments && count($payments))
            @foreach ($payments as $key => $payment)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $payment->application->email }}</td>
                    <td>{{ $payment->application->phone }}</td>
                    <td>{{ $payment->amount / 100 }}</td>
                    <td>{{ $payment->currency }}</td>
                    <td>{{ $payment->transaction_id }}</td>
                    <td>{{ $payment->status == 1 ? 'Success' : 'Failed' }}</td>
                    <td>{{ optional($payment->created_at)->format('d F, Y g:i A') }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">No transactions found</td>
            </tr>
        @endif
    </tbody>
</table>
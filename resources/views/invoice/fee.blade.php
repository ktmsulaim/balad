<html>

<head>
    <title>Invoice - Application fee | Aksharam International Malayalam Academy</title>
</head>

<body
    style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
    <table
        style="max-width:670px;margin:50px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #0d6965;">
        <thead>
            <tr>
                <th style="text-align:left;"><img style="max-width: 150px;" src="{{ asset('img/logo.png') }}"
                        alt="Balad International Institute"></th>
                <th style="text-align:right;font-weight:400;">{{ $payment->created_at->format('F d, Y') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                    <p style="font-size:14px;margin:0 0 6px 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:150px">Order status</span>
                        @if ($payment->status == 1)
                            <b style="color:green;font-weight:normal;margin:0">Success</b>
                        @else
                            <b style="color:red;font-weight:normal;margin:0">Failed</b>
                        @endif
                    </p>
                    <p style="font-size:14px;margin:0 0 6px 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span>
                        {{ $payment->transaction_id }}</p>
                    <p style="font-size:14px;margin:0 0 0 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span> 100.00 USD
                    </p>
                </td>
            </tr>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px">Name</span>
                        {{ $payment->application->fullName() }}</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Email</span>
                        {{ $payment->application->email }}</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Phone</span>
                        {{ $payment->application->phone }}</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">ID No.</span> #{{ $payment->id }}
                    </p>
                </td>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                        <span style="display:block;font-weight:bold;font-size:13px;">Address</span>
                        {{ $payment->application->address_line1 }} <br>
                        {{ $payment->application->address_line2 }} <br>
                        {{ $payment->application->state }} <br>
                        {{ $payment->application->country }}
                    </p>

                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Aksharam International Malayalam
                    Academy</td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Invoice #{{ $payment->id }}</td>
            </tr>
            <tr>
                <td colspan="2" style="padding:15px;">
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">Admission / Tuition fee</span> 100
                        USD <b style="font-size:12px;font-weight:300;"> /month</b>
                    </p>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                    <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Balad International Institute of
                    Research and Training
                    <br> PMH Complex, Valamangalam, Pulpatta PO, Malappuram, Kerala, India<br>
                    676123<br>
                    <b>Phone:</b> +918592888585<br>
                    <b>Email:</b> info@balad.co.in
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>

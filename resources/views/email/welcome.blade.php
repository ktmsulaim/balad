@component('mail::message')
    <h1>Hello, {{ $application->fullName() }}</h1>
    <p>Thank you for your interest to studying at Aksharam International Malayalam Academy run by Balad International Institute of Research and Training. This is to inform you that BIIRT has successfully received your electronic  application and it will be processed for the nearest intake as admission procedure is considered incomplete without  the payment of admission processing fee of USD 30.</p>

    Best wishes,
    Office of Enrollment 
    {{ config('app.name') }}
@endcomponent

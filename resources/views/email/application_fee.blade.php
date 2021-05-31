@component('mail::message')
    <h1>Hello, {{ $payment->application->fullName() }}</h1>
    <p>Congrats! Your payment was received. Thank you for joining us!</p>

    Best wishes,
    Office of Enrollment 
    {{ config('app.name') }}
@endcomponent

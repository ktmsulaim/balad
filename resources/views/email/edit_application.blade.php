@component('mail::message')
    <h1>Hello, {{ $application->fullName() }}</h1>
    <p>Do you want to edit your application? Don't worry, just use the verification code below to make changes. Contact us for further information.</p>
    <div>
        <span style="padding: 12px; background-color:#e1e1e1; color: #444; font-size: 16px; text-align:center; font-family: monospace; font-weight:bold; margin: 15px 0;" class="code">{{ $code }}</span>
    </div>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

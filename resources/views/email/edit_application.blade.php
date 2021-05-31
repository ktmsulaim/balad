@component('mail::message')
    <h1>Hello, {{ $application->fullName() }}</h1>
    <p>As you want to edit your application we want to help you to do it. Please use the code below to verify it's you.</p>
    <div>
        <span class="code">{{ $code }}</span>
    </div>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

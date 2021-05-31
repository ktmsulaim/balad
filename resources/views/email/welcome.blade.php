@component('mail::message')
    <h1>Hello, {{ $application->fullName() }}</h1>
    <p>Thank you for submitting an application to Aksharam International Malayalam Academy run by  Balad International Institute of Research and Training. This is a confirmation that you have successfully submitted your electronic admissions application. Please keep the summary of your  application with you. You will not be able to  edit your application after submission. We will contact you once a decision has been made about your application.</p>

    Best wishes,
    Office of Enrollment 
    {{ config('app.name') }}
@endcomponent

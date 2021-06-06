@component('mail::message')
    <h1>Hello, {{ $payment->application->fullName() }}</h1>
    <p>Congratulations! We are pleased to offer you a place to undergo the  Malayalam Basic Certificate Course programme at Aksharam International Malayalam Academy run by Balad International Institute of Research and Training.</p>
    <p>We look forward to having you with us and trust that you
        will find your study here an enriching experience.  BIIRT's faculty and administration jointly   congratulates  you on your admission and we look forward to 
        welcoming you on coming intake.</p>
    <p>We will update you later further information regarding class commencing date, study materials, students' account details, assessments and examinations, tuition fee payments and all other rules and regulations related to the program through an official offer letter.</p>

    Best wishes,
    Office of Enrollment 
    {{ config('app.name') }}
@endcomponent

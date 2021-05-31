@extends('layouts.website', ['pageTitle' => 'Features | Aksharam'])


@section('content')
@include('components.header', ['pageTitle' => 'Features', 'pageSubTitle' => 'Explore exciting features', 'links' => [
    0 => [
        'label' => 'Aksharam',
        'url' => 'javascript:void(0)'
    ],
    1 => [
        'label' => 'Features',
        'url' => route('aksharam.features')
    ]
]])

<section class="section"> 
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="fancy-title title-bottom-border">
                    <h4>Certificate Course</h4>
                </div>
                <p>Malayalam Basic Certificate Course is designed and developed for the students who do not know even the basics of Malayalam language. This course is based on a syllabus that compiles basic studies of the language, including writing and reading. The duration of the course is two years.</p>
            </div>
            
            <div class="col-md-6">
                <div class="fancy-title title-bottom-border">
                    <h4>Diploma Course</h4>
                </div>
                <p>Diploma in Advanced Malayalam is designed for those who want to become more proficient in the Malayalam language. This course moulds proficient language students who can use it creatively through social media and periodicals by achieving the required language skills such as art of listening, art of speaking, art of reading and art of writing (LSRW). Admission to this course is open to those who have successfully completed the Basic Certificate Course.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="fancy-title title-bottom-border">
                    <h4>Interactive Live Sessions</h4>
                </div>
                <p>The new generation is experiencing the great changes of a rapidly moving world. We are the ones who bring the changes made possible by modern technology to our daily life. Students from all over the world can participate in our live classes through the Zoom application. Interactive live classes are organized to ask questions, seek explanations and learn more from the teachers.</p>
                <p>Students can enjoy the beauty of the Malayalam language and experience the same feeling while participating in regular classes. Live classes are forty-five minutes long, five days a week. By the end of the course, you will be able to attend more than 400 live classes. Each class is recorded and made available on the students' accounts on the website ‌ so they can listen to the previous classes again and again.</p>
            </div>
            <div class="col-md-6">
                <div class="fancy-title title-bottom-border">
                    <h4>Assessments; Activities</h4>
                </div>
                <p>Various activities, different assessments, fun games and quizzes that can impart personality development and moral values ​​are organized to improve the learning level of the students at regular intervals and make them more enjoyable. Students’ progress is frequently assessed through class tests, activities provided with each chapter.</p>
                <p>Access to study materials, activities, assessments and supplements are given on students’ accounts in our portal. Our trained faculty will lead all sessions through interactive live sessions assessing and answering the students. A comprehensive examination is conducted by the end of each six months. Those who complete the course will be awarded the certificate of course completion.</p>
            </div>
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="fancy-title title-double-border">
                    <h2>Extracurricular activities</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <ul class="iconlist iconlist-color mb-0">
                    <li><i class="icon-caret-right"></i> Behaviour modification</li>
                    <li><i class="icon-caret-right"></i> Personality Development Training</li>
                    <li><i class="icon-caret-right"></i> Group Dynamics</li>
                    <li><i class="icon-caret-right"></i> Meet with Experts</li>
                    <li><i class="icon-caret-right"></i> Grant Arts Fest</li>
                    <li><i class="icon-caret-right"></i> Creative Thinking & Decision Making</li>
                    <li><i class="icon-caret-right"></i> Debates</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="iconlist iconlist-color mb-0">
                    <li><i class="icon-caret-right"></i> Story telling</li>
                    <li><i class="icon-caret-right"></i> Funny Talks</li>
                    <li><i class="icon-caret-right"></i> Games</li>
                    <li><i class="icon-caret-right"></i> The Art of Listening </li>
                    <li><i class="icon-caret-right"></i> Art of Speaking / Presentation</li>
                    <li><i class="icon-caret-right"></i> The Art of Reading</li>
                    <li><i class="icon-caret-right"></i> The Art of Writing</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="fancy-title title-bottom-border">
                    <h4>Live classes in convenient time zones</h4>
                </div>
                <p>Live sessions are arranged in different four time zones so that the students from different countries can attend the classes. We understand the global demand for this programme and the students’ convenience to attend the active live sessions. Students can select their preferred time zone for live sessions. According to Indian Standard Time, classes are scheduled for 6:30 am to 7:15 am, 10:00 am to 10:45 pm, 2:45 pm to 3:30 pm and 8:30 pm to 9:15 pm.</p>
                <p>Classes will be done through the Zoom application using Wacom board with a small number of students. We have backed up all essential technology to make the live sessions most effective and interesting one. Recorded videos of the classes are also provided. Access to study materials, activities, assessments and supplements are given on students’ accounts in our portal.</p>
            </div>
            <div class="col-md-6">
                <div class="fancy-title title-bottom-border">
                    <h4>Presence of qualified teachers</h4>
                </div>
                <p>Teachers make live sessions more effective by actively engaging in extracurricular activities and discovering and interacting with students' personal and natural tastes. Our qualified faculty members are committed to share the value added education with anyone around the world, to impart proper mentoring and infinite guidance to the students.</p>
                <p>By making the most of the benefits of modern technology and creating a student community that upholds moral values, the teacher-student relationship gained from regular classes can be further warmed up. We try to ensure that no one is deprived of quality training and learning no matter where they are from.</p>
            </div>
        </div>
    </div>
</section>

@endsection
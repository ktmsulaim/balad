@extends('layouts.website', ['pageTitle' => 'About Us'])


@section('content')
    @include('components.header', ['pageTitle' => 'About Us', 'pageSubTitle' => 'Everything you need to know about our
    Company', 'links' => [
    1 => [
    'label' => 'About',
    'url' => route('about')
    ]
    ]])

<div class="row align-items-stretch">

    <div class="col-md-5 col-padding min-vh-75" style="background: url('{{ asset('images/students.jpg') }}') center center no-repeat; background-size: cover;"></div>

    <div class="col-md-7 col-padding">
        <div>
            <div class="heading-block">
                <span class="before-heading color">BIIRT</span>
                <h3>Balad International Institute of Research and Training </h3>
            </div>
            <p>Balad International Institute of Research and Training (BIIRT) is an educational institute
                working in research, traning and community development. Located in kerala, India, Balad
                International Institute of Research and Training (BIIRT) seeks to provide unparalleled
                opportunities where inquiry and discovery are integral to teaching and learning at all levels
                utilizing a multidisciplinary approach across all focus areas.</p>
            <p>BIIRT is a public platform fuses solid academic grounding together with contemporary studies in
                its social institutional values, curricula, teaching platforms and research endeavours and
                training events.</p>
            <p>BIIRT is committed to actively contribute to achieving as a unique hub for knowledge and
                education.by building and cultivating human capacity through an enriching academic experience
                and an innovative research ecosystem. Through applying creativity to knowledge, students will
                have the opportunity to discover innovative solutions that are locally relevant and have a
                global impact.</p>
            <p>At BIIRT – our students, faculty, staff, and leadership – all share a common belief in the power
                of higher education and research to make a positive impact in the development of world.</p>
        </div>
    </div>

</div>
    <section class="bg-light">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row col-mb-50 mb-0">

                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                                    <h4>Our <span>Vision</span>.</h4>
                                </div>

                                <p>To be a unique international institute which aims to create an international multi-disciplinary platform to shape education models, explore ground-breaking innovations and take concrete steps in making significant improvements to worldwide education in the 21st century and to be an innovation-based academic international institute leading in education and research, solving critical challenges facing the world. Our motto is A Unique hub for knowledge and education.</p>

                            </div>

                            <div class="col-lg-6">

                                <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                                    <h4>Our <span>Mission</span>.</h4>
                                </div>

                                <p>BIIRT develops world-class, integrated academic programs, publications, information services, online learning courses, conferences, training programmes  and innovative research projects that drive collaboration with the world’s best institutions, cultivating leaders for the future,</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

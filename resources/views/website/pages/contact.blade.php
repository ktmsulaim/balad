@extends('layouts.website', ['pageTitle' => 'Contact Us'])


@section('content')
@include('components.header', ['pageTitle' => 'Contact Us', 'pageSubTitle' => 'Get in Touch with Us', 'links' => [
    1 => [
        'label' => 'Contact Us',
        'url' => route('contact')
    ]
]])

<section id="content">
    <div class="content-wrap">
        <div class="container">

            <div class="row gutter-40 col-mb-80">
                <!-- Postcontent
                ============================================= -->
                <div class="postcontent col-lg-9">

                    <h3>Send us an Email</h3>

                    <div class="form-widget">

                        <div class="form-result"></div>

                        <form class="mb-0" id="template-contactform" name="template-contactform" action="" method="post" novalidate="novalidate">

                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="template-contactform-name">Name <small>*</small></label>
                                    <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="template-contactform-email">Email <small>*</small></label>
                                    <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="template-contactform-phone">Phone</label>
                                    <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="template-contactform-subject">Subject <small>*</small></label>
                                    <input type="text" id="template-contactform-subject" name="subject" value="" class="required sm-form-control">
                                </div>

                                <div class="w-100"></div>

                                <div class="col-12 form-group">
                                    <label for="template-contactform-message">Message <small>*</small></label>
                                    <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                                </div>

                                <div class="col-12 form-group d-none">
                                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
                                </div>

                                <div class="col-12 form-group">
                                    <button class="button button-3d m-0" type="button" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div><!-- .postcontent end -->

                <!-- Sidebar
                ============================================= -->
                <div class="sidebar col-lg-3">

                    <address>
                        <strong>Address:</strong><br>
                        PMH Complex, Valamangalam, Pulpatta PO<br>
                        Malappuram, Kerala India<br>
                        676123
                    </address>
                    <abbr title="Phone Number"><strong>Phone:</strong></abbr> (+91) 8592888585<br>
                    <abbr title="Email Address"><strong>Email:</strong></abbr> info@balad.co.in
                </div><!-- .sidebar end -->
            </div>

        </div>
    </div>
</section>

@endsection
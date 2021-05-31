@extends('layouts.website', ['pageTitle' => 'About Us'])


@section('content')
@include('components.header', ['pageTitle' => 'About Us', 'pageSubTitle' => 'Everything you need to know about our Company', 'links' => [
    1 => [
        'label' => 'About',
        'url' => route('about')
    ]
]])

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row col-mb-50 mb-0">

                <div class="col-lg-4">

                    <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                        <h4>Why choose <span>Us</span>.</h4>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>

                </div>

                <div class="col-lg-4">

                    <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                        <h4>Our <span>Mission</span>.</h4>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>

                </div>

                <div class="col-lg-4">

                    <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                        <h4>What we <span>Do</span>.</h4>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>

                </div>

            </div>

        </div>
    </div>
</section>

@endsection
<main id="main-global">
<!-- subscribe SECTION -->
<section class="subscribe">
    <div class="bg" style="background: url({{ \App\Helpers\Subscribes::getOption('src') == '' ? '' : asset('files/subscribe/'.\App\Helpers\Subscribes::getOption('src')) }});"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="subscribe-form">
                    <h2>{!! \App\Helpers\Subscribes::getOption('title_1_'.app()->getLocale()) !!}</h2>
                    <p>{!! \App\Helpers\Subscribes::getOption('text_'.app()->getLocale()) !!}</p>
                    <form action="">
                        <input type="email" name="" placeholder="Your E-mail" required>
                        <button class="" type="submit"><svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.3475 13.25L17 7L11.3475 0.75L10.2057 2.0125L13.9089 6.10714L-1.2829e-06 6.10714L-1.43901e-06 7.89285L13.9089 7.89286L10.2057 11.9875L11.3475 13.25Z" fill="#ECF1F4"></path>
                            </svg></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

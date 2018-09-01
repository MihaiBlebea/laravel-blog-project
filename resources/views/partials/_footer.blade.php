<footer class="footer footer__top pt-4 pb-4 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">

                @include('partials.navigations._footer-navigation')

            </div>

            <div class="col">
                <div class="float-right">

                    @include('partials._social-buttons')

                </div>
            </div>
        </div>
    </div>
</footer>

<footer class="footer footer__bottom">
    <div class="container">
        <div class="row align-items-center">
            <p class="col text-center mt-3">2018 {{ config('app.name', 'Laravel') }}</p>
        </div>
    </div>
</footer>

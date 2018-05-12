<footer class="first-footer pt-4 pb-4 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">

                @include('partials._footer-navigation')

            </div>

            <div class="col">
                <div class="float-right">

                    @include('partials._social-buttons')

                </div>
            </div>
        </div>
    </div>
</footer>
<footer class="second-footer pt-5 pb-4">
    <div class="row align-items-center">
        <p class="col text-center">2018 {{ config('app.name', 'Laravel') }}</p>
    </div>
</footer>

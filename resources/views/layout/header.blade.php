<header class="continer-fluid ">
{{--    <div class="header-top">--}}
{{--        <div class="container">--}}
{{--            <div class="row col-det">--}}
{{--                <div class="col-lg-6 d-none d-lg-block">--}}
{{--                    <ul class="ulleft">--}}
{{--                        <li>--}}
{{--                            <i class="far fa-envelope"></i>--}}
{{--                            buianhtaidev.proton.me--}}
{{--                            <span>|</span>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i class="fas fa-phone-volume"></i>--}}
{{--                            +84 9 33 99 ** **--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-12">--}}
{{--                    <ul class="ulright">--}}
{{--                        <li>--}}
{{--                            <i class="fab fa-facebook-square"></i>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i class="fab fa-twitter-square"></i>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i class="fab fa-instagram"></i>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <i class="fab fa-linkedin"></i>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div id="menu-jk" class="header-bottom">
        <div class="container">
            <div class="row nav-row">
                <div class="col-lg-3 col-md-12 logo">
                    <a href="index.html">
                        <img src="{{ asset('images/logo.jpg') }}" alt="">
                    </a>

                </div>
                <div class="col-lg-9 col-md-12 nav-col">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about_us.html">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cources.html">Cources</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="blog.html">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact_us.html">Contact US</a>
                                </li>


                            </ul>
                            <a class="nav-btn" href="{{ route('users.login') }}">
                                <button id="btn-login" class="btn btn-success">Login</button>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

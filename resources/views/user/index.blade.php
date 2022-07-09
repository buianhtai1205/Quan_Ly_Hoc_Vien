<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AMS Education </title>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
<!-- ################# Header Starts Here#######################--->
@include('layout.header')
<!-- ################# Header Ends Here#######################--->

<!--################### Slider Starts Here #######################--->

<div class="slider-detail">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item ">
                <img class="d-block w-100" src="{{ asset('images/slider/slid_1.jpg') }}" alt="First slide">
                <div class="carousel-caption fvgb d-none d-md-block">
                    <h5 class="animated bounceInDown">Create an Awesome Website Today </h5>
                    <p class="animated bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                        justo neque, <br>
                        aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                        sed sagittis at, sagittis quis neque. Praesent.</p>

                    <div class="row vbh">
                        <a class="nav-btn" href="{{ route('users.login') }}">
                            <button class="btn btn-success animated bounceInUp"> Login </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/slider/slid_2.jpg') }}" alt="Third slide">
                <div class="carousel-caption vdg-cur d-none d-md-block">
                    <h5 class="animated bounceInDown">Best Free Educational Template</h5>
                    <p class="animated bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                        justo neque, <br>
                        aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                        sed sagittis at, sagittis quis neque. Praesent.</p>

                    <div class="row vbh">
                        <a class="nav-btn" href="{{ route('users.login') }}">
                            <button class="btn btn-success animated bounceInUp"> Login </button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


</div>


<!--################### Key Features Starts Here #######################--->

<div class="key-feature container-fluid">
    <div class="container">
        <div class="session-title row">
            <h2>Key Features</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut
                est arcu. Donec hendrerit velit</p>
        </div>
        <div class="row">
            <div class="col-md-3 key-div">
                <div class="key-cover">
                    <i class="far fa-file-word"></i>
                    <h4>Expert Faculty</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum.
                        Donec ut est arcu. Donec hendrerit velit </p>
                </div>
            </div>
            <div class="col-md-3 key-div">
                <div class="key-cover">
                    <i class="far fa-clock"></i>
                    <h4>Well Equipped Labs</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum.
                        Donec ut est arcu. Donec hendrerit velit </p>
                </div>
            </div>
            <div class="col-md-3 key-div">
                <div class="key-cover">
                    <i class="fas fa-object-group"></i>
                    <h4>Quality Education</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum.
                        Donec ut est arcu. Donec hendrerit velit </p>
                </div>
            </div>
            <div class="col-md-3 key-div">
                <div class="key-cover">
                    <i class="fas fa-phone-volume"></i>
                    <h4>24 x 7 Access</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum.
                        Donec ut est arcu. Donec hendrerit velit </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!--################### Cources Starts Here #######################--->

<div class="cources container-fluid">
    <div class="container">
        <div class="session-title row">
            <h2>Our cources</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut
                est arcu. Donec hendrerit velit</p>
        </div>
        <div class="cours-ro row">
            <div class="col-md-4 col-sm-6 cord-div">
                <div class="cours-card">
                    <img src="{{ asset('images/cour/4.jpg') }}" alt="">
                    <div class="cours-name">
                        <h2>Advanced Physics</h2>
                    </div>
                    <div class="course-detail">
                        <h5>Cras ultricies lacus consectetur, consectetur</h5>

                        <p class="star">
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                        </p>

                        <p>Lorem ipsum dolor sit amet consetuer ing elit diam uismod tincidunt Lorem ipsum li dolor
                            t diam uismod tincidunt</p>

                        <button class="btn btn-sm btn-success">Apply Online</button>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 cord-div">
                <div class="cours-card">
                    <img src="{{ asset('images/cour/5.jpg') }}" alt="">
                    <div class="cours-name">
                        <h2>Web Technology</h2>
                    </div>
                    <div class="course-detail">
                        <h5>Cras ultricies lacus consectetur, consectetur</h5>

                        <p class="star">
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                        </p>

                        <p>Lorem ipsum dolor sit amet consetuer ing elit diam uismod tincidunt Lorem ipsum li dolor
                            t diam uismod tincidunt</p>

                        <button class="btn btn-sm btn-success">Apply Online</button>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 cord-div">
                <div class="cours-card">
                    <img src="{{ asset('images/cour/6.jpg') }}" alt="">
                    <div class="cours-name">
                        <h2>Nucliar Science</h2>
                    </div>
                    <div class="course-detail">
                        <h5>Cras ultricies lacus consectetur, consectetur</h5>

                        <p class="star">
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                        </p>

                        <p>Lorem ipsum dolor sit amet consetuer ing elit diam uismod tincidunt Lorem ipsum li dolor
                            t diam uismod tincidunt</p>

                        <button class="btn btn-sm btn-success">Apply Online</button>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 cord-div">
                <div class="cours-card">
                    <img src="{{ asset('images/cour/7.jpg') }}" alt="">
                    <div class="cours-name">
                        <h2>Digital Marketing</h2>
                    </div>
                    <div class="course-detail">
                        <h5>Cras ultricies lacus consectetur, consectetur</h5>

                        <p class="star">
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                        </p>

                        <p>Lorem ipsum dolor sit amet consetuer ing elit diam uismod tincidunt Lorem ipsum li dolor
                            t diam uismod tincidunt</p>

                        <button class="btn btn-sm btn-success">Apply Online</button>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 cord-div">
                <div class="cours-card">
                    <img src="{{ asset('images/cour/8.jpg') }}" alt="">
                    <div class="cours-name">
                        <h2>Artificial Intelligence</h2>
                    </div>
                    <div class="course-detail">
                        <h5>Cras ultricies lacus consectetur, consectetur</h5>

                        <p class="star">
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                        </p>

                        <p>Lorem ipsum dolor sit amet consetuer ing elit diam uismod tincidunt Lorem ipsum li dolor
                            t diam uismod tincidunt</p>

                        <button class="btn btn-sm btn-success">Apply Online</button>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 cord-div">
                <div class="cours-card">
                    <img src="{{ asset('images/cour/9.jpg') }}" alt="">
                    <div class="cours-name">
                        <h2>Environmental Science</h2>
                    </div>
                    <div class="course-detail">
                        <h5>Cras ultricies lacus consectetur, consectetur</h5>

                        <p class="star">
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                            <i class="fas fa-star higlit"></i>
                        </p>

                        <p>Lorem ipsum dolor sit amet consetuer ing elit diam uismod tincidunt Lorem ipsum li dolor
                            t diam uismod tincidunt</p>

                        <button class="btn btn-sm btn-success">Apply Online</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--  ************************* Blog Starts Here ************************** -->
<div id="blog" class="blog">

    <div class="container">
        <div class="session-title row">
            <h2>Latest News</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut
                est arcu. Donec hendrerit velit</p>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="blog-singe no-margin row">
                    <div class="col-sm-5 blog-img-tab">
                        <img src="{{ asset('images/blog/b1.jpg') }}" alt="">
                    </div>
                    <div class="col-sm-7 blog-content-tab">
                        <h2>Latest Financial Planing methods in 2019</h2>
                        <p><i class="fas fa-user"><small>Admin</small></i> <i
                                class="fas fa-eye"><small>(12)</small></i> <i
                                class="fas fa-comments"><small>(12)</small></i></p>
                        <p class="blog-desic">Lorem Ipsum, type lorem then press the shortcut. The default keyboard
                            shortcut is the same keyboard shortcut is the </p>
                        <a href="blog_single.html">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="blog-singe no-margin row">
                    <div class="col-sm-5 blog-img-tab">
                        <img src="{{ asset('images/blog/b2.jpg') }}" alt="">
                    </div>
                    <div class="col-sm-7 blog-content-tab">
                        <h2>Latest Financial Planing methods in 2019</h2>
                        <p><i class="fas fa-user"><small>Admin</small></i> <i
                                class="fas fa-eye"><small>(12)</small></i> <i
                                class="fas fa-comments"><small>(12)</small></i></p>
                        <p class="blog-desic">Lorem Ipsum, type lorem then press the shortcut. The default keyboard
                            shortcut is the same keyboard shortcut is the </p>
                        <a href="blog_single.html">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- ######## Blog End ####### -->


<!--################### Team Starts Here #######################--->
<section class="our-team team-11">
    <div class="container">
        <div class="session-title row">
            <h2>Our Efficient faculties</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut
                est arcu. Donec hendrerit velit</p>
        </div>
        <div class="row team-row">
            <div class="col-md-3 col-sm-6">
                <div class="single-usr">
                    <img src="{{ asset('images/team/team-memb1.jpg') }}" alt="">
                    <div class="det-o">
                        <h4>David Kanuel</h4>
                        <i>Teacher </i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-usr">
                    <img src="{{ asset('images/team/team-memb2.jpg') }}" alt="">
                    <div class="det-o">
                        <h4>David Kanuel</h4>
                        <i>Teacher</i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-usr">
                    <img src="{{ asset('images/team/team-memb3.jpg') }}" alt="">
                    <div class="det-o">
                        <h4>David Kanuel</h4>
                        <i>Teacherr</i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-usr">
                    <img src="{{ asset('images/team/team-memb4.jpg') }}" alt="">
                    <div class="det-o">
                        <h4>David Kanuel</h4>
                        <i>Teacher</i>
                    </div>
                </div>
            </div>


        </div>
    </div>


</section>

<!-- ################# Footer Starts Here#######################--->
@include('layout.footer')
<!-- ################# Footer Ends Here#######################--->

<!-- ################# Source Copy Template#######################--->
<div class="copy">
    <div class="container">
        <a href="https://www.smarteyeapps.com/">2020 &copy; All Rights Reserved | Designed and Developed by
            Smarteyeapps</a>

        <span>
                <a><i class="fab fa-github"></i></a>
                <a><i class="fab fa-google-plus-g"></i></a>
                <a><i class="fab fa-pinterest-p"></i></a>
                <a><i class="fab fa-twitter"></i></a>
                <a><i class="fab fa-facebook-f"></i></a>
            </span>
    </div>

</div>
</body>
<!-- Code injected by live-server -->
<script type="text/javascript">
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function () {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function (msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    }
    else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
</script>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('plugins/slider/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</html>




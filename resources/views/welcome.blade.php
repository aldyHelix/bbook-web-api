<!doctype html>
<html lang="en">
<!--

Page    : index / MobApp
Version : 1.0
Author  : Colorlib
URI     : https://colorlib.com

 -->

<head>
    <title>MobApp - App Landing Page Template</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('landing-assets/css/bootstrap.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('landing-assets/css/themify-icons.css') }}">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{ asset('landing-assets/css/owl.carousel.min.css') }}">
    <!-- Main css -->
    <link href="{{ asset('landing-assets/css/style.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <!-- Nav Menu -->

    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="index.html"><img src="{{ asset('landing-assets/images/logo.png ')}}" class="img-fluid" alt="logo" style="max-height: 50px"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link active" href="#home">HOME <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#features">FEATURES</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#gallery">GALLERY</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#contact">CONTACT</a> </li>
                                <li class="nav-item"><a href="#" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Download</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1>Digital Book Application</h1>
            <p class="tagline">Materi buku sejarah ada di genggamanmu? YA! kamu dapat belajar dari manapun dan mudah dipahami, Sejarah merupakan pelajaran yang berharga.</p>
            <p class="tagline">"Jangan sekali-sekali meninggalkan sejarah." - Soekarno Hatta</p>
        </div>
        <div class="img-holder mt-3"><img src="{{ asset('landing-assets/images/landing-android.png ')}}" alt="phone" class="img-fluid"></div>
    </header>
    <div class="client-logos my-5">
        <div class="container text-center">
            <img src="{{ asset('landing-assets/images/client-logos.png')}}" alt="client logos" class="img-fluid">
        </div>
    </div>

    <div class="section light-bg" id="features">
        <div class="container">
            <div class="section-title">
                <small>HIGHLIGHTS</small>
                <h3>Fitur yang kamu dapatkan</h3>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="ti-face-smile gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">Simple</h4>
                                    <p class="card-text">Materi yang di tampilkan mudah dipahami, navigasi yang sederhana dan fokus terhadap pembelajaran.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="ti-settings gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">Video</h4>
                                    <p class="card-text">Materi yang disajikan tidak hanya untuk dibaca, namun ditampilkan juga dengan video</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="ti-lock gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">Quiz</h4>
                                    <p class="card-text">Jawab pertanyaan sederhana dari materi yang telah disajikan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // end .section -->
    <div class="section">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <h2>Coba Aplikasinya</h2>
                    <p class="mb-4">Digital Book Application ini berfokus pada materi sejarah peradaban.</p>
                </div>
            </div>
            <div class="perspective-phone">
                <img src="{{ asset('landing-assets/images/perspective.png')}}" alt="perspective phone" class="img-fluid">
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <div class="section light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <ul class="list-unstyled ui-steps">
                        <li class="media">
                            <div class="circle-icon mr-4">1</div>
                            <div class="media-body">
                                <h5>Buat Akun</h5>
                                <p>Buat akun di dalam aplikasi.</p>
                            </div>
                        </li>
                        <li class="media my-4">
                            <div class="circle-icon mr-4">2</div>
                            <div class="media-body">
                                <h5>Sharing</h5>
                                <p>Diskusikan materi dengan teman - teman anda</p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">3</div>
                            <div class="media-body">
                                <h5>Mulai Belajar</h5>
                                <p>Mulailah membaca dan memahami materi yang telah disediakan.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('landing-assets/images/login-android.png')}}" alt="iphone" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- // end .section -->


    <div class="section">
        <div class="container">
            <div class="section-title">
                <small>Tentang Pembuat</small>
                <h3>Apa Kata Pembuat Applikasi?</h3>
            </div>
            <div class="testimonials-single">
                <img src="{{ asset('landing-assets/images/client.png')}}" alt="client" class="client-img">
                <hr>
                <blockquote class="blockquote">Aplikasi BBook ini mudah sekali untuk digunakan, mulailah belajar dengan kami. materi yang diberikan akan disajikan dengan
                    video untuk mempermudah pemahaman.</blockquote>
                <h5 class="mt-4 mb-2">Maharani </h5>
                <p class="text-primary">Universitas Muhammadiyah Malang</p>
            </div>
        </div>
    </div>
    <!-- // end .section -->

    <div class="section light-bg" id="gallery">
        <div class="container">
            <div class="section-title">
                <small>GALLERY</small>
                <h3>App Screenshots</h3>
            </div>
            <div class="img-gallery owl-carousel owl-theme">
                <img src="{{ asset('landing-assets/images/ss1.png')}}" alt="image">
                <img src="{{ asset('landing-assets/images/ss2.png')}}" alt="image">
                <img src="{{ asset('landing-assets/images/ss3.png')}}" alt="image">
                {{-- <img src="{{ asset('landing-assets/images/screen1.jpg')}}" alt="image"> --}}
            </div>
        </div>
    </div>
    <!-- // end .section -->

    <div class="section">
        <div class="container">
            <div class="section-title">
                <small>FAQ</small>
                <h3>Frequently Asked Questions</h3>
            </div>

            <div class="row pt-4">
                <div class="col-md-6">
                    <h4 class="mb-3">Bagaimana Cara Installnya?</h4>
                    <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>
                    <h4 class="mb-3">Bagaimana memulai videonya?</h4>
                    <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-3">Bagaimana cara mendaftarnya?</h4>
                    <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>
                    <h4 class="mb-3">Bagaimana cara menjawab quiz?</h4>
                    <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <!--
    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">
                {{-- <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div> --}}
                <img src="{{ asset('landing-assets/images/login-android.png')}}" alt="iphone" class="img-fluid" style="max-height: 500px">
                <h2>Download</h2>
                <p class="tagline">Available for all major mobile and desktop platforms.</p>
                <div class="my-4">
                    <a href="#" class="btn btn-light"><img src="{{ asset('landing-assets/images/appleicon.png')}}" alt="icon"> App Store</a>
                    <a href="#" class="btn btn-light"><img src="{{ asset('landing-assets/images/playicon.png')}}" alt="icon"> Google play</a>
                </div>
                <p class="text-primary"><small><i>*Works on iOS 10.0.5+, Android Kitkat and above. </i></small></p>
            </div>
        </div>

    </div>
    -->
    <!-- // end .section -->
    <div class="light-bg py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:support@mobileapp.com">support@bbook-application.xyz</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="#"><span class="ti-facebook"></span></a>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                        <a href="#"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->
    <footer class="my-5 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class="mb-2"><small>COPYRIGHT © 2020. ALL RIGHTS RESERVED. THESIS BY <a href="#">MAHARANI </a></small></p>
        <small>
            <a href="#" class="m-2">PRESS</a>
            <a href="#" class="m-2">TERMS</a>
            <a href="#" class="m-2">PRIVACY</a>
        </small>
    </footer>

    <!-- jQuery and Bootstrap -->
    <script src="{{ asset('landing-assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('landing-assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('landing-assets/js/owl.carousel.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('landing-assets/js/script.js') }}"></script>

</body>

</html>

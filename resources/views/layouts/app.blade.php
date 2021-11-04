{{-- @php
$categories = Adminetic\Category\Models\Admin\Category::all();
@endphp --}}

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="it-rating" content="it-rat-cd303c3f80473535b3c667d0d67a7a11" />
    <meta name="cmsmagazine" content="3f86e43372e678604d35804a67860df7" />
    <title>Adminetic - @yield('title')</title>
    <meta name='description' content="" />
    <meta name="keywords" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" class="styles" />
</head>

<body class="loaded">
    <!-- BEGIN BODY -->
    <div class="main-wrapper">
        <!-- BEGIN CONTENT -->
        <main class="content">
            @yield('main')
        </main>
        <!-- CONTENT EOF   -->
        <!-- BEGIN HEADER -->
        <header class="header">
            <div class="wrapper">
                <div class="header_top">
                    <div class="header_cols">
                        <div class="header_categ">
                            <a href="#" class="header_categ_opener"><span class="icon-grid"></span>Categories</a>
                            <div class="header_categ_drop">
                                <ul class="catlist">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('blog', $category->id) }}">{{ $category->name }}<span>({{ $category->posts->count() }})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="mailto:info@sitename.com" class="header_mail"><span
                                class="icon-mail"></span>@setting('info_email')</a>
                    </div>
                </div>
                <div class="header_mid">
                    <a href="{{ route('index') }}" class="header_logo logo" title=""><img
                            data-src="{{ asset('assets/img/logo.png') }}"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" /></a>
                    <ul class="header_nav">
                        <li><a href="#recent" class="js-local">Recent posts</a></li>
                        <li><a href="#popular" class="js-local">popular</a></li>
                        <li><a href="#mostreaded" class="js-local">Most read</a></li>
                        <li><a href="#hot" class="js-local">Hot stuff</a></li>
                        <li><a href="#top" class="js-local">top of the week</a></li>
                        <li><a href="blog.html" class="">Must read</a></li>
                    </ul>
                    <a href="#" class="button-nav"><span></span></a>
                </div>
                <div class="navoverlay"></div>
            </div>
        </header>
        <!-- HEADER EOF   -->
        <!-- BEGIN FOOTER -->
        <footer class="footer">
            <div class="wrapper">
                <div class="footer_cols">
                    <div class="footer_cols_item footer_cols_item-1">
                        <div class="footer_title">About</div>
                        <div class="footer_txt">@setting('about')</div>
                    </div>
                    <div class="footer_cols_item footer_cols_item-2">
                        <div class="footer_title">Categories</div>
                        <ul class="footer_list">
                            @foreach ($categories as $key => $category)
                                <li><a href="{{ route('blog', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer_cols_item footer_cols_item-3">
                        <div class="footer_title">Follow us</div>
                        <div class="soc">
                            <div class="soc_item"> mm
                                <a href="@setting('facebook')" target="_blank">
                                    <span class="soc_item_icon"><span class="icon-fb"></span></span>
                                    <span class="soc_item_txt">2,1 k+</span>
                                </a>
                            </div>
                            <div class="soc_item">
                                <a href="@setting('twitter')" target="_blank">
                                    <span class="soc_item_icon"><span class="icon-tw"></span></span>
                                    <span class="soc_item_txt">3,6 k+</span>
                                </a>
                            </div>
                            <div class="soc_item">
                                <a href="@setting('youtube')" target="_blank">
                                    <span class="soc_item_icon"><span class="icon-youtube"></span></span>
                                    <span class="soc_item_txt">2,8 k+</span>
                                </a>
                            </div>
                            <div class="soc_item">
                                <a href="@setting('instagram')" target="_blank">
                                    <span class="soc_item_icon"><span class="icon-instagram"></span></span>
                                    <span class="soc_item_txt">6,3 k+</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bot">
                    <div class="footer_copy">© Benchy 2021. All rights reserved</div>
                    <div class="footer_links">
                        <a href="#">Privacy Policy</a> <span class="dash"></span> <a href="#">Terms &
                            Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER EOF   -->
        <div class="overlay"></div>
    </div>
    <!-- BODY EOF   -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/components/slick.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>

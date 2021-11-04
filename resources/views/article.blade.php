@extends('layouts.app')

@section('title', 'Article')

@section('main')
    <div class="section-post">
        <div class="wrapper">
            <div class="pagetitle">
                <div class="h1">Post</div>
            </div>
            <div class="breadcrumbs">
                <a href="#">Home</a> <span class="dash"></span> <a href="{{ route('blog', $post->category->id) }}">{{ $post->category->name }}</a> <span
                    class="dash"></span> <span>{{ $post->name }}</span>
            </div>
            <div class="columns">
                <div class="columns_center">
                    <article class="article">
                        <div class="article_cover">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="" />
                            <a href="{{ route('blog', $post->category->id) }}"
                                class="cats_item">{{ $post->category->name }}</a>
                        </div>
                        <div class="article_infoline infoline">
                            <div class="infoline_date">{{ $post->created_at->toDateString() }}</div> <span
                                class="dash"></span>
                            <div class="infoline_author">
                                <div class="ava"><img data-src="{{ asset('assets/img/ava.png') }}"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" />
                                </div>
                                {{ $post->author->name }}
                            </div>
                        </div>
                        <div class="article_txt">
                            <h1>{{ $post->name }}</h1>
                            <p class="short">{!! $post->body !!}</p>
                            @if ($comment)
                                <blockquote>
                                    <p>“{{ $comment->comment }}”</p>
                                    <cite>{{ $comment->name }}</cite>
                                </blockquote>
                            @endif
                            <h3>Pariatur cupidatat Lorem irure nisi Velit qui</h3>
                            <p>Pariatur cupidatat Lorem irure nisi. Velit qui irure consectetur do cupi roident id est ex
                                sunt nostrud nisi mine consectetur do cupi roident id est ex sunt nostrud nisi minim ut.
                                Cupidatat velit dolore consectetur deserunt laboris magna eiusmod aliquip consectetur
                                commodo in eiusmod aliqua cupidatat. Nostrud laboris et eu mollit qui esse dolore
                                exercitation in dolore sint nisi eu aliqua.</p>
                            <ol>
                                <li>As a participatory media culture, social media platforms or social networking sites are
                                    forms of mass communication that, through media technologies.</li>
                                <li>Allow large amounts of product and distribution of content to reach the largest audience
                                    possible.</li>
                                <li>However, there are downsides to virtual promotions as servers, systems, and websites may
                                    crash, fail, or become overloaded with information. You also can stand risk of losing
                                    uploaded information and storage and at a use can also be effected by a number of
                                    outside variables.</li>
                            </ol>
                        </div>
                        <div class="article_tags">
                            <div class="article_tags_title">Tags:</div>
                            @foreach ($post->tags as $tag)
                                <a href="">{{ $tag->name }}</a> <span class="dash"></span>
                            @endforeach
                            {{-- <a href="blog.html">#Travel</a> <span class="dash"></span> <a href="blog.html">#holiday</a> <span class="dash"></span> <a href="blog.html">#hobby</a> --}}
                        </div>
                        <div class="author">
                            <div class="author_img"><img data-src="img/ava.png"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" /></div>
                            <div class="author_cont">
                                <div class="author_name">{{ $post->author->name }}</div>
                                <div class="author_txt">Web developer since 2006. Create hundreds of websites, HTML and
                                    CSS3 expert, who started to learn web design on a <span
                                        class="nowrap">world-class</span> level. </div>
                            </div>
                        </div>
                    </article>
                    <div class="comments_form">
                        <h3>Leave a comment</h3>
                        <form id="form" method="post" action="{{ route('comment.store') }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form_cols">
                                <div class="form_cols_item">
                                    <div class="form_row">
                                        <input type="text" class="form-control" placeholder="Your name" name="name" />
                                    </div>
                                </div>
                                <div class="form_cols_item">
                                    <div class="form_row">
                                        <input type="tel" class="form-control" placeholder="+1 (___) ___ __ __"
                                            name="phone" />
                                    </div>
                                </div>
                                <div class="form_cols_item">
                                    <div class="form_row">
                                        <input type="email" class="form-control" placeholder="Your email" name="email" />
                                    </div>
                                </div>
                            </div>
                            <div class="form_row">
                                <textarea class="form-control" placeholder="Enter your comment" name="comment"></textarea>
                            </div>
                            <div class="form_btn"><button class="btn">post comment</button></div>
                        </form>
                    </div>
                    <a href="#" class="bann"><img data-src="img/bad1.jpg"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" /></a>
                </div>
                <aside class="columns_sidebar sidebar">
                    <div class="sidebar_search">
                        <form>
                            <div class="search">
                                <input type="text" class="form-control" placeholder="Search..." />
                                <button class="btn"><span class="icon-search"></span></button>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar_widget">
                        <h3>Recent stories</h3>
                        <div class="stories">
                            @foreach ($recents as $post)
                                <div class="stories_item">
                                    <div class="stories_item_img"><a href="{{ route('article', $post->id) }}"><img
                                                data-src="{{ asset('storage/' . $post->image) }}"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                alt="" /></a></div>
                                    <div class="stories_item_infoline infoline">
                                        <div class="infoline_date">{{ $post->created_at->toDateString() }}</div> <span
                                            class="dash"></span>
                                        <div class="infoline_tag">
                                            @foreach ($post->tags as $tag)
                                                #{{ $tag->name }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="stories_item_title"><a
                                            href="{{ route('article', $post->id) }}">{{ $post->name }}</a></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <h3>Categories</h3>
                        <div class="cats">
                            @foreach ($categories as $category)
                                <a href="" class="cats_item">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="#" class="bann"><img data-src="img/bad2.jpg"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" /></a>
                    <div class="sidebar_widget">
                        <h3>Follow us</h3>
                        <div class="soc">
                            <div class="soc_item">
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
                    <div class="sidebar_widget">
                        <h3>Popular posts</h3>
                        <div class="popular">
                            @foreach ($popular_posts as $post)
                                <div class="popular_item">
                                    <div class="popular_item_img"><a href="{{ route('article', $post->id) }}"><img
                                                data-src="{{ asset('storage/' . $post->image) }}"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                alt="" /></a></div>
                                    <div class="popular_item_cont">
                                        <div class="popular_item_title"><a
                                                href="{{ route('article', $post->id) }}">{{ $post->name }}</a></div>
                                        <div class="popular_item_infoline infoline">
                                            <div class="infoline_date">{{ $post->created_at->toDateString() }}</div>
                                            <span class="dash"></span>
                                            <div class="infoline_tag"><span class="icon-comm"></span>n/a</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

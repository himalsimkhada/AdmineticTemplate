@extends('layouts.app')

@section('title', 'Home')

@section('main')
    <div class="section-welcome">
        <div class="welcome_slider js-welcome_slider">
            @foreach ($posts as $key => $post)
                <div class="welcome_slider_item"><a href="{{ route('article', $post->id) }}" class="cover_link"></a>
                    <div class="welcome_slider_img"><img src="{{ asset('storage/' . $post->image) }}" alt="" /></div>
                    <div class="welcome_slider_cont">
                        <div class="welcome_slider_cats cats">
                            <a href="{{ route('blog', $post->category->id) }}"
                                class="cats_item">{{ $post->category->name }}</a>
                        </div>
                        <div class="welcome_slider_title h3"><a
                                href="{{ route('article', $post->id) }}">{{ $post->title }}</a></div>
                        <div class="welcome_slider_infoline infoline">
                            <div class="infoline_date">{{ $post->created_at->toDateString() }}</div> <span
                                class="dash"></span>
                            <div class="infoline_author">
                                <div class="ava"><img data-src="{{ asset('assets/img/ava6.png') }}"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" />
                                </div>
                                {{ $post->author->name }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <section class="section-stories">
        <div class="wrapper">
            <a href="#" class="bann"><img src="{{ asset('assets/img/bad3.jpg') }}" alt="" /></a>
            <div id="recent" class="recent_wrap">
                <div class="section_title">
                    <h2>Recent stories</h2>
                </div>
                <div class="columns">
                    <div class="columns_center">
                        <div class="recent">
                            @foreach ($latest as $post)
                                <div class="recent_item">
                                    <div class="recent_item_img">
                                        <a href="{{ route('article', $post->id) }}"><img data-src="{{ asset('storage/' . $post->image) }}"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                alt="" /></a>
                                        <div class="recent_item_cats cats"><a
                                                href="{{ route('blog', $post->category->id) }}"
                                                class="cats_item">{{ $post->category->name }}</a>
                                        </div>
                                    </div>
                                    <div class="recent_item_cont">
                                        <div class="recent_item_title h3"><a
                                                href="{{ route('article', $post->id) }}">{{ $post->name }}</a></div>
                                        <div class="recent_item_txt">{{ $post->excerpt }}</div>
                                        <div class="recent_item_infoline infoline">
                                            <div class="infoline_date">{{ $post->created_at->toDateString() }}</div>
                                            <span class="dash"></span>
                                            <div class="infoline_author">
                                                <div class="ava"><img
                                                        data-src="{{ asset('storage/' . $post->author->image) }}"
                                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                                                        class="js-img" alt="" /></div>
                                                {{ $post->author->name }}
                                            </div>
                                            <a href="{{ route('article', $post->id) }}" class="btn-arr"><span
                                                    class="icon-arrow"></span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <aside class="columns_sidebar sidebar">
                        <div class="sidebar_widget">
                            <div class="stories">
                                @foreach ($random_posts as $post)
                                    <div class="stories_item">
                                        <div class="stories_item_img"><a href="{{ route('article', $post->id) }}"><img
                                                    data-src="{{ asset('storage/' . $post->image) }}"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                    alt="" /></a></div>
                                        <div class="stories_infoline infoline">
                                            <div class="infoline_date">{{ $post->created_at->toDateString() }}</div>
                                            <span class="dash"></span>
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
                            <div class="stories_btn"><a href="#" class="btn">view all</a></div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <section class="section-popular" id="popular">
        <div class="wrapper">
            <div class="section_title">
                <h2>Popular posts</h2>
                <a href="blog.html" class="link-view">View all posts <span class="icon-arr"></span></a>
            </div>
            <div class="columns columns-invers">
                <div class="columns_center">
                    @foreach ($popular_posts as $key => $post)
                        <div class="popular_main">
                            <div class="popular_main_img"><a href="{{ route('article', $post->id) }}"><img
                                        data-src="{{ asset('storage/' . $post->image) }}"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                        alt="" /></a>
                            </div>
                            <div class="popular_main_cont">
                                <div class="popular_main_infoline infoline">
                                    <div class="infoline_date">{{ $post->created_at->toDateString() }}</div> <span
                                        class="dash"></span>
                                    <div class="infoline_tag">
                                        @foreach ($post->tags as $tag)
                                            #{{ $tag->name }}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="popular_main_title h3"><a
                                        href="{{ route('article', $post->id) }}">{{ $post->name }}</a></div>
                                <div class="popular_main_txt">{{ $post->excerpt }}</div>
                                <a href="{{ route('article', $post->id) }}" class="link-view">Read more <span
                                        class="icon-arr"></span></a>
                            </div>
                        </div>
                        @if ($key == 1)
                        @break
                    @endif
                    @endforeach
                </div>
                <aside class="columns_sidebar sidebar">
                    <div class="sidebar_widget">
                        <div class="popular">
                            @foreach ($popular_posts as $key => $post)
                                @if ($key >= 1)
                                    <div class="popular_item">
                                        <div class="popular_item_img"><a href="{{ route('article', $post->id) }}"><img
                                                    data-src="{{ asset('storage/' . $post->image) }}"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                    alt="" /></a></div>
                                        <div class="popular_item_cont">
                                            <div class="popular_item_title"><a
                                                    href="{{ route('article', $post->id) }}">{{ $post->name }}</a>
                                            </div>
                                            <div class="popular_item_infoline infoline">
                                                <div class="infoline_date">{{ $post->created_at->toDateString() }}</div>
                                                <span class="dash"></span>
                                                <div class="infoline_tag">
                                                    @foreach ($post->tags as $tag)
                                                        {{ $tag->name }}
                                                    @endforeach
                                                </div> <span class="dash"></span>
                                                <div class="infoline_tag"><span class="icon-comm"></span>5</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($key == 4)
                                @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <section class="section-readed">
        <div class="wrapper">
            <a href="#" class="bann"><img data-src="img/bad4.jpg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                    class="js-img" alt="" /></a>
            <div class="columns" id="mostreaded">
                <div class="columns_center">
                    <div class="section_title">
                        <h2>Most read posts</h2>
                        <a href="blog.html" class="link-view">View all posts <span class="icon-arr"></span></a>
                    </div>
                    <div class="readed">
                        @foreach ($popular_posts as $post)
                            <div class="readed_item">
                                <div class="readed_item_img">
                                    <a href="{{ route('article', $post->id) }}"><img
                                            data-src="{{ asset('storage/' . $post->image) }}"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                            alt="" /></a>
                                    <div class="readed_item_cats cats">
                                        <a href="{{ route('blog', $post->category->id) }}"
                                            class="cats_item">{{ $post->category->name }}</a>
                                    </div>
                                </div>
                                <div class="readed_item_cont">
                                    <div class="readed_item_title"><a
                                            href="{{ route('article', $post->id) }}">{{ $post->name }}</a></div>
                                    <div class="readed_item_infoline infoline">
                                        <div class="infoline_date">{{ $post->created_at->toDateString() }}</div> <span
                                            class="dash"></span>
                                        <div class="infoline_author">
                                            <div class="ava"><img
                                                    data-src="{{ asset('storage/' . $post->author->image) }}"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                    alt="" /></div>
                                            {{ $post->author->name }}
                                        </div>
                                        <a href="{{ route('article', $post->id) }}" class="btn-arr"><span
                                                class="icon-arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <aside class="columns_sidebar sidebar">
                    <div class="section_title">
                        <h2>Categories</h2>
                    </div>
                    <div class="sidebar_widget">
                        <ul class="catlist">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('blog', $category->id) }}">{{ $category->name }}
                                        <span>({{ $category->posts->count() }})</span> </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="#" class="bann"><img data-src="img/bad2.jpg"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" /></a>
                </aside>
            </div>
        </div>
    </section>
    <section class="section-subsc">
        <div class="wrapper">
            <form>
                <div class="subsc">
                    <h3>Stay up to date!<br />Sunscribe!</h3>
                    <input type="text" class="form-control" placeholder="Your email" />
                    <button class="btn">subscribe</button>
                </div>
            </form>
        </div>
    </section>
    <section class="section-hot" id="hot">
        <div class="wrapper">
            <div class="section_title">
                <h2>Hot stuff</h2>
            </div>
            <div class="hot">
                <div class="hot_img"><a href="{{ route('article', $hot_news->id) }}"><img data-src="{{ asset('storage/' . $hot_news->image) }}"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" /></a></div>
                <div class="hot_cont">
                    <div class="hot_cats cats">
                        <a href="{{ route('blog', $hot_news->category->id) }}" class="cats_item">{{ $hot_news->category->name }}</a>
                    </div>
                    <h2 class="hot_title"><a href="{{ $hot_news->id }}">{{ $hot_news->name }}</a></h2>
                    <div class="hot_txt">{{ $hot_news->name }}</div>
                    <div class="hot_infoline infoline">
                        <div class="infoline_date">{{ $hot_news->created_at->toDateString() }}</div> <span class="dash"></span>
                        <div class="infoline_author">
                            <div class="ava"><img data-src="{{ asset('storage/' . $hot_news->author->image) }}"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" /></div>
                            {{ $hot_news->author->name }}
                        </div>
                    </div>
                    <a href="{{ route('article', $hot_news->id) }}" class="link-view">Read more <span class="icon-arr"></span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-topof" id="top">
        <div class="wrapper">
            <div class="section_title">
                <h2>top of the week</h2>
                <a href="blog.html" class="link-view">View all posts <span class="icon-arr"></span></a>
            </div>
            <div class="topof">
                @foreach ($weekly_post as $post)
                <div class="topof_item">
                    <div class="topof_item_img"><a href="{{ route('article', $post->id) }}"><img data-src="{{ asset('storage/' . $post->image) }}"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" /></a></div>
                    <div class="topof_cats cats">
                        <a href="{{ route('blog', $post->c_id) }}" class="cats_item">{{ $post->c_name }}</a>
                    </div>
                    <div class="topof_item_title"><a href="{{ route('article', $post->id) }}">{{ $post->name }}</a></div>
                    <div class="topof_item_infoline infoline">
                        <div class="infoline_date">{{ $post->created_at }}</div> <span class="dash"></span>
                        <div class="infoline_author">
                            <div class="ava"><img data-src="{{ asset('storage/') }}"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="" /></div>
                            {{ $post->u_name }}
                        </div>
                    </div>
                    <a href="{{ route('article', $post->id) }}" class="link-view">Read more <span class="icon-arr"></span></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

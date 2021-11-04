@extends('layouts.app')

@section('title', 'Blog')

@section('main')
    <section class="section-post">
        <div class="wrapper">
            <div class="pagetitle">
                <h1>Blog</h1>
            </div>
            <div class="breadcrumbs">
                <a href="#">Home</a> <span class="dash"></span> <span>{{ $category->name }}</span>
            </div>
            <div class="columns">
                <div class="columns_center">
                    <div class="article article_list">
                        @forelse ($posts as $post)
                            <div class="article_item">
                                <div class="article_item_cover">
                                    <a href="{{ route('article', $post->id) }}"><img
                                            src="{{ asset('storage/' . $post->image) }}" alt="" /></a>
                                    <a href="{{ route('blog', $post->category->id) }}"
                                        class="cats_item">{{ $post->category->name }}</a>
                                </div>
                                <div class="article_infoline infoline">
                                    <div class="infoline_date">{{ $post->created_at->toDateString() }}</div> <span
                                        class="dash"></span>
                                    <div class="infoline_author">
                                        <div class="ava"><img data-src="img/ava.png"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                alt="" /></div>
                                        {{ $post->author->name }}
                                    </div>
                                </div>
                                <div class="article_txt">
                                    <div class="article_title h2"><a
                                            href="{{ route('article', $post->id) }}">{{ $post->name }}</a></div>
                                    <div class="article_desc">{{ $post->excerpt }}</div>
                                    <div class="article_btn"><a href="{{ route('article', $post->id) }}"
                                            class="btn">read
                                            more</a>
                                    </div>
                                </div>
                            </div>

                        @empty
                            No Data here
                        @endforelse
                    </div>
                    <div class="pagenavi">
                        {{ $posts->links('vendor.pagination.custom') }}
                        {{-- <a href="#"><span class="">
                                < </span></a> --}}
                        {{-- <span class="current">1</span>
                        <a href="#">2</a>
                        <a href="#"><span class="icon-arrow"></span></a> --}}
                    </div>
                    <a href="#" class="bann"><img data-src="{{ asset('assets/img/bad1.jpg') }}"
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
                                <a href="{{ route('blog', $category->id) }}"
                                    class="cats_item">{{ $category->name }}</a>
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
    </section>
@endsection

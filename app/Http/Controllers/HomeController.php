<?php

namespace App\Http\Controllers;

use Adminetic\Website\Models\Admin\Post;
use App\Models\Admin\Comment;
use App\Models\Category;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use CyrildeWit\EloquentViewable\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
    public function index() {
        $posts = Post::where('status', 3)->get();
        $latest = Post::where('status', 3)->latest()->take(3)->get();

        $popular_posts = Post::where('status', 3)->orderByViews()->take(4)->get();
        $random_posts = Post::where('status', 3)->inRandomOrder()->take(3)->get();

        $hot_news = Post::where('status', 3)->where('hot_news', 1)->orderByViews()->first();

        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        // $dd = DB::table('views')->select('viewable_id', DB::raw('count(viewable_id) AS count'))->whereBetween('viewed_at', [Carbon::now()->startOfWeek()->format('Y-m-d H:i'), Carbon::now()->endOfWeek()->format('Y-m-d H:i')])->groupBy('viewable_id')->get();

        $weekly_post = DB::table('posts')->join('views', 'posts.id', '=', 'views.viewable_id')->join('users', 'posts.author_id', '=', 'users.id')->join('categories', 'posts.category_id', '=', 'categories.id')->select('posts.*', 'posts.name AS p_name', 'users.name AS u_name', 'users.id AS u_id', 'categories.id AS c_id', 'categories.name AS c_name', 'views.viewable_id', DB::raw('count(viewable_id) AS count'))->whereBetween('viewed_at', [Carbon::now()->startOfWeek()->format('Y-m-d H:i'), Carbon::now()->endOfWeek()->format('Y-m-d H:i')])->groupBy('viewable_id')->orderBy('count', 'DESC')->take(3)->get();

        // dd($weekly_post);

        return view('welcome', compact('posts', 'latest', 'random_posts', 'popular_posts', 'hot_news', 'weekly_post'));
    }

    public function article($id) {
        $post = Post::with('category', 'author')->where('status', 3)->where('id', $id)->first();
        views($post)->record();
        $recents = Post::with('category', 'author')->where('status', 3)->orderBy('id', 'DESC')->take(2)->get();
        $comment = Comment::where('post_id', $id)->first();
        $popular_posts = Post::where('status', 3)->orderByViews()->take(3)->get();

        return view('article', compact('post', 'recents', 'comment', 'popular_posts'));
    }

    public function blog($id) {
        $category = Category::where('id', $id)->first();

        $posts = $category->posts()->paginate(3);

        $recents = Post::where('status', 3)->latest()->take(2)->get();

        $popular_posts = Post::where('status', 3)->orderByViews()->take(3)->get();

        return view('blog', compact('category', 'posts', 'recents', 'popular_posts'));
    }
}

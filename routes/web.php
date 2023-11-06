<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\AuthController;

use App\Http\Controllers\BlogPostController;


use App\Http\Controllers\GetArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArticleManagementController;
use App\Http\Controllers\CommentManagementController;
use App\Http\Controllers\SearchController;


use Illuminate\Support\Facades\Route;


//トップページ
Route::get('/', [BlogPostController::class, 'index']);

//記事投稿
Route::post('/article-post.php', [BlogPostController::class, 'postBlogArticle']);
//コメント投稿
Route::post('/comment-post.php', [CommentController::class, 'postComment']);
//コメント管理ページ
Route::get('/admin/comment-management.php', [CommentManagementController::class, 'deleteCommentList'])->name('comment-management')->middleware('auth');;
//記事管理ページ
Route::get('/admin/article-management.php', [ArticleManagementController::class, 'deleteArticlesList'])->name('article-management')->middleware('auth');;
//記事削除
Route::post('/deleteBlogPost.php', [ArticleManagementController::class, 'delete'])->name('article.delete')->middleware('auth');;
//コメント削除
Route::post('/deleteCommentPost.php', [CommentManagementController::class, 'delete'])->name('comment.delete')->middleware('auth');;

//記事単体取得
Route::get('/id={id}', [GetArticleController::class, 'showPost']);

//ログインページ
Route::get('/admin/login.php', [AuthController::class, 'showLoginForm']);
//ログインポスト
Route::post('/admin/login.php', [AuthController::class, 'login']);
//管理ページトップ
Route::get('/admin/', [AuthController::class, 'adminPage'])->middleware('auth');
//登録ページ
Route::get('/admin/join.php', [AuthController::class, 'showRegistrationForm']);
//ユーザー登録をポスト
Route::post('/admin/join.php', [AuthController::class, 'register']);


// 記事編集ページを表示
Route::get('/articles/{id}/edit.php', [ArticleManagementController::class, 'edit'])->name('articles.edit')->middleware('auth');

// 記事を更新
Route::put('/articles/{id}/update.php', [ArticleManagementController::class, 'update'])->name('articles.update')->middleware('auth');

// コメント編集ページを表示
Route::get('/comment/{id}/edit.php', [CommentManagementController::class, 'edit'])->name('comment.edit')->middleware('auth');

// コメントを更新
Route::put('/comment/{id}/update.php', [CommentManagementController::class, 'update'])->name('comment.update')->middleware('auth');
//検索ページ
Route::get('/search.php', [SearchController::class, 'search'])->name('search');


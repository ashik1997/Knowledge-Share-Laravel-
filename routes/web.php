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

// Route::get('/', function () {
//     return view('welcome');
// });

// --------------------------- frontend --------------------------------------

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/home', 'Frontend\HomeController@index')->name('home');

Route::get('/search', 'Frontend\HomeController@search')->name('search');

Route::get('/book', 'Frontend\BooksController@showBooks')->name('book');
Route::get('/book/{id}', 'Frontend\BooksController@showBooks')->name('book.category');
Route::get('/book-details/{id}', 'Frontend\BooksController@showBookDetails')->name('book.details');
Route::post('/book-review', 'Frontend\BooksController@reviewSubmit')->name('book-review.submit');
Route::post('/download', 'Frontend\DownloadController@download')->name('pdf.download');

Route::get('/blog', 'Frontend\BlogController@showBlog')->name('blog');
Route::get('/blog-details/{id}', 'Frontend\BlogController@showBlogDetails')->name('blog.details');
Route::post('/blog-review', 'Frontend\BlogController@reviewSubmit')->name('blog-review.submit');

Route::get('/audio', 'Frontend\AudioController@audioList')->name('audio');
Route::get('/audio-details/{id}', 'Frontend\AudioController@showAudioDetails')->name('audio.details');
Route::post('/audio-review', 'Frontend\AudioController@reviewSubmit')->name('audio-review.submit');

Route::get('/video', 'Frontend\VideoController@videoList')->name('video');
Route::get('/video-details/{id}', 'Frontend\VideoController@showVideoDetails')->name('video.details');
Route::post('/video-review', 'Frontend\VideoController@reviewSubmit')->name('video-review.submit');

Route::get('/send', 'MailController@send')->name('send');

// ---------------------------- backend --------------------------------------

Auth::routes();
// ---------------------------- user route ------------------------------------
 Route::prefix('user')->group(function(){
	Route::get('/', 'Backend\User\DashboardController@index')->name('user.dashboard');

	Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

	Route::get('/profile', 'Backend\User\ProfileController@showProfile')->name('user.profile');
	Route::get('/edit-profile', 'Backend\User\ProfileController@showEditProfileForm')->name('user.edit.profile');
	Route::post('/update-profile', 'Backend\User\ProfileController@updateProfile')->name('user.update_profile.submit');
	// -------------------- book------------------------------------------------
	Route::get('/add-book', 'Backend\BookController@showBookPostForm')->name('user.add-book');
	Route::get('/sub-category', 'Backend\BookController@showSubCategory')->name('user.sub-category');

	Route::post('/add-book', 'Backend\BookController@showBookPostForm')->name('user.add-book.submit');
	Route::get('/show-books', 'Backend\BookController@showBooksList')->name('user.show-books');

	Route::get('/edit-book/{id}', 'Backend\BookController@showEditBookPostForm')->name('user.edit-book');
	Route::post('/edit-book/{id}', 'Backend\BookController@showEditBookPostForm')->name('user.edit-book');
	Route::get('/delete-book/{id}', 'Backend\BookController@deleteBook')->name('user.delete-book');

	// ---------------------------audio---------------------------------------
	Route::get('/add-audio', 'Backend\AudioController@showAudioPostForm')->name('user.add-audio');
	Route::post('/add-audio', 'Backend\AudioController@showAudioPostForm')->name('user.add-audio.submit');

	Route::get('/audio-list', 'Backend\AudioController@showAudiosList')->name('user.audio-list');

	Route::get('/delete-audio/{id}', 'Backend\AudioController@deleteAudio')->name('user.delete-audio');

	Route::get('/edit-audio/{id}', 'Backend\AudioController@showEditAudioPostForm')->name('user.edit-audio');
	Route::post('/edit-audio/{id}', 'Backend\AudioController@showEditAudioPostForm')->name('user.edit-audio');


	// ---------------------------video--------------------------------
	Route::get('/add-video', 'Backend\VideoController@showVideoPostForm')->name('user.add-video');

	Route::post('/add-video', 'Backend\VideoController@showVideoPostForm')->name('user.add-video.submit');

	Route::get('/video-list', 'Backend\VideoController@showVideoList')->name('user.video-list');
	Route::get('/delete-video/{id}', 'Backend\VideoController@deleteVideo')->name('user.delete-video');

	Route::get('/edit-video/{id}', 'Backend\VideoController@showEditVideoPostForm')->name('user.edit-video');
	Route::post('/edit-video/{id}', 'Backend\VideoController@showEditVideoPostForm')->name('user.edit-video');

	// ---------------------------blog--------------------------------------------

	Route::get('/add-blog', 'Backend\BlogController@showBlogPostForm')->name('user.add-blog');

	Route::post('/add-blog', 'Backend\BlogController@showBlogPostForm')->name('user.add-blog.submit');

	Route::get('/blog-list', 'Backend\BlogController@showBlogList')->name('user.blog-list');
	Route::get('/delete-blog/{id}', 'Backend\BlogController@deleteBlog')->name('user.delete-blog');

	Route::get('/edit-blog/{id}', 'Backend\BlogController@showEditBlogPostForm')->name('user.edit-blog');
	Route::post('/edit-blog/{id}', 'Backend\BlogController@showEditBlogPostForm')->name('user.edit-blog');

 });
// ------------------------------ admin route -----------------------------------------
 Route::prefix('admin')->group(function(){

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('/check-email', 'Auth\AdminLoginController@checkEmail')->name('admin.check.email');

	Route::get('/', 'Backend\Admin\DashboardController@index')->name('admin.dashboard');

	Route::get('/change-password', 'Backend\Admin\ChangePasswordController@showChangePasswordForm')->name('admin.change.password');
	Route::get('/check-password', 'Backend\Admin\ChangePasswordController@checkPassword')->name('admin.check.password');
	Route::post('/change-password', 'Backend\Admin\ChangePasswordController@updatePassword')->name('admin.change.password.submit');

	Route::get('/edit-profile', 'Backend\Admin\ChangePasswordController@showChangePasswordForm')->name('admin.edit.profile');
	
	Route::post('/update-profile', 'Backend\Admin\ProfileController@updateProfile')->name('admin.update_profile.submit');
	Route::get('/profile', 'Backend\Admin\ProfileController@showProfile')->name('admin.profile');
	
	Route::match(['get','post'],'/add-category', 'Backend\Admin\CategoryController@addCategory')->name('admin.add-category');
	Route::get('/show-category', 'Backend\Admin\CategoryController@showCategory')->name('admin.show-category');
	Route::match(['get','post'],'/edit-category/{id}', 'Backend\Admin\CategoryController@editCategory')->name('admin.edit-category');
	Route::get('/delete-category/{id}', 'Backend\Admin\CategoryController@deleteCategory')->name('admin.delete-category');

	Route::get('/blog-post', 'Backend\BlogController@showBlogPost')->name('admin.blog-post');

	Route::get('/show-unapproved-books', 'Backend\Admin\BookController@showUnapprovedBooksList')->name('admin.show-unapproved-books');
	Route::get('/approved-book/{id}', 'Backend\Admin\BookController@showUnapprovedBooksList')->name('admin.approved-book');
	Route::get('/delete-book/{id}', 'Backend\Admin\BookController@deleteBook')->name('admin.delete-book');

	Route::get('/unapproved-video-list', 'Backend\Admin\VideoController@showUnapprovedVideosList')->name('admin.unapproved-video-list');
	Route::get('/approved-video/{id}', 'Backend\Admin\VideoController@showUnapprovedVideosList')->name('admin.approved-video');
	Route::get('/delete-video/{id}', 'Backend\Admin\VideoController@deleteVideo')->name('admin.delete-video');

	Route::get('/unapproved-audio-list', 'Backend\Admin\AudioController@showUnapprovedAudiosList')->name('admin.unapproved-audio-list');
	Route::get('/approved-audio/{id}', 'Backend\Admin\AudioController@showUnapprovedAudiosList')->name('admin.approved-audio');
	Route::get('/delete-audio/{id}', 'Backend\Admin\AudioController@deleteAudio')->name('admin.delete-audio');

	Route::get('/approved-blog/{id}', 'Backend\Admin\BlogController@showUnapprovedBlogsList')->name('admin.approved-blog');
	Route::get('/delete-blog/{id}', 'Backend\Admin\BlogController@deleteBlog')->name('admin.delete-blog');

	Route::get('/book-list', 'Backend\Admin\BookController@showBooksList')->name('admin.book-list');
	Route::get('/video-list', 'Backend\Admin\VideoController@showVideoList')->name('admin.video-list');

	Route::get('/audio-list', 'Backend\Admin\AudioController@showAudioList')->name('admin.audio-list');

	Route::get('/blog-list', 'Backend\Admin\BlogController@showBlogList')->name('admin.blog-list');



 });

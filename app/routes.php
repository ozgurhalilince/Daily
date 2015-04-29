<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('/login', 'HomeController@login');

Route::get('/register', 'HomeController@register');

Route::post('/login-control', 'HomeController@loginControl');

Route::get('/homepage', array(
		'before' => 'filterMemberLoggedIn',
        'uses' => 'MemberController@memberHomepage'));

Route::get('/profile',  array(
		'before' => 'filterMemberLoggedIn',
        'uses' => 'MemberController@memberProfile'));

Route::get('/log-out','MemberController@logOut');

Route::post('/add-post', array(
		'before' =>  'filterMemberLoggedIn',
        'uses' => 'MemberController@addPost'));

Route::get('/delete-post-{postID}', 'MemberController@deletePost');

Route::post('/update-post', array(
		'before' => 'filterMemberLoggedIn',
        'uses' => 'MemberController@updatePost'));

Route::post('/search', array(
		'before' => 'filterMemberLoggedIn',
        'uses' => 'MemberController@search'));

Route::post('/nm-update', array(
		'before' => 'filterMemberLoggedIn',
        'uses' => 'MemberController@memberNameSurnameUpdate'));

Route::post('/photo-update', array(
		'before' => 'filterMemberLoggedIn',
        'uses' => 'MemberController@memberPhotoUpdate'));

Route::post('/ep-update', array(
		'before' => 'filterMemberLoggedIn',
        'uses' => 'MemberController@memberEmailPasswordUpdate'));

Route::get('/settings', array(
		'before' => 'filterMemberLoggedIn',
        'uses' => 'MemberController@memberSettings'));

Route::get('/follow', 'MemberController@follow');

Route::get('/show-post-{postID}', 'HomeController@showPost');

Route::get('/m-profile-{memberID}', 'HomeController@showMemberProfile');

Route::get('/admin', 'AdminController@homepage');

Route::get('/adminDeleteMember-{memberID}', 'AdminController@deleteMember');

Route::post('add-member', array(
    'as' => 'newMember',
    'uses' => 'MemberController@addMember'
));

Route::get('/deneme', array(
		'before' => 'filterMemberLoggedIn',
        'uses' => 'MemberController@deneme'));

Route::filter('filterMemberLoggedIn', 'MemberController@filterMember');


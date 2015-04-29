<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function login()
	{
		$value = Session::get('key');
		if ($value=="") 
			return View::make('login');
		if (Session::get('adminLoggedIn')) {
			return Redirect::to('admin');
		}
		return Redirect::to('homepage');
	}

	public function register()
	{
		$value = Session::get('key');
		if ($value=="") 
			return View::make('register');
		return Redirect::to('homepage');
	}

	public function loginControl()
	{
		$email = Input::get('email');
		$pw =  Input::get('password');
		$members = Members::get();
		$admins =Admin::get();
		foreach ($admins as $admin) {
			if ($email==$admin->email && Hash::check($pw, $admin->password)) {
				Session::put('adminLoggedIn', true);
				return Redirect::to('admin');
			}
		}
		foreach ($members as $m) {
			if ($m->email == $email && Hash::check($pw, $m->password)) {	
				Session::put('key', $m->memberID);
				return Redirect::to('homepage');
			}
		}
		return View::make('login', array(
		'message' => 'Kullanıcı adı veya Şifre Yanlış!'
		));
	}

	public function showPost($postID)
	{
		$memberID = Session::get('key');
		$post = Posts::find($postID);
		$member = Members::find($post->memberID);
		$data  = array(
			'post' => $post,
			'memberID' => $memberID,
			'member' => $member);

		if (Session::get('adminLoggedIn')) //adminse
			return View::make('admin/showPostForAdmin', $data);
		if ($memberID=="") //member değilse
			return View::make('showPost', $data);
		return View::make('member/showPostForMember', $data); //membersa	
	}

	public function showMemberProfile($memberID){
		$value = Session::get('key');
		$member = Members::find($memberID);
		$posts = DB::table('posts')
		->join('members', 'members.memberID', '=', 'posts.memberID')
		->where('members.memberID',$memberID)
		->get();
		
		$followings= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.followMemberID')
		->where('follow.memberID', $memberID)
		->select('members.name','members.surname','members.memberID','members.photo')
		->get();
		
		$followers= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.memberID')
		->where('follow.followMemberID', $memberID)
		->select('members.name','members.surname','members.memberID','members.photo')
		->get();
		
		$follow = false;
		foreach ($followers as $f) //takipçilerinde oturumu açık olan kişi varsa follow true
			if ($f->memberID==$value) 
				$follow = true;

		$data  = array(
			'member' => $member, 
			'posts' => $posts,
			'follow' => $follow,
			'followers' => $followers,
			'followings' => $followings
			);
		if (Session::get('adminLoggedIn')) 
			return View::make('admin/showMemberProfileForAdmin', $data);
		if ($value=="") //Session yoksa
			return View::make('showMemberProfile', $data);
		if ($value==$memberID)	//Kendi profili ise kendi profiline yönlendirilir. 
			return Redirect::to('profile');
		
		return View::make('member/showMemberProfilForMember', $data);
	}
}

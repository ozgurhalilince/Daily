<?php

class AdminController extends BaseController {

	public function homepage(){
		$admin= Session::get('adminLoggedIn');
		if ($admin) {
			$members = Members::get();
			$posts = DB::table('posts')
			->join('members', 'members.memberID', '=', 'posts.memberID')
			->get();
			$data = array('members' => $members, 'posts' => $posts, 'homepage' => true);
			return View::make('admin/adminHomepage', $data);
		}
		Session::flush();	
		return Redirect::to('login');
	} 

	public function deleteMember($memberID)
	{
		$member = Members::find($memberID);
		
		if (Session::get('adminLoggedIn')){ //adminse silebilir.
			$member->delete();
			return Redirect::to('admin');
		}
		if (Input::get('memberID') == Session::get('key')) { //silmek istediği hesap kendi hesabı ise
			$member->delete();
			Session::flush();
			return Redirect::to('login');	
		}
		if (Session::get('key')=="") {	//giriş yapılmamış ise
			return View::make('login', array(
			'message' => 'Bu işlemi yapma yetkiniz yoktur.'
			));
		}

		$posts = DB::table('posts')
		->join('members', 'members.memberID', '=', 'posts.memberID')
		->get();
		return View::make('member/homepage', array(
			'message' => 'Bu işlemi yapma yetkiniz yoktur.',
			'posts' => $posts, 
			'memberID' =>Session::get('key')
		));
	} 
}
?>
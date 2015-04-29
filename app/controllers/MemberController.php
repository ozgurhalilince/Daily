<?php

class MemberController extends BaseController {

	public function filterMember(){
		$memberID = Session::get('key');
		if ($memberID == "") {
			return View::make('login', array(
			'message' => 'Lütfen giriş yapınız.'
			));
		}
	}

	public function memberHomepage()
	{
		$memberID = Session::get('key');
		$members = Members::get();
		$followings = DB::table('follow')
		->select('followMemberID')
		->where('memberID',$memberID)
		->get();
		
		$posts = [];
		
		foreach ($followings as $f) {
		$posts = array_merge($posts, DB::table('posts')
		->join('members', 'members.memberID', '=', 'posts.memberID')
		->where('members.memberID',$f->followMemberID)
		->get());
		}

//		return Hash::make('aaaaaa');
		return View::make('member/homepage', array(
			'posts' => $posts, 
			'memberID' =>$memberID, 
			'members' => $members));
	}

	public function search(){
		$key = Input::get('searchKey');
		$membersAsName = DB::table('members')
		->where('name', 'like', "%$key%")
		->get();
		$membersAsSurname = DB::table('members')
		->where('surname', 'like', "%$key%")
		->get();
		$members = array_merge($membersAsName, $membersAsSurname);		
		return View::make('member/searchResults', array(
			'members' => $members ));
	}

	public function memberProfile()
	{
		$memberID = Session::get('key');
		$posts = DB::table('posts')
		->where('memberID', $memberID)
		->orderBy('created_at', 'desc')
		->get();
		$member = Members::find($memberID);

		$memberID = Session::get('key');
		$followings= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.followMemberID')
		->where('follow.memberID', $memberID)
		->select('members.name','members.surname','members.memberID', 'members.photo')
		->get();
		
		$followers= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.memberID')
		->where('follow.followMemberID', $memberID)
		->select('members.name','members.surname','members.memberID', 'members.photo')
		->get();

//		echo "<pre>";
//		print_r($posts[0]->created_at->format('Y-m-d'));

		return View::make('member/profile', array('posts' => $posts,
			'member' => $member,
			'followers' => $followers,
			'followings' => $followings));

	}

	public function memberSettings()
	{
		$memberID = Session::get('key');
		$member = Members::find($memberID);
		return View::make('member/settings', array('member' => $member));
	}

	public function addMember()
	{	
		$member = new Members();
		$member->name = Input::get('name');
		$member->surname = Input::get('surname');
		$member->email = Input::get('email');
		$member->photo = "/daily/public/uploads/about.jpg";
		$member->password = Hash::make(Input::get('password'));
		$member->save();
		$message = "Üye kaydınız başarıyla gerçekleştirildi.";
		return View::make('login', array(
			'message' => $message));
	}

	public function addPost()
	{
		$memberID = Session::get('key');
		$post = new Posts();
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		$post->visibility = Input::get('visibility');
		$post->memberID = $memberID;
		$post->date = date("d.m.Y", time());

		$post->save();
		$posts = DB::table('posts')
		->where('memberID', $memberID)
		->orderBy('created_at', 'desc')
		->get();
		$member = Members::find($memberID);
		$followings= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.followMemberID')
		->where('follow.memberID', $memberID)
		->select('members.name','members.surname','members.memberID')
		->get();
		
		$followers= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.memberID')
		->where('follow.followMemberID', $memberID)
		->select('members.name','members.surname','members.memberID')
		->get();
		return View::make('member/profile', array(
			'share' => true,
			'posts' => $posts,
			'member' => $member,
			'followers' => $followers,
			'followings' => $followings
			));
	}

	public function updatePost()
	{
		$memberID = Session::get('key');

		$post = Posts::find(Input::get('postID'));
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		$post->visibility = Input::get('visibility');
		$post->save();
		$posts = DB::table('posts')
		->where('memberID', $memberID)
		->orderBy('created_at', 'desc')
		->get();
		$member = Members::find($memberID);
		$followings= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.followMemberID')
		->where('follow.memberID', $memberID)
		->select('members.name','members.surname','members.memberID')
		->get();
		
		$followers= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.memberID')
		->where('follow.followMemberID', $memberID)
		->select('members.name','members.surname','members.memberID')
		->get();
		return View::make('member/profile', array(
			'update' => true,
			'posts' => $posts,
			'member' => $member,
			'followers' => $followers,
			'followings' => $followings));
	}

	public function deletePost($postID)
	{
		$memberID = Session::get('key');

		$post = Posts::find($postID);
		$post->delete();
		if (Session::get('adminLoggedIn')) //silen kişi admin ise
			return Redirect::to('admin');
		$posts = DB::table('posts')
		->where('memberID', $memberID)
		->orderBy('created_at', 'desc')
		->get();
		$member = Members::find($memberID);
		$followings= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.followMemberID')
		->where('follow.memberID', $memberID)
		->select('members.name','members.surname','members.memberID')
		->get();
		
		$followers= DB::table('follow')
		->join('members', 'members.memberID', '=', 'follow.memberID')
		->where('follow.followMemberID', $memberID)
		->select('members.name','members.surname','members.memberID')
		->get();
		return View::make('member/profile', array(
			'delete' => true,
			'member' => $member,
			'posts' => $posts,
			'followers' => $followers,
			'followings' => $followings
		));
	} 

	public function memberNameSurnameUpdate(){
		$memberID = Session::get('key');

		$member = Members::find($memberID);
		$member->name = Input::get('name');
		$member->surname = Input::get('surname');
		$member->save();
		$member = Members::find($memberID);
		return View::make('member/settings', array(
			'update' => true,
			'member' => $member
		));
	}

	public function memberEmailPasswordUpdate(){
		$memberID = Session::get('key');

		$member = Members::find($memberID);
		$member->email = Input::get('email');
		$member->password = Input::get('password');
		$member->save();
		$member = Members::find($memberID);
		return View::make('member/settings', array(
			'update' => true,
			'member' => $member
		));
	}
	public function memberPhotoUpdate(){
		$member = Members::find(Session::get('key'));
	
		if ( Input::hasFile('image') ){	
			$file = array('image' => Input::file('image'));
			$rules = array('image' => 'required');			
			$validator = Validator::make($file, $rules);
			if ($validator->fails()) {
			    return "Hata";
			}
			else{
				if (Input::file('image')->isValid()) { 
					$image = Input::file('image');
					$filename  = $image->getClientOriginalName();
					$destinationPath = base_path().'/public/uploads/';
					$image->move(public_path('uploads'), $filename);
			      	$path = $destinationPath . $filename;
			      	$path = "/daily/public/uploads/" . $filename;
			      	$image->picture_path = $path;
					$member->photo = $path;
					$member->save();
					return View::make('member/settings', array(
						'message' => "Fotoğrafınız başarıyla eklenmiştir.",
						'member' => $member
					));
				}
				else{
					return View::make('member/settings', array(
						'message' => "Lütfen geçerli bir fotoğraf yükleyin.",
						'member' => $member
					));
				}
			}
		}
		else{
			return View::make('member/settings', array(
				'message' => "Lütfen fotoğraf yükleyin.",
				'member' => $member
			));
		}
	}

	public function follow(){
		$value = Session::get('key');
		if ($value=="") {
			return Redirect::to('login');
		}
		$follow = Input::get('follow');
		$memberID = Input::get('memberID');
		if ($follow==0) { //eğer kullanıcı takip etmiyorsa 
			$f = new Follow();
			$f->memberID = $value;
			$f->followMemberID = $memberID;
			$f->save();
			return Redirect::to('m-profile-'.$memberID);
		}
		$f = DB::table('follow')
		->where('memberID',$value)
		->where('followMemberID',$memberID)
		->select('followID')
		->get();
		$f2=Follow::find($f[0]->followID);
		$f2->delete();
		return Redirect::to('m-profile-'.$memberID);
	}

	public function logOut()
	{
		Session::flush();
		return Redirect::to('login');
	}

}

?>
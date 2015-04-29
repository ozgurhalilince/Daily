@extends("admin/kalip3")
@section('content')
<div id="all">	
<div class="profile">
	<img align="left" src="{{$member->photo}}" 
		width="120" height="140">
	<h2>&nbsp; <?php echo $member->name . " " . $member->surname ; ?></h2>
	</div>
	<div class="profilemenu"> 
		<a href="javascript:showPosts()"><button>Günlükler &nbsp;</button></a>
		<a href="javascript:showFollowings()"><button>Takip Edilenler</button></a>
		<a href="javascript:showFollowers()"><button>Takipçiler &nbsp;</button></a>
	</div>
	
	<div id="allposts">
	@forelse($posts as $post)  
		<div class="post">
			<div class="l">
				<p><b>Tarih:</b><br> {{ $post->created_at; }}</p>
				<p><b>Görünebilirlik:</b><br> 
					<?php if ($post->visibility == 0) 
							echo "Sadece Ben";
						else if ($post->visibility == 1) 
							echo "Yalnız Üyeler";
						else
							echo "Herkes";
					 ?>
				</p>
			</div>
			<div class="r">
				<a href="show-post-{{$post->postID;}}"><h2>{{ $post->title}}</h2></a>
				<p>{{ $post->content}}</p>
				<p class="details">
					<a href="show-post-{{$post->postID;}}">Read More</a></p>
			</div>
		</div>
	@empty
		<br><p>Bu kullanıcının henüz hiç günlük yazısı bulunmamaktadır</p>
	@endforelse
	<?php //} ?>
	</div>

	<div id="followers" class="followers">
		<div class="person">
			<table>
				<?php $j=0; ?>
				@forelse($followers as $user)  
				@if ($j%3==0)
					<tr>
				@endif
				<td>
				<div class="p">
					<a href="m-profile?memberID={{$user->memberID}}">
					<center>
					<img align="left" src="/daily/app/views/images/about.jpg" width="150" height="180">
					</center>
					</a>
					<br><br><br><br><br><br><br><br><br>
					<a href="m-profile?memberID={{$user->memberID}}">
						{{$user->name}} {{$user->surname}}</a>
				</div>
				</td>				
				@if ($j%3==2)
					</tr>
				@endif
				<?php $j++; ?>
				@empty
				    <p>Bu kullanıcının henüz takipçisi bulunmamaktadır.</p>
				@endforelse
			</table>
		</div>
	</div>
	<div id="followings" class="followers">
		<div class="person">
			<table>
			<?php $j=0; ?>
				@forelse($followings as $user)  
				@if ($j%3==0)
					<tr>
				@endif
				<td>
				<div class="p">
					<a href="m-profile?memberID={{$user->memberID}}">
					<center>
					<img align="left" src="/daily/app/views/images/about.jpg" width="150" height="180">
					</center>
					</a>
					<br><br><br><br><br><br><br><br><br>
					<a href="m-profile?memberID={{$user->memberID}}">
						{{$user->name}} {{$user->surname}}</a>
				</div>
				</td>				
				@if ($j%3==2)
					</tr>
				@endif
				<?php $j++; ?>
				@empty
				    <p>Bu kullanıcının takip ettiği kişi bulunmamaktadır.</p>
				@endforelse
			</table>
		</div>
	</div>
</div>


<script type="text/javascript">
	$("#followers")
	.css("display","none")
	$("#followings")
	.css("display","none")

	function showFollowers(){
		$("#followers")
		.css("display","block")
		$("#followings")
		.css("display","none")
		$("#allposts")
		.css("display","none")
	}
	function showFollowings(){
		$("#followers")
		.css("display","none")
		$("#followings")
		.css("display","block")
		$("#allposts")
		.css("display","none")
	}
	function showPosts(){
		$("#followers")
		.css("display","none")
		$("#followings")
		.css("display","none")
		$("#allposts")
		.css("display","block")
	}
</script>

@endsection
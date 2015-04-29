@extends("member/member_kalip")
@section('contentt')

<div class="profile">
	<a href="profile"><img align="left" src="{{$member->photo}}" 
		width="120" height="140"></a>
	<h2>&nbsp; <?php echo $member->name . " " . $member->surname ; ?></h2>
</div><!-- end of profile -->

<div class="profilemenu">
	<a href="javascript:showAddDiv()"><button>Günlük Ekle</button></a>
	<a href="javascript:showFollowings()"><button>Takip Edilenler</button></a>
	<a href="javascript:showFollowers()"><button>Takipçiler &nbsp;&nbsp;</button></a>
</div> <!-- end of profilmenu -->

<div id="add">
	 {{ Form::open(array('action' => 'MemberController@addPost',
				'name' => 'addPostForm'
	 ))}}
	 <br>
     <table cellpadding="10" cellspasing="10">
       <tr>
         <td><b>Günlük Başlığı:</b></td>
         <td><div align="center"><input type="text" name="title"></div><br></td>
       </tr>
       <tr>
         <td><b>Günlük İçeriği:</b> </td>
         <td><textarea rows="5" cols="70" name="content"></textarea><br></td>
       </tr>  
       <tr>
         <td><b>Görünebilirlik:</b> </td>
         <td>
         	<input type="radio" name="visibility" value="0" checked>Sadece Ben<br>
			<input type="radio" name="visibility" value="1">Yalnız Üyeler<br>
			<input type="radio" name="visibility" value="2">Herkes<br>
         </td>
       </tr>   
       <tr>
         <td></td>
         <td><div align="right"><input type="submit" value="Ekle"></div></td>
       </tr>
     </table>
	{{ Form::close() }}
</div> <!-- end of add -->

<?php $j=0; ?>
<div id="allposts">
@forelse($posts as $post)
<?php $j++; ?>  
<div class="post">
	<input type="hidden" name="i-{{$j}}" value="{{$j}}">
	<div class="l">
		<a href="delete-post-{{$post->postID}}"><button id="deletePostBut{{$j}}">sil</button></a><br>
		<button id="postUpdate{{$j}}" value="{{$j}}">Düzenle</button>
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
		<p class="details"><a href="show-post-{{$post->postID;}}">Read More</a></p>
	</div>
</div> <!-- end of post -->

<div id="update{{$j}}">
	 {{ Form::open(array('action' => 'MemberController@updatePost', 
				'name' => 'updatePostForm'
	 ))}}
	 <input type="hidden" name="postID" id="updateHidden" value="<?php if(sizeof($posts)!=0) echo $posts[0]->postID; ?>">
	 <br>
     <table cellpadding="10" cellspasing="10">
       <tr>
         <td><b>Günlük Başlığı:</b></td>
         <td>
         	<div align="center">
         		<input type="text" name="title" id="updateText" value="{{$post->title}}">
         	</div>
         <br></td>
       </tr>
       <tr>
         <td><b>Günlük İçeriği:</b> </td>
         <td>
         	<textarea rows="5" cols="70" id="updateTextarea" name="content">{{$post->content}}
         </textarea><br>
     	</td>
       </tr>  
       <tr>
         <td><b>Görünebilirlik:</b> </td>
         <td>
         	<input type="radio" name="visibility" value="0">Sadece Ben<br>
			<input type="radio" name="visibility" value="1">Yalnız Üyeler<br>
			<input type="radio" name="visibility" value="2">Herkes<br>
         </td>
       </tr>   
       <tr>
         <td></td>
         <td><div align="right"><input type="submit" value="Güncelle"></div></td>
       </tr>
     </table>
	{{ Form::close() }}
</div>
@empty
	<p>Henüz günlük yazısı bulunmamaktadır.</p>
@endforelse
</div> <!-- end of allposts-->

<div class="break"></div>

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
				<a href="m-profile-{{$user->memberID}}">
				<center>
				<img align="left" src="{{$user->photo}}" width="150" height="180">
				</center>
				</a>
			 <div class="break"></div><br>
				<a href="m-profile-{{$user->memberID}}">{{$user->name}} {{$user->surname}}</a>
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

<div class="break"></div>
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
			<a href="m-profile-{{$user->memberID}}">
			<center>
			<img align="left" src="{{$user->photo}}" width="150" height="180">
			</center>
			</a>
			 <div class="break"></div><br>
			<a href="m-profile-{{$user->memberID}}">{{$user->name}} {{$user->surname}}</a>
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

<script type="text/javascript">
for (var i = 1; i <= {{sizeof($posts)}}; i++) {
	$("#deletePostBut"+i)
		.click(function(){
			if (!confirm("Bu yazıyı silmek istediğinize emin misiniz?")) 
				return false;
		})
};
</script>

<script type="text/javascript"> //günlük düzenleme script'i
value = 1;
for (var i = 1; i <= {{sizeof($posts)}} ; i++) {
$("#update"+i)
	.css("display", "none")
};

for (var i = 1; i <= {{sizeof($posts)}} ; i++) {
$("#postUpdate"+i)
	.click(function(){
		
		value = $(this).val();
		divAdd.style.display = "none";	//ekleme div'inin display'ini kapatır
		if($("#update"+value).css('display') == 'none')	//görünüm kapalıysa açar, açıksa kapatır.
			$("#update"+value).css('display',"block")			
		else
			$("#update"+value).css('display',"none")
	})
};
</script>

<script type="text/javascript">
divAllPosts=document.getElementById('allposts');

divAdd=document.getElementById('add');
divAdd.style.display="none";

divFollowers=document.getElementById('followers');
divFollowers.style.display="none";

divFollowings=document.getElementById('followings');
divFollowings.style.display="none";

function showAddDiv(){
	divAllPosts.style.display="block";
	for (var i = 1; i <= {{sizeof($posts)}} ; i++) {
		$("#update"+i)
			.css("display", "none")
	};
	divFollowers.style.display="none";
	divFollowings.style.display="none";
	
	if(divAdd.style.display=="none")
		divAdd.style.display = "block";
	else
		divAdd.style.display = "none";
}
function showFollowings(){
	//alert("Çalışma devam etmektedir.");
	divFollowings.style.display="block";
	divAdd.style.display="none";
	for (var i = 1; i <= {{sizeof($posts)}} ; i++) {
		$("#update"+i)
			.css("display", "none")
	};
	divAllPosts.style.display="none";
	divFollowers.style.display="none";
	
}
function showFollowers(){
	//alert("Çalışma devam etmektedir.");
	divFollowers.style.display="block";
	divAdd.style.display="none";
	for (var i = 1; i <= {{sizeof($posts)}} ; i++) {
		$("#update"+i)
			.css("display", "none")
	};
	divAllPosts.style.display="none";
	divFollowings.style.display="none";
}
</script>

@endsection
<?php if (isset($share)): 
	 if ($share): ?>
		<script type="text/javascript">
			alert("Başarıyla paylaşıldı.");
		</script>
		<?php endif;?>
	<?php  endif ?>
	<?php if (isset($delete)): 
	 if ($delete): ?>
		<script type="text/javascript">
			alert("Başarıyla Silindi.");
		</script>
		<?php endif;?>
	<?php  endif ?>
	<?php if (isset($update)): 
	 if ($update): ?>
		<script type="text/javascript">
			alert("Başarıyla Güncellendi.");
		</script>
		<?php endif;?>
	<?php  endif ?>

<script type="text/javascript">


/*
for (var i = 0; i <= {{sizeof($posts)}}; i++) {
	$("#postUpdate"+i)
	.click(function(){
		console.log($(this).val());
		var index = $(this).val();
		var titles = [];
		var contents = [];
		var postIDs = [];
		
		@foreach($posts as $post)
			titles.push("{{$post->title}}");
			contents.push("{{$post->content}}");
			postIDs.push("{{$post->postID}}");
		@endforeach

		document.getElementById("updateText").value = titles[index-1];
		document.getElementById("updateTextarea").value = contents[index-1];
		document.getElementById("updateHidden").value = postIDs[index-1];
		
		divUpdate=document.getElementById('update');
		divUpdate.style.display="block";
		divAdd=document.getElementById('add');
		divAdd.style.display="none";
		divFollowers=document.getElementById('followers');
		divFollowers.style.display="none";
		divFollowings=document.getElementById('followings');
		divFollowings.style.display="none";
	})
}
*/
</script>
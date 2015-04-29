@extends("admin/kalip3")
@section('content')

<div class="readpost">		
	<div class="post">
		<div align="right">
			  <a href="delete-post-{{$post->postID}}"><button id="deletePostBut">sil</button></a><br>
		</div>
		<div class="l">
			<p><img src="{{$member->photo}}"></p>
			<p><b>Kişi:</b><br> <a href="m-profile-{{$post->memberID;}}">
			{{ $member->name; }} {{ $member->surname; }}</a></p>
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
			<h2>{{ $post->title}}</h2>
			<p>{{ $post->content}}</p>
		</div>
	</div>
</div>
<script type="text/javascript">
$("#deletePostBut")
	.click(function(){
		if (!confirm("Bu yazıyı silmek istediğinize emin misiniz?")) 
			return false;
})
</script>
@endsection
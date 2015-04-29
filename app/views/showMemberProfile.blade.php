@extends("kalip2")
@section('content')

	<div class="profile">
			<a href="profile"><img align="left" src="/daily/app/views/images/about.jpg" 
				width="120" height="140"></a>
			<h2>&nbsp; <?php echo $member->name . " " . $member->surname ; ?></h2>
	</div>
	<?php foreach ($posts as $post){ 
		if($post->visibility !=2) continue;
	?>
	<div class="post">
		<div class="l">
			<p><b>Kişi:</b><br> <a href="m-profile?memberID=<?php echo $post->memberID; ?>">{{ $post->memberID; }}</a></p>
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
			<a href="show-post?postID=<?php echo $post->postID; ?>"><h2>{{ $post->title}}</h2></a>
			<p>{{ $post->content}}</p>
			<p class="details"><a href="show-post?postID=<?php echo $post->postID; ?>">Read More</a></p>
		</div>
	</div>
<?php } ?>
<?php $hasPost=false; ?>
@forelse($posts as $post)
	@if($post->visibility==2)
	  <?php $hasPost=true; ?>
	  <div class="post">
	    <div class="l">
	      <p><b>Kişi:</b><br> <a href="m-profile?memberID=<?php echo $post->memberID; ?>">
	        {{ $post->name;}} {{$post->surname}}</a></p>
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
	      <h2><a href="show-post?postID=<?php echo $post->postID; ?>">{{ $post->title}}</a></h2>
	      <p>{{ $post->content}}</p>
	      <p class="details"><a href="show-post?postID=<?php echo $post->postID; ?>">Read More</a></p>
	    </div>
	  </div>
	@endif
	<div class="break"></div>
  @empty
    <p>Henüz günlük yazısı bulunmamaktadır.</p>
  @endforelse

  @if(!$hasPost)
	<p>Bu kullanıcının herkese açık günlük yazısı bulunmamaktadır.</p>  	
  @endif
@endsection
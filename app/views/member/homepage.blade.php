@extends("member/member_kalip")
@section('contentt')

@forelse($posts as $post)
@if ($post->visibility==0)
      <?php continue; ?>
@endif  

<div class="post">
	<div class="l">													
		<p><b>Kişi:</b><br> <a href="m-profile-{{$post->memberID;}}">
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
		<a href="show-post-{{$post->postID}}"><h2>{{ $post->title}}</h2></a>
		<p>{{ $post->content}}</p>
		<p class="details"><a href="show-post-{{$post->postID;}}">Read More</a></p>
	</div>
</div>
	@empty	
<div id="members" class="followers">
	<div class="person">
	 	<h2>Daily'e Hoşgeldin.</h2>
	 	<h4>Tanıdığın üyeleri takip edebilirsin.</h4>
		<table>
			<?php $j=0; ?>
			@foreach($members as $user)  
	        
	        @if ($user->memberID == $memberID)
	        	<?php	continue;	//üyeler arasında kendini göremez. ?>
	        @endif

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
				<a href="follow?memberID={{$user->memberID}}&follow=0"><button>Takip <br>et</button></a>
				<div class="break"></div>
				<a href="m-profile-{{$user->memberID}}">{{$user->name}} {{$user->surname}}</a>
			</div>
			</td>				
			@if ($j%3==2)
				</tr>
			@endif
			<?php $j++; ?>
			@endforeach
		</table>
	</div>
</div>
@endforelse

@if(isset($message))
<script type="text/javascript">
	alert('{{$message}}');
</script>
@endif
@endsection


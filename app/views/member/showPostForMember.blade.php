@extends("member/member_kalip")
@section('contentt')

<div class="readpost">
	<?php if ($post->visibility!=0 || $post->memberID==$memberID){ ?>		
	<div class="post">
		<div align="right" id="share">
			Share on <br> 
			<img id="img1" width="30" height="30" src="/daily/app/views/images/f_logo.png"> 
			<img id="img2" width="30" height="30" src="/daily/app/views/images/t_logo.jpg">
		</div>
		<div class="l">
			<p><img align="left" src="{{$member->photo}}"></p>
			<div class="break"></div>
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
<?php }else { ?>
<p>Bu günlük yazısını okumaya yetkiniz yoktur.</p>
<?php } ?>
</div>

<script type="text/javascript">
$(document).ready(function()
	{
		$("#share")
		.css("height","50px")

		$("#share img")
		.click(function(){
			alert("Çalışma devam etmektedir.")
		})
		.hover(function(){
			$(this)
			.animate({"width":"40px","height":"40px"},100)
		},function(){
			$(this)
			.animate({"width":"30px","height":"30px"},100)
		})
	})

</script>

@endsection
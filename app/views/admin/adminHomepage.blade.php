@extends("admin/kalip3")
@section('content')

<div id="members">
  <center><h1>ÜYELER</h1></center>
  <div class="admin-members">
    <div class="person">
      <table id="admintable">
      <?php $j=0; ?>
        @forelse($members as $user)  
        @if ($j%3==0)
          <tr>
        @endif
        <td>
        <div class="admin-p">
          <a href="m-profile-{{$user->memberID}}">
          <img align="left" src="{{$user->photo}}" width="150" height="180">
          </a>
          <a href="adminDeleteMember-{{$user->memberID}}"><button id="deleteMemberBut{{$j}}">üyeyi <br>sil</button></a>
          
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
</div>
  
<div id="posts">
  <center><h1>GÜNLÜK YAZILARI</h1></center>
@forelse($posts as $post)
  <?php $j++; ?>  
  <div class="post">
    <input type="hidden" name="i-{{$j}}" value="{{$j}}">
    <div class="l">
      <a href="delete-post-{{$post->postID}}"><button id="deletePostBut{{$j}}">sil</button></a><br>
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
      <h2><a href="show-post-{{$post->postID;}}">{{ $post->title}}</a></h2>
      <p>{{ $post->content}}</p>
      <p class="details"><a href="show-post-{{$post->postID;}}">Read More</a></p>
    </div>
  </div>
  @empty
    <p>Henüz günlük yazısı bulunmamaktadır.</p>
  @endforelse
</div>

<script type="text/javascript">

for (var i = 1; i <= 100 ; i++) {
   $("#deletePostBut"+i)
      .css("color","red")  
      .click(function(){
        if (!confirm("Bu yazıyı silmek istediğinize emin misiniz?")) 
          return false;
      })
};
 
for (var i = 0; i <={{sizeof($members)}} ; i++) {
  $("#deleteMemberBut"+i)
    .click(function(){
      if (!confirm("Bu üyeyi silmek istediğinize emin misiniz?")) 
        return false;
    })
};

$("#b1")
.click(function(){
  $("#members")
  .css('display','block')
  $("#posts")
  .css('display','none')
})
$("#b2")
.click(function(){
  $("#members")
  .css('display','none')
   $("#posts")
  .css('display','block')
})

</script>

@endsection
@extends("member/member_kalip")
@section('contentt')

<div class="searchResults">
  <center><h1>Sonuçlar</h1></center>
      <table id="searchTable">
      <?php $j=0; ?>
        @forelse($members as $user)  
        @if ($j%3==0)
          <tr>
        @endif
        <td>
        <div class="member-p">
         <a href="m-profile-{{$user->memberID}}">
          <img align="left" src="{{$user->photo}}">
         </a> 
         <div class="break"></div>
         <a href="m-profile-{{$user->memberID}}">{{$user->name}} {{$user->surname}}</a>
        </div>
        </td>       
        @if ($j%3==2)
          </tr>
        @endif
        <?php $j++; ?>
        @empty
            <p>Aramanla eşleşen bir sonuç bulunamadı.</p>
        @endforelse
      </table>
 </div>

@endsection
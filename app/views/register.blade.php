@extends("kalip")
@section('content')
<script type="text/javascript"> 
  function result() {
  var email = document.forms["registerForm"]["email"].value;
  var password = document.forms["registerForm"]["password"].value;
  var password2 = document.forms["registerForm"]["password2"].value;
  var name = document.forms["registerForm"]["name"].value;
  var surname = document.forms["registerForm"]["surname"].value;
  
  if (email=="" || password=="" || password2=="" || name=="" || surname=="") 
  {
    alert("Lütfen alanları boş bırakmayınız");
    return false;
  }
  else
  {
    if (password != password2) {
      alert("1. şifre ile 2. şifre aynı değil");
      return false;
    }
    else{      
      if (password.length > 12 || password.length < 6) {
        alert("Şifre uzunluğu en fazla 12, en az 6 karakterden oluşmalı");
        return false;
      }
    }
  }
}
</script>
 <div class="modal-dialog">
        <div class="modal-content">
        
          <div class="modal-body">
              <div class="form-group">
                    <a href="/daily/public/index.php/login"><button class="btn btn-success pull-right">Giriş</button></a>
              </div>               
               {{ Form::open(array('action' => 'MemberController@addMember',
                                   'name' => 'registerForm',
                                   'onsubmit'=>'return result()'
               ))}}
              <div class="form-group">
                <label for="exampleInputPassword1">Ad</label>
                {{Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder'=>'Ad'))}}
                <!--<input type="ad" class="form-control" id="ad" placeholder="Ad">-->
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Soyad</label>
                {{Form::text('surname', Input::old('surname'), array('class' => 'form-control', 'placeholder'=>'Soyad'))}}
                <!--<input type="ad" class="form-control" id="soyad" placeholder="Soyad">-->
              </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                {{Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=>'Email'))}}
                <!--<input type="email" class="form-control" id="eMail" placeholder="Email">-->
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Şifre oluştur</label>
                {{Form::password('password', array('class' => 'form-control', 'placeholder'=>'Şifre'))}}  
                <!--<input type="password" class="form-control" id="password" placeholder="Şifre">-->
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Şifreyi yeniden girin</label>
                {{Form::password('password2', array('class' => 'form-control', 'placeholder'=>'Şifre'))}}
                <!--<input type="password" class="form-control" id="password2" placeholder="Şifre">-->
              </div>
              <div class="form-group">
                {{ Form::submit('Kayıt', array('class' => 'btn btn-primary')) }}
               <!--<button class="btn btn-primary" type="submit">Kayıt</button>-->
              </div>
              {{ Form::close() }}
          </div>         
              
        </div>
      </div>

@endsection


<!--<html>
<head>
	<title>Register</title>
    <meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="/daily/app/views/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/daily/app/views/css/bootstrap-theme.min.css">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="/daily/app/views/js/bootstrap.min.js"></script>
</head>
<body style="background-color: rgb(193, 146, 213);">

      <div class="modal-dialog">
        <div class="modal-content">
        
          <div class="modal-body">
              <div class="form-group">
                    <a href="/daily/public"><button class="btn btn-success pull-right">Giriş</button></a>
              </div>
              <form role="form">
                <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Şifre oluştur</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Şifre">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Şifreyi yeniden girin</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Şifre">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1"></label>
               <button class="btn btn-primary">Kayıt</button>
              </div>
          </div>
         
        </div>
      </div>

</body>
</html>
-->
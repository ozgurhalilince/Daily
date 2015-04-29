@extends("kalip")
@section('content')

<script type="text/javascript">	
	function result() 
	{
		var email = document.forms["loginForm"]["email"].value;
		var password = document.forms["loginForm"]["password"].value;
		
		if (email=="" || password=="") 
		{
			alert("Lütfen alanları boş bırakmayınız");
			return false;
		}
		else
		{
			if (password.length > 12 || password.length < 6) {
				alert("Şifre uzunluğu en fazla 12, en az 6 karakterden oluşmalı");
				return false;
			}
		}
	}
</script>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-body">
			@if (isset($message)) 
				<h3><?php echo $message; ?></h3>
			@endif 
        	 <div class="form-group">
                    <a href="/daily/public/index.php/register">
                    	<button class="btn btn-success pull-right">Kaydol</button></a>
              </div> 
		</div>
		{{ Form::open(array('action' => 'HomeController@loginControl', 
					'onsubmit'=>'return result()',
					'name' => 'loginForm'
		))}}
		<div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			{{Form::email('email', Input::old('email'), 
			array('class' => 'form-control', 'placeholder'=>'Email'))}}
		</div>
	 	<div class="form-group">
            <label for="exampleInputPassword1">Şifre</label>
            {{Form::password('password', array('class' => 'form-control', 'placeholder'=>'Şifre'))}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"></label>
            {{ Form::submit('Giriş', array('class' => 'btn btn-primary')) }}
        </div>	
	</div>
</div>
{{ Form::close() }}

@endsection
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Meditaion</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

<!-- 
	** Sử dụng nguồn âm thanh của trang này.
	http://sacredsoundshop.com/item/CERIUM_A_NOTE_CRYSTAL_SINGING_BOWL_12_ca0412am15_22000036/21938/c340 
-->

<div class="container-fluid">
	<audio class="myaudio" id="mmusic" >
	  <source src="sound_meditation/tibetanmmbuddha5.mp3" type="audio/mpeg">
	</audio>
	<hr>
	<div class="text-center"><img style="max-width: 100%" id="bell" src="sound_meditation/zenbell.jpg" ></div>
	<hr>
	<h1 class="text-center">00:00</h1>
	<hr>
	<div class="row">	
		<div class="col-sm-1">Giờ </div>
		<div class="col-sm-5"><input type="text" name="hours" class="form-control"></div>
		<div class="col-sm-1">Phút </div>
		<div class="col-sm-5"><input type="text" name="minutes" class="form-control"></div>
	</div>
	<hr>	
	<p class="text-center">
	<button type="button" class="btn btn-lg btn-info start_sound"><i class="fa fa-check"></i> Bắt đầu </button> 
	<button type="button" class="btn btn-lg btn-danger stop_sound" style="display:none;"><i class="fa fa-stop-circle"></i> Kết thúc  </button></p>
</div>
<div id="countdowntimer"><span id="future_date"><span></div>

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script>
		$("#bell").click(function(){
			$("audio#mmusic")[0].play();
		})
		$(".stop_sound").click(function(){
			$(".start_sound").show();
			$("audio#mmusic")[0].pause();
			$(this).hide();
			// $("[name='hours']").val("");
			// $("[name='minutes']").val("");
			clearInterval(inter);
			n=$.now()+10000;
			$("h1").text(0);
		})
		$(".start_sound").click(function(){
			$(".stop_sound").show();
			$(this).hide();
			if($("[name='hours']").val()=="") $("[name='hours']").val(0);
			if($("[name='minutes']").val()=="") $("[name='minutes']").val(0);
			if($("[name='minutes']").val()==0 && $("[name='hours']").val()==0)$("[name='minutes']").val(15);
			add_time = parseInt($("[name='hours']").val())*3600000;
			add_time = parseInt($("[name='minutes']").val())*60000 +add_time ;
			$("audio#mmusic")[0].play();
			n = $.now() + add_time;
			inter = setInterval(function(){
				var m = n - $.now();
				if(m<0){
					$("audio#mmusic")[0].play();
					clearInterval(inter);
					$("h1").text(0);
				}else{
					$("h1").text(Math.round(m/1000) + "");
				}
			},1000);
		});
	
 			

 		</script>
	</body>
</html>
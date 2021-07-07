
<?php $imgs = scandir('gal/'); 
session_start();
error_reporting(0);
$varsession = $_SESSION['usuario'];
if($varsession == null || $varsession = ''){
	session_destroy();
	echo '<script language="javascript">alert("Necesitas credenciales para acceder a esta pagina");window.location.href="./ingreso.html"</script>';
	
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>El Planeta de los Simios</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="La daptación de la novela de John Green, 'The Fault in our stars' es una mezcla de humor y tragedia en la que se entrelazan el amor y los sueños de la adolescencia.">
<meta name="author" content="Impactus | Estudio creativo">
<meta name="viewport" content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0" >
<link rel="icon" type="image/jpg" href="img/favicon.jpg" />
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href="main.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="jquery.js"></script>
<script>

	

		
	small = false;
	working = false;
	function goToByScroll(id){
	    $('html,body').animate({
	        scrollTop: $("#"+id).offset().top},
	        'slow');
	}
	function ppcconversion() {
		var iframe = document.createElement('iframe');
		iframe.style.width = '0px';
		iframe.style.height = '0px';
		iframe.style.display = 'none';
		document.body.appendChild(iframe);
		iframe.src = 'conversion.html';
	};
	function resizeMonkey () {
		if(small){
			$('#mono').css('width','100%')
			$('#mono').css('height',$('#mono').width()/1.051932367)
		}else{
			$('#mono').css('width','auto')
			$('#mono').css('height','100%')
		}
		$('#mono').css('margin-top',$('#header').height()/2 - $('#mono').height()/2 - $('#nav').height());
	}
	function animateCast (time) {
		$('#cast').animate({left:'-=216px'},time,easing,function () {
			$($('#cast .castimg')[0]).appendTo('#cast');
			$('#cast').animate({left:'+=216px'},0,function () {
				if(!small)
					animateCast(time)
			})
		})
	}
	$(window).resize(function(event) {
		var H = $(window).height();
		var W = $(window).width();
		if(W < 460){
			if(!small)
				location.reload();
		}
		else{
			if(small)			
				location.reload();
		}
			$('#header').css('height',H + 'px');
		resizeMonkey()
		
	});
	$(function() {
		if(!small)
			gal = setTimeout(function() {animateCast(2000)}, 2001);


		//muevo la galería
		$('#next').click(function (e) {
			if(!working){
				working = true
				if(!small)
					clearTimeout(gal);
				$('#cast').stop();
				if(small){
					L = '-=216px';
					L2 = '+=216px';
				}else{
					L = '-=648px';
					L2 = '+=648px';
				}
					
				$('#cast').animate({left:L},1000,easing,function () {
					$($('#cast .castimg')[0]).appendTo('#cast');
					if(!small){
						$($('#cast .castimg')[0]).appendTo('#cast');
						$($('#cast .castimg')[0]).appendTo('#cast');
					}
					$('#cast').animate({left: L2},0,function () {
						working = false;
						animateCast(2000)
					})
				})
				
			}
		});


		$(".fancybox").fancybox();


		//obtegno el alto de la ventana
		var H = $(window).height();
		//obtengo el ancho de la ventana
		var W = $(window).width();
		//si la pantalla es menor que 460px lo tomo como bmobile
		if(W < 460)
			small = true;
		
		$('#header').css('height',H + 'px');
		$('#mono').css('max-width',$('#mono').height()*1.051932367)
		$('#mono').css('margin-top',$('#header').height()/2 - $('#mono').height()/2);
		resizeMonkey();

		//544 es el alto del pop-up
		H2 = (H - 544) /2;
		//863 es el width del pop-up
		W2 = (W - 863) /2;


		//si el div no es mas alto que la venta, lo centro
		if(H2 > 0)
			$('#pop-up').css('margin-top', H2 + 'px');
		//si el div no es mas ancho que la venta, lo centro
		if(W2 > 0)
			$('#pop-up').css('margin-left', W2 + 'px');

		//el alto del header es todo el alto de la ventana
		$('#header').css('height',H + 'px');


		/*$('.pop-it').click(function(event) {
			if(H2 > 0)
				$('#pop-up').css('margin-top',H2 + $(document).scrollTop())
			$('#blanket,#pop-up').fadeIn(400);
		});*/
		$('#blanket,#close').click(function(event) {
			$('#blanket,#pop-up').fadeOut(400);
		});

		$('#header dt').click(function(event) {
			if(!$(this).hasClass('pop-it')){
				var id = $(this).attr('data-to');
				goToByScroll(id);
			}
		});



		if(W > 250)
			T = 250
		else
			T = W-20;

		if(!small)
			$('#insta').append('<iframe src="http://widget.stagram.com/in/tag:elplanetadelossimios/?s=250&w=3&h=4&b=1&p=20" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:1120px; height: 840px" ></iframe>')
		else
			$('#insta').append('<'+'iframe src="http://widget.stagram.com/in/tag:elplanetadelossimios/?s='+ (W-20) +'&w=1&h=10&b=1&p=10" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:'+(T+10)+'px; height: '+((T+25)*10)+'px" '+'>'+'<'+'/iframe'+'>')
			
		if(!small){
			/*setTimeout(function() {
				if(H2 > 0)
					$('#pop-up').css('margin-top',H2 + $(document).scrollTop())
				$('#pop-up,#blanket').fadeIn(500);
				
			}, 500);*/
		}

		if(small){
			$('h2,.red').click(function(event) {
				$(this).siblings().slideToggle(400)
			});
		}

	});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39302942-47', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>

		<div id="wrapper">
	<div id="blanket"></div>
	<div id="pop-up">
		<div class="red"><h2>Trivia</h2></div>
		<div class="line">
			<div id="close" class='noSelect'>X</div>
		</div>
		<div class="cuadrado"></div>
		<p class='g'>Ganá</p>
		<p class='t'><span>Entradas dobles</span></p>
		<p class='c'>Contestá la trivia</p>
		<p class="q">¿De qué color es el gas que hizo inteligente a los simios?</p>
		<br class="clear">
		<!-- <form action="sender.php" method='post'>
			<input class='validate[required]' type="text" name='nombre' placeholder='Nombre Completo'>
			<input class='validate[required,custom[email]]' type="text" name='mail' placeholder='E-Mail'>
			<input class='validate[custom[number]]' type="text" name='celular' placeholder='Celular'>
			<input class='datepicker' type="text" name='nacimiento' placeholder='Fecha de nacimiento'>
			<br>
			<input class='validate[required]' id='respuesta' type="text" name='respuesta' placeholder='Respuesta'>
			<br>
			<input type="submit" value='participar' id='send'>
		</form> -->
	</div>
		<div id="header">
			<p class="a1">Solo en cines</p>
			<p class="a2">Estreno 24 de julio</p>
			<img id='mono' src="img/header.jpg" alt='mono'>
			<div id="nav">
				<div id="l1"></div>
				<dl>
					<dt data-to='pelicula'>Película</dt>
					<dt data-to='galeria'>Galería</dt>
					<dt data-to='videos'>Videos</dt>
					<dt data-to='comentarios'>Comentarios</dt>					
					<!-- <dt class='pop-it'>Trivia</dt> -->
				</dl>
				<div id="l2"></div>
			</div>
		</div>
		<script>
		var H = $(window).height();
		$('#header').css('height',H + 'px');
		$('#mono').css('max-width',$('#mono').height()*1.051932367)
		$('#mono').css('margin-top',$('#header').height()/2 - $('#mono').height()/2);
		</script>
		<div id="content">
			<div id='pelicula' class="seccion a">
				<iframe width="100%" height="415" src="//www.youtube.com/embed/5SNrH2jdnss?modestbranding=1&rel=0" frameborder="0" allowfullscreen></iframe>
				<div class="col a">
					<h2>Sinopsis</h2>
					<div class="c">
						<p>Una creciente nación de simios genéticamente evolucionados, bajo el mando de César, se ve amenazada por una banda de seres humanos, que ha sobrevivido al devastador virus desatado diez años atrás. Alcanzan una frágil paz poco duradera, ya que ambos bandos son llevados al borde de una guerra, que decidirá cuál será la especie dominante de la Tierra.</p>
					</div>
				</div>
				<br class="clear">
				<div class="col b">
					<h2>Cast</h2>
					<div class="c">
						<div id="cast">
							<div class="castimg"><img src="cast/cast-11.png" alt="Director"></div>
							<div class="castimg"><img src="cast/cast-12.png" alt="César"></div>
							<div class="castimg"><img src="cast/cast-13.png" alt="Malcom"></div>
							<div class="castimg"><img src="cast/cast-14.png" alt="Dreyfus"></div>
							<div class="castimg"><img src="cast/cast-15.png" alt="Koba"></div>
							<div class="castimg"><img src="cast/cast-16.png" alt="Ellie"></div>
							<div class="castimg"><img src="cast/cast-17.png" alt="Alexander"></div>
							<div class="castimg"><img src="cast/cast-18.png" alt="Cornelia"></div>
								
						</div>
					</div>
					<div id="next"></div>
				</div>
			</div>

			<div id="galeria" class="seccion b">
				<div class="line"></div>
				<div class="red"> <h2>Galería</h2> </div>

				<dl>
					<?php foreach ($imgs as $key): ?>
						<?php if (is_file('gal/'.$key)): ?>
							<a class='fancybox' rel='gal' href="gal/<?php echo $key ?>"><dt><img src="gal/thumb/<?php echo $key ?>" alt="galeria"></dt></a>
						<?php endif ?>
					<?php endforeach ?>
				</dl>
			</div>
	
			<br class="clear">
			<div id="videos" class="seccion d">
				<div class="line"></div>
				<div class="red"> <h2>Los Simios invaden Montevideo</h2> </div>
				
				<iframe width="100%" height="415" src="//www.youtube.com/embed/dMx7vIlZVBo?modestbranding=1&rel=0" frameborder="0" allowfullscreen></iframe>
					
			</div>

			<!-- <div class='seccion' id="trivia">
				<div class="line"></div>
				<div class="red"><h2>Trivia</h2></div>
				<p class='g'>Ganá <span>Entradas dobles</span></p>
				<p class='c'>Contestá la trivia</p>
				<p class="q">¿De qué color es el gas que hizo inteligente a los simios?</p>
				<br class="clear">
				<form action="sender.php" method='post'>
					<input class='validate[required]' type="text" name='nombre' placeholder='Nombre Completo'>
					<br>
					<input class='validate[required,custom[email]]' type="text" name='mail' placeholder='E-Mail'>
					<br>
					<input class='validate[custom[number]]' type="text" name='celular' placeholder='Celular'>
					<br>
					<input class='datepicker' type="text" name='nacimiento' placeholder='Fecha de nacimiento'>
					<br>
					<input class='validate[required]' id='respuesta2' type="text" name='respuesta' placeholder='Respuesta'>
					<br>
					<input type="submit" value='participar' id='send2'>
				</form>
			</div> -->

			<div class="seccion" id="comentarios">
				<div class="line"></div>
				<div class="red"><h2>Comentarios</h2></div>
				<div id="insta">
					<div id="cover"></div>
					
				</div>
			</div>
		</div>
	</div>
	<div id="footer"><a id="logout" href="./inc/Cerrar_session.php">Cerrar Sesion</a></div>
	<a id="coco" href="http://www.impactus.com.uy" title="Desarrolla: Impactus | estudio creativo." target="_blank" style="left: -34px;">Desarrolla: Impactus | estudio creativo.</a>
	<a id="palabra" href="http://www.impactus.com.uy" title="Desarrolla: Impactus | estudio creativo." target="_blank"> </a>
							
	<link href="plugins/css/validationEngine.css" rel="stylesheet" type="text/css" media="all" />
	<link href="plugins/css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all" />
	<link href="plugins/css/datepicker.css" rel="stylesheet" type="text/css" media="all" />
	<link href="plugins/css/default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="plugins/css/default.date.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="plugins/js/jquery.form.js"></script>
	<script type="text/javascript" src="plugins/js/picker.js"></script>
	<script type="text/javascript" src="plugins/js/picker.date.js"></script>
	<script type="text/javascript" src="plugins/js/date_es.js"></script>
	<script type="text/javascript" src="plugins/js/validationEngine.js"></script>
	<script type="text/javascript" src="plugins/js/tiraJs.js"></script>
	<script type="text/javascript" src="plugins/js/validationEngine-es.js"></script>
	<script type="text/javascript" src="plugins/js/datepicker.js"></script>
	<script type="text/javascript" src="plugins/js/datepicker.js"></script>
	<script type="text/javascript" src="plugins/js/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="inc/COCO.js"></script>
	<script>

		jQuery("#pop-up form").validationEngine({showOneMessage : false,scroll: false,validationEventTrigger: 'submit'});
		jQuery("#trivia form").validationEngine({promptPosition : 'topLeft',showOneMessage : true,scroll: true,validationEventTrigger: 'submit'});
		$('#pop-up form').ajaxForm(function() { 
			$('#pop-up,#blanket').fadeOut(500);
			$('form')[0].reset();
			//ppcconversion();
		});
		$('#trivia form').ajaxForm(function () {
			$('#trivia .red').siblings().slideToggle(400);
			$('#trivia form')[0].reset();
			//ppcconversion();
		})
		$( "#pop-up .datepicker" ).datepicker({
            dateFormat : 'dd/mm/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
        $('#trivia .datepicker').pickadate({
        	format: 'dd/mm/yyyy',
        	selectYears: 100,
        	selectMonths: 1,
        	today:false
        })



	</script>
</body>
</html>


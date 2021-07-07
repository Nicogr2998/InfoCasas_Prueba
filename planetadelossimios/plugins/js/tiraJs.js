/*opciones*/

var showImages = 4 //cantidad de imagenes que se muestran
var carrusel = true; //loop en la tira de imagenes
var imgWidth = 260; //ancho de la imagen
var imgHeight = 200; //alto de la imagen
var spaceImg = 20; //espacio entre fotos
var moveImgs = 3 //cuantas imagenes se mueven
var speed = 20000 //velocidad con la que se mueven las imágenes
var slideShow = true //para que funcione bien, el carrusel debe estar activado
	var timer = 0; // tiempo que demora el slide show entre fotos
var easing = 'linear';

salado = false;//para un tweak de autodata
var currentW = false;
var paused = false;
$(document).ready(function() {
	if(slideShow){
		var T = setInterval(function () {nextImg();},timer);
	}
	imagesContainer = $('.tiraJsSub').find('dt');
	$(imagesContainer).css('margin-right', spaceImg + 'px');
	$(imagesContainer).css('width', imgWidth + 'px');
	$(imagesContainer).css('height', imgHeight + 'px');
	totalImages = imagesContainer.length;
	W = (imgWidth * showImages) + (spaceImg * (showImages - 1) + 10) + 'px';
	$('.tiraJs').css('width', W);
	W = (imgWidth * totalImages) + (spaceImg * (totalImages) + 10) + 'px';
	$('.tiraJsSub').css('width', W);
	function pause () {
		clearInterval(T);
		paused = true;
	}
	function play () {
		T = setInterval(function () {nextImg();},timer);
		paused = false;
	}
	function nextImg (overwrite) {

		//TODO LO INVOLUCRA OVERWRITE LO HICE SOLO PARA AUTODATA//
		if(overwrite && !salado){
			$('.tiraJsSub').stop();
			clearTimeout(T)
			salado = true;
			$('.tiraJsSub').animate({left:'-='+((imgWidth+spaceImg)*moveImgs)}, 1000,easing,function () {
					currentW = false;
					salado = false;
					if(slideShow && !paused)
						T = setInterval(function () {nextImg();},timer);
					X = $('.tiraJsSub').css('left');
					X = parseInt(X);
					X = X + (imgWidth+spaceImg)*moveImgs + 'px';
					$('.tiraJsSub').css('left',X);
					for(var i = 0; i< moveImgs; i++){
						$(imagesContainer[0]).appendTo(('.tiraJsSub')); // paso la primer imágen al final de la tira
						imagesContainer = $('.tiraJsSub').find('dt');
					}
				})
			return false;
		}
		if(!currentW ){
			clearInterval(T);
			imagesContainer = $('.tiraJsSub').find('dt');
			currentW = true; //el escript esta trabajando
			maxMovements = totalImages - showImages;// cuantas veces se puede mover a la izquierda
			maxLeft = imgWidth*maxMovements; // cual es el minimio valo de left que toma
			maxLeft = -maxLeft;
			sureMove = true 
			if(parseInt($('.tiraJsSub').css('left')) <= maxLeft)
				sureMove = false; // estoy en una situacion limite
			if(!carrusel){
				if(sureMove){ //no estoy en una 'situacion limite' y carrusel no esta activado
					$('.tiraJsSub').animate({left:'-='+imgWidth*moveImgs}, speed,easing,function () {
						currentW = false;
						if(slideShow && !paused)
							T = setInterval(function () {nextImg();},timer);
					})
				}else{
					currentW = false; //estoy en una 'situacion limite' y como carrusel no esta activado no me muevo
					if(slideShow && !paused)
						T = setInterval(function () {nextImg();},timer);
				}
			}else{ //carrusel activado
				$('.tiraJsSub').animate({left:'-='+((imgWidth+spaceImg)*moveImgs)}, speed,easing,function () {
					currentW = false;
					if(slideShow && !paused)
						T = setInterval(function () {nextImg();},timer);
					$('.tiraJsSub').css('left','0px');
					for(var i = 0; i< moveImgs; i++){
						$(imagesContainer[0]).appendTo(('.tiraJsSub')); // paso la primer imágen al final de la tira
						imagesContainer = $('.tiraJsSub').find('dt');
					}
				})
			}
		}
	}

	function prevImg (overwrite) {

		//TODO LO INVOLUCRA OVERWRITE LO HICE SOLO PARA AUTODATA//
		if(overwrite && !salado){
			salado = true;
			$('.tiraJsSub').stop();
			clearTimeout(T)
			for(var i = 0; i< moveImgs; i++){
				$(imagesContainer[imagesContainer.length-1]).prependTo(('.tiraJsSub')); // paso la primer imágen al final de la tira
				imagesContainer = $('.tiraJsSub').find('dt');
			}
			$('.tiraJsSub').css('left', -(imgWidth+spaceImg)*moveImgs);
			$('.tiraJsSub').animate({left:'+='+((imgWidth+spaceImg)*moveImgs)}, 1000,easing,function () {
					currentW = false;
					salado = false;
					if(slideShow && !paused)
						T = setInterval(function () {nextImg();},timer);
				})
			return false;
		}

		if(!currentW){
			clearInterval(T);
			imagesContainer = $('.tiraJsSub').find('dt');
			currentW = true; //el escript esta trabajando
			sureMove = true 
			if(parseInt($('.tiraJsSub').css('left')) >= 0)
				sureMove = false; // estoy en una situacion limite
			if(!carrusel){
				if(sureMove){ //no estoy en una 'situacion limite' y carrusel no esta activado
					$('.tiraJsSub').animate({left:'+='+imgWidth*moveImgs}, speed,easing,function () {
						currentW = false;
						if(slideShow && !paused)
							T = setInterval(function () {nextImg();},timer);
					})
				}else{
					currentW = false; //estoy en una 'situacion limite' y como carrusel no esta activado no me muevo
					if(slideShow && !paused)
						T = setInterval(function () {nextImg();},timer);
				}
			}else{ //carrusel activado
				for(var i = 0; i< moveImgs; i++){
					$(imagesContainer[imagesContainer.length-1]).prependTo(('.tiraJsSub')); // paso la primer imágen al final de la tira
					imagesContainer = $('.tiraJsSub').find('dt');
				}
				$('.tiraJsSub').css('left', -(imgWidth+spaceImg)*moveImgs);
				$('.tiraJsSub').animate({left:'+='+(imgWidth+spaceImg)*moveImgs}, speed,easing,function () {
					currentW = false;
					if(slideShow && !paused)
						T = setInterval(function () {nextImg();},timer);
				})
			}
		}
	}
	// click en next arrow
	$('.tiraJsN').click(function() {
		a = false;
		if($(this).attr('data-overwrite') == 1)
			a = true
		nextImg(a);
	});
	
	// click en prev arrow
	$('.tiraJsP').click(function() {
		a = false;
		if($(this).attr('data-overwrite') == 1)
			a = true
		prevImg(a);
	});

	$('.tiraJsPlay').click(function() {
		play();
	});

	$('.tiraJsPause').click(function() {
		Pause();
	});

});
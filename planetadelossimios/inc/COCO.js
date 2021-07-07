$(document).ready(function () {
				$("#coco").mouseenter(function() {
					$(this).animate({
						left: '6px'
					});
				}).mouseleave(function() {
					$(this).animate({
						left: '-34px'
					});
				});
				/*$('*').tipsy({fade: true, gravity: $.fn.tipsy.autoNS});*/
			})
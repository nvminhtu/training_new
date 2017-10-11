
            	$(window).bind('load resize',function(){
					var w_window = $(window).outerWidth();
					var ratio = 668/500;
					
					var w_box = $('#traijing_slider01 li').outerWidth();
					var h_box = w_box*500/668;
					if(w_window<=1400){
						$('#traijing_slider01 li').css({"width": w_box});
						$('#traijing_slider01 li span').css({"height": h_box, "width": w_box});
						$('#tr_slider_out .bx-viewport').css({"height": h_box});
						
					}
					else{
						$('#traijing_slider01 li').css({"width": 668});
						$('#traijing_slider01 li span').css({"height": 500, "width": 668});
						$('#tr_slider_out .bx-viewport').css({"height": 500});
					}
				});
  
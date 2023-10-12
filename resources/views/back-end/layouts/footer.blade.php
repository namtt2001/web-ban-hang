
	<script src="{!!url('public/back-end/js/jquery-1.11.1.min.js')!!}"></script>
	<script src="{!!url('public/back-end/js/bootstrap.min.js')!!}"></script>
	<script src="{!!url('public/back-end/js/chart.min.js')!!}"></script>
	<script src="{!!url('public/back-end/js/chart-data.js')!!}"></script>
	<script src="{!!url('public/back-end/js/easypiechart.js')!!}"></script>
	<script src="{!!url('public/back-end/js/easypiechart-data.js')!!}"></script>
	<script src="{!!url('public/back-end/js/bootstrap-datepicker.js')!!}"></script>

	<script type="text/javascript" src="{!!url('public/front-end/')!!}/js/tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript">
	    tinymce.init({
	        selector:'textarea',
	        language: 'vi_VN',
	        toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor | code",
	        plugins: [
		         "advlist autolink link image code lists charmap print preview hr anchor pagebreak spellchecker code fullscreen",
		         "save table contextmenu directionality emoticons template paste textcolor code"
		   ],
		   menubar:false,
	    });
    </script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>

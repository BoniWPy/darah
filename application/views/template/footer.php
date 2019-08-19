</main>
  </div>
</div>
	<script src="<?php echo base_url('/assets/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?php echo base_url('/assets/js/feather.min.js') ?>"></script>
	<script src="<?php echo base_url('/assets/js/Chart.min.js') ?>"></script>
	<script src="<?php echo base_url('/assets/js/dashboard.js') ?>"></script>

	<!-- alert for perawat if admin has been confirmation -->
	
	<?php if( $this->session->userdata('role') == 'user' ): ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript">
	$(window).load(function() {
		$(".loader").fadeOut("slow");
	});
	</script>
	<script>

		var base_url = '<?php echo base_url("/") ?>'
		$(document).ready(function(){

			realtime_confirmation();

		});

		var realtime_confirmation = function(){

		var ajax_link = base_url + 'dashboard/confirmation'

		$.get(ajax_link).fail(function(xhr,code,err){
			alert(err)
		}).done(function(res){
			if( res != '' ) alert(res)
		})

		setTimeout("realtime_confirmation()", 100000);
		}

		</script>		
		<?php endif; ?>
	<!-- end alert for perawat if admin has been confirmation  -->


	<?php if( $this->session->userdata('role') == 'admin' ): ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript">
	$(window).load(function() {
		$(".loader").fadeOut("slow");
	});
	</script>
	<script>

		var base_url = '<?php echo base_url("/") ?>'
		var limit = 3
		$(document).ready(function(){

			alert_limit();
            realtime_order();
            realtime_batal();

		});

		var alert_limit = function(){

			var ajax_link = base_url + 'dashboard/cekstok/' + limit

			$.get(ajax_link).fail(function(xhr,code,err){
				alert(err)
			}).done(function(res){
				if( res != '' ) alert(res)
			})

			setTimeout("alert_limit()", 100000);
		}

		var realtime_order = function(){

			var ajax_link = base_url + 'dashboard/pesanan'

			$.get(ajax_link).fail(function(xhr,code,err){
				alert(err)
			}).done(function(res){
				if( res != '' ) alert(res)
			})

			setTimeout("realtime_order()", 100000);
        }
        
        var realtime_batal = function(){

            var ajax_link = base_url + 'dashboard/pesanan_batal'

            $.get(ajax_link).fail(function(xhr,code,err){
                alert(err)
            }).done(function(res){
                if( res != '' ) alert(res)
            })

            setTimeout("realtime_batal()", 100000);
        }
	</script>
	<div class="loader"></div>
	<?php endif; ?>
</body>
</html>
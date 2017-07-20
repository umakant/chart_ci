
<?php include_once('admin_header.php'); ?>

                    <aside class="right-side">
					
<?php 
	$user_id = $this->session->userdata('user_id');
	$q = $this->db->select('country')
				  ->get('users');
	$data = $q->result_array(); 
	$user_meta = $this->db->select('meta_value')
						  ->where('meta_key','billing_country')
						  ->get('ci_usermeta');
	$user_data = $user_meta->result_array(); 
	foreach($user_data as $key=>$value){
		$arr[] =  $value['meta_value'];
	}
	$val = array_count_values($arr);
						
	$order_meta = $this->db->select('post_date')
						  ->where('post_type','shop_order') 
						  ->where('post_date >','2016-01-01') 
						  ->order_by('post_date','ASC')
						  ->get('order_posts');
	$order_data = $order_meta->result_array();
					 ?>
					 
					 
					 <?php 
						 $sql= "SELECT order_item_name FROM `ci_order_items` ;";
					 
						$query	= $this->db->query($sql);
						$res = $query->result_array(); 
						$sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE post_date > '2016-01-01' AND  post_type='shop_order' AND post_status='wc-completed';";

						$query	= $this->db->query($sql);
						$res = $query->result_array(); //print_r($res);
						$order_completed = 80; 
						
						// Pending						
						$sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_type='shop_order' AND post_status='wc-pending';";

						$query	= $this->db->query($sql);
						$res = $query->result_array(); //print_r($res);
						$order_pending = $res[0]['cnt'];
						
						// Processing
						$sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_type='shop_order' AND post_status='wc-processing';";

						$query	= $this->db->query($sql);
						$res = $query->result_array(); //print_r($res);
						$order_processing = $res[0]['cnt'];
						
						// Processing
						$sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_type='shop_order' AND post_status='wc-processing';";

						$query	= $this->db->query($sql);
						$res = $query->result_array(); //print_r($res);
						$order_processing = $res[0]['cnt'];
						
						// On Hold
						$sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_type='shop_order' AND post_status='wc-on-hold';";

						$query	= $this->db->query($sql);
						$res = $query->result_array(); //print_r($res);
						$order_on_hold = $res[0]['cnt'];

						// Cancelled
						$sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_type='shop_order' AND post_status='wc-cancelled';";

						$query	= $this->db->query($sql);
						$res = $query->result_array(); //print_r($res);
						$order_cancelled = $res[0]['cnt'];

						// Refunded
						$sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_type='shop_order' AND post_status='wc-refunded';";

						$query	= $this->db->query($sql);
						$res = $query->result_array(); //print_r($res);
						$order_refunded = $res[0]['cnt'];
						
						// Failed
						$sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_type='shop_order' AND post_status='wc-failed';";

						$query	= $this->db->query($sql);
						$res = $query->result_array(); //print_r($res);
						$order_failed = $res[0]['cnt'];
						
					
						
						 
						
					 ?>	 
					<script>
					 $(function () {
						
						$('#dialog_line_chart').dialog({
							autoOpen: false,
							show: {
								effect: 'blind',
								duration: 1000
							},
							hide: {
								effect: 'explode',
								duration: 1000
							}
						});
						$('#dialog_pie_chart').dialog({
							autoOpen: false,
							show: {
								effect: 'blind',
								duration: 1000
							},
							hide: {
								effect: 'explode',
								duration: 1000
							}
						});
						$('#dialog_bar_chart').dialog({
							autoOpen: false,
							show: {
								effect: 'blind',
								duration: 1000
							},
							hide: {
								effect: 'explode',
								duration: 1000
							}
						});
						 
						 //Bar Chart
						 
						 
						 
						$('#bar-grp-chart').highcharts({
							chart: {
								type: 'column',
								height: 250,
								options3d: {
									enabled: true,
									alpha: 10,
									beta: 5,
									depth: 70
								}
							},
							credits: {
								   enabled: false
							},

							title: {
								text: 'Orders in 2016'
							},

							xAxis: {
								categories: Highcharts.getOptions().lang.shortMonths
							},

							yAxis: {
								allowDecimals: false,
								min: 0
							},

							tooltip: {
								headerFormat: '<b>{point.key}</b><br>',
								pointFormat: '<span style="color:{series.color}">\u25CF </span> {series.name}: {point.y}'
							},

							plotOptions: {
								series: {
									point: {
										events: {
											 click: function() {
												 $('#myModal_orders_in_2016').modal('show'); 
												//alert ('Category: '+  +', value: '+ this.y);
												 $.ajax({
													type:'POST',
													url: '<?php echo base_url(); ?>index.php/admin/getOrdersMonth',
													data:{'mnth':this.category,'total_orders':this.y},
													cache:false,
													success:function(data){ 
														 $("#get_month_1").html(data);
													},
													error: function(data){
														console.log("error");
														console.log(data);
													}
												});
												
												//$('#dialog_bar_chart').dialog('open');
												// //alert('Person who like' + options.name + ' ' + options.personName);
											}
										}
									},
									cursor: 'pointer',
									stacking: 'normal',
								},
								column: {
									stacking: 'normal',
									depth: 40
								}
							},

							series: [{
								name: 'Total Orders',
								data: [
								<?php for($i=1;$i<12;$i++)
									{
										if($i<10)
										{ $startDD = '2016-0'.$i.'-01';  }
										else{  $startDD='2016-'.$i.'-01';   }
										
										//$a_date = "2009-12-01";
										 $startEE= date("Y-m-t", strtotime($startDD));	
										 $sqlss= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_date BETWEEN '$startDD' AND '$startEE' AND   post_type='shop_order' AND post_status='wc-completed';";
										
										$query	= $this->db->query($sqlss);
										$resss = $query->result_array(); //print_r($res);
										echo $resss[0]['cnt'].',';
									}
						 ?>],
								stack: 'male'
							}, {
								name: 'Order Cost($)',
								data: [330, 500, 245, 441, 200, 150, 50, 130, 0, 0, 0],
								stack: 'female'
							}]
						});
						$('#bar-chart').highcharts({
							 
							chart: {
								type: 'column',
								height: 250,
								options3d: {
									enabled: true,
									alpha: 10,
									beta: 5,
									depth: 70
								}
							},
							credits: {
								   enabled: false
							},
							title: {
								text: 'Orders in 2016'
							},
							plotOptions: {
								series: {
									point: {
										events: {
											 click: function() {
												 $('#myModal_orders_in_2016').modal('show'); 
												//alert ('Category: '+  +', value: '+ this.y);
												 $.ajax({
													type:'POST',
													url: '<?php echo base_url(); ?>index.php/admin/getOrdersMonth',
													data:{'mnth':this.category,'total_orders':this.y},
													cache:false,
													success:function(data){ 
														 $("#get_month_1").html(data);
													},
													error: function(data){
														console.log("error");
														console.log(data);
													}
												});
												
												//$('#dialog_bar_chart').dialog('open');
												// //alert('Person who like' + options.name + ' ' + options.personName);
											}
										}
									},
									cursor: 'pointer',
									stacking: 'normal',
								},
								column: {
									depth: 25
								}
							},
							xAxis: {
								categories: Highcharts.getOptions().lang.shortMonths
							},
							yAxis: {
								title: {
									text: null
								}
							},
							series: [{
								name: 'Orders',
								data: [<?php for($i=1;$i<12;$i++)
									{
										if($i<10)
										{ $startD = '2016-0'.$i.'-01';  }
										else{  $startD='2016-'.$i.'-01';   }
										
										//$a_date = "2009-12-01";
										 $startE= date("Y-m-t", strtotime($startD));	
										 $sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_date BETWEEN '$startD' AND '$startE' AND   post_type='shop_order' AND post_status='wc-completed';";
								 
										$query	= $this->db->query($sql);
										$res = $query->result_array(); //print_r($res);
										echo $res[0]['cnt'].',';
									}
						 ?>]
							}]
		
						});
						
					});

					</script>
						 	

					<script>
					 $(function () {
						 
					
						//Pie Chart
						$('#pie-chart').highcharts({
							
							chart: {
								type: 'pie',
								height: 250,
								options3d: {
									enabled: true,
									alpha: 15,
									beta: 0
								}
							},
							credits: {
								   enabled: false
							},
							title: {
								text: 'Client Country %'
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									depth: 35,
									point: {
										events: {
											click: function() {
												//$('#dialog_line_chart').dialog('open');
												//alert('<b>'+ this.name +'</b>: '+ this.percentage +' %');
												 $.ajax({
													type:'POST',
													url: '<?php echo base_url(); ?>index.php/admin/getUsersCountry',
													data:{'country':this.name,'per_cont':this.percentage},
													cache:false,
													success:function(data){ 
														 $("#get_client_1").html(data);
													},
													error: function(data){
														console.log("error");
														console.log(data);
													}
												});
												
												 $('#myModal_client_country').modal('show'); 
												//$('#dialog_pie_chart').dialog('open');
											}
										}
									},
									dataLabels: {
										enabled: true,
										format: '{point.name}'
									}
								}
							},
							series: [{
								type: 'pie',
								name: 'Clients Country',
								data: [
									<?php   
									foreach($val as $key=>$value){
										echo "['".$key."'".",".$value."]";
										echo ",";
									} ?>
								]
							}]
						});
						$('#line-chart').highcharts({
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: 0,
								height: 250,
								plotShadow: false
							},
							title: {
								text: 'Order Status 2016',
								align: 'center',
								verticalAlign: 'top',
								y: 20
							},
							credits: {
								   enabled: false
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									dataLabels: {
										enabled: true,
										distance: -50,
										style: {
											fontWeight: 'bold',
											color: 'white',
											textShadow: '0px 1px 2px black'
										}
									},
									point: {
										events: {
											click: function() {
												//$('#dialog_line_chart').dialog('open');
												//alert(this.name);
												//alert('<b>'+ this.name +'</b>: '+ this.percentage +' %');
												 $.ajax({
													type:'POST',
													url: '<?php echo base_url(); ?>index.php/admin/getOrdersStatus',
													data:{'status':this.name,'percentage':this.percentage},
													cache:false,
													success:function(data){ 
														 $("#get_status_1").html(data);
													},
													error: function(data){
														console.log("error");
														console.log(data);
													}
												});
												
												$('#myModal_orders_status').modal('show'); 
												//$('#dialog_line_chart').dialog('open');
											}
										}
									},
									cursor: 'pointer',
									startAngle: -90,
									endAngle: 90,
									center: ['50%', '85%']
								}
							},
							series: [{
								type: 'pie',
								name: 'Order Status',
								innerSize: '50%',
								data: [
									['Completed', <?php echo $order_completed; ?>],
									['Cancelled', <?php echo $order_cancelled; ?>],
									['Processing', <?php echo $order_processing; ?>],	
									['Refunded', <?php echo $order_refunded; ?>],
									['Failed', <?php echo $order_failed; ?>],
									{
										name: 'Proprietary or Undetectable',
										y: 0.2,
										dataLabels: {
											enabled: false
										}
									}
								]
							}]
						});
						
						
					$('#line-bar').highcharts({
						chart: {
							type: 'line',
							height: 250
						},
						credits: {
							   enabled: false
						},
						title: {
							text: 'Monthly Orders Trend'
						},
						xAxis: {
							categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
						},
						yAxis: {
							title: {
								text: 'Orders'
							}
						},
						plotOptions: {
							line: {
								dataLabels: {
									enabled: true
								},
								enableMouseTracking: false
							}
						},
						series: [{
							name: 'Order',
							data: [<?php for($i=1;$i<12;$i++)
							{
								if($i<10)
								{ $startD = '2016-0'.$i.'-01';  }
								else{  $startD='2016-'.$i.'-01';   }
								
								//$a_date = "2009-12-01";
								 $startE= date("Y-m-t", strtotime($startD));	
								 $sql= "SELECT COUNT(post_date) as cnt FROM `order_posts` WHERE  post_date BETWEEN '$startD' AND '$startE' AND   post_type='shop_order';";
						 
								$query	= $this->db->query($sql);
								$res = $query->result_array(); //print_r($res);
								echo $res[0]['cnt'].',';
							}
						 ?>]
						}]
					});
						
					});
						
					 </script>
					<style>
						.nopadding {
						   padding: 0 !important;
						   margin: 0 !important;
						}
						.nopadding_right {
						   padding-right: 0 !important;
						   margin: 0 !important;
						}
						.nopadding_left {
						   padding-left: 0 !important;
						   margin: 0 !important;
						}
					</style>
					
                        <div class="row">
							<div class="col-md-4 nopadding_right">
								<div id="line-chart"></div>
							</div>
							<div class="col-md-4 nopadding">
								<div id="bar-grp-chart"></div>
							</div>
							<div class="col-md-4 nopadding_left">
								<div id="pie-chart"></div> 
							</div>
						</div>
							
                        <div class="row">
							<div class="col-md-12 nopadding_right">
								<div id="line-bar"></div>
							</div>
						</div>
						
						<div id="dialog_line_chart" title="Orders Status 2016">
							<div id="get_status_1"></div>
						</div>
						
						<div id="dialog_pie_chart" title="Client Country">
							<div id="get_client_1"></div>
						</div>
						<!-- Modal orders_in_2016 -->
						<div id="myModal_orders_in_2016" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Orders in 2016</h4>
							  </div>
							  <div class="modal-body">
								<div id="get_month_1"></div>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
							</div>

						  </div>
						</div>
						<!-- Modal Order Status-->
						<div id="myModal_orders_status" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Orders Status 2016</h4>
							  </div>
							  <div class="modal-body">
							  
								<!-- Progress bar holder --
								<div id="progress" style="width:500px;border:1px solid #ccc;">
									<!-- <img src="http://i.giphy.com/cZDRRGVuNMLOo.gif"> -
								</div>
								<!-- Progress information -->
								<div id="information" style="width"></div>
								<div id="get_status_1"></div>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
							</div>

						  </div>
						</div>
						<!-- Modal Order Status-->
						<div id="myModal_client_country" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Client Country %</h4>
							  </div>
							  <div class="modal-body">
								<div id="get_client_1"></div>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
							</div>

						  </div>
						</div>
						
						<div id="dialog_bar_chart" title="Orders in 2016">
						</div>
						<style>
						#dialog_bar_chart {
							height: 300px !important;
							overflow: auto;
							width: 500px !important;						 
						}
						#dialog_line_chart {
							height: 300px !important;
							overflow: auto;
							width: 500px !important;						 
						}
						#dialog_pie_chart {
							height: 300px !important;
							overflow: auto;
							width: 500px !important;						 
						}
						.ui-widget.ui-widget-content {
							border: 1px solid #c5c5c5;
							width: 509px !important;
						}
						ul.order_ul li {
							list-style-type: none;
						}
						b.b_user {
							text-transform: capitalize;
							font-weight: 200;
						}
						</style>
						
						
                <!-- Main content --
                <section class="content">

                   
                        <div class="col-md-12">
                          <section class="panel tasks-widget">
                              <header class="panel-heading">
                                  All List
                            </header>
                            <div class="panel-body">

                              <div class="task-content">
<?php if( count($articles) ):
			$count = $this->uri->segment(3, 0);
			foreach($articles as $article ): ?>
              <ul class="task-list">
				<li>
					<div class="task-checkbox"><?= ++$count ?></div>
					 <div class="task-title">
						  <span class="task-title-sp"><?= $article->title ?></span>
						  <div class="pull-right hidden-phone">
								<?= anchor("admin/edit_article/{$article->id}",'<i class="fa fa-pencil"></i>',['class'=>'btn btn-default btn-xs']); ?>
							  
						<?=
						form_open('admin/delete_article'),
						form_hidden('article_id', $article->id),
						form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
						
						form_close();

					?>
						  </div>
					  </div>
				</li>
			</ul>
		<?php endforeach; ?>
	<?php else: ?>
			<ul class="task-list">
				<li>
					No Records Found.
				</li>
			</ul>
	<?php endif; ?>
	
<?= $this->pagination->create_links(); ?>

                              </div>

                              <div class=" add-task-row">
									<?= anchor('admin/store_article','Add Article',['class'=>'btn btn-success btn-sm pull-left']) ?>
                                  <a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- row end --
                </section><!-- /.content --
				-->
                <div class="footer-main">
                    Copyright &copy Admin
                </div>
            </aside><!-- /.right-side -->
<?php include_once('admin_footer.php'); ?>

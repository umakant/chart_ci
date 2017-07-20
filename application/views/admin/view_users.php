<?php include_once('admin_header.php'); ?>
                    <aside class="right-side">
                <!-- Main content -->
				
					<?php 
						$user_id = $this->session->userdata('user_id');
						$q = $this->db->select('*')
									  ->get('users');
						$data = $q->result_array(); 
						echo '<pre>';
						//print_r($data);
						echo '</pre>';
					?>
                <section class="content">
                        <div class="col-md-7">
                          <section class="panel tasks-widget">
								<header class="panel-heading">
                                  All Users
								</header>
								<div class="panel-body">

                              <div class="task-content">
								<?php foreach($data as $post){?>
									 <tr>
										 <td><?php 	
												echo $post['uname'];										 
											?>
										</td>
									  </tr>    
								 <?php }?>
								
                              </div>

                              <div class=" add-task-row">
									<?= anchor('admin/store_article','Add Article',['class'=>'btn btn-success btn-sm pull-left']) ?>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy Admin
                </div>
            </aside><!-- /.right-side -->
<?php include_once('admin_footer.php'); ?>
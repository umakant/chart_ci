<?php include_once('admin_header.php'); ?>
                    <aside class="right-side">
                <!-- Main content -->
                <section class="content">
                        <div class="col-md-7">
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
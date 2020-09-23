 <div class="box box-info">
											<div class="box-header">
											  <i class="fa fa-envelope"></i>
											  <h3 class="box-title">Send Message</h3>
											  <!-- tools box -->
											  <div class="pull-right box-tools">
												<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
											  </div><!-- /. tools -->
											</div>
											<div class="box-body">
											  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
												<div class="form-group">
												  <input type="email" name="receiver" class="form-control"  placeholder="Email to:">
												</div>
												<div class="form-group">
												  <input type="text" name="subject" class="form-control"  placeholder="Subject">
												</div>
												<div>
												  <input type="text" placeholder="Message"  name="msg" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
												</div>
													<div class="box-footer clearfix">
											  <button class="pull-right btn btn-default"  name="submit" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
											</div>
											  </form>
											</div>
										
										  </div>
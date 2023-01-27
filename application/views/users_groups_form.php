<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>USERS_GROUPS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>User Id <?php echo form_error('user_id') ?></td>
            <td><input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </td>
	    <tr><td>Group Id <?php echo form_error('group_id') ?></td>
            <td><input type="text" class="form-control" name="group_id" id="group_id" placeholder="Group Id" value="<?php echo $group_id; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('users_groups') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
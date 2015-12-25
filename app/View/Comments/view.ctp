
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-2">

        <div class="actions">
            <div id="header" class="container">
                <div class="btn-group-vertical" role="group" aria-label="...">
				<?php echo $this->element('menu/side_menu'); ?>
                </div>
            </div>



            <!--
                <ul class="list-group">			
                                <li class="list-group-item"><?php echo $this->Html->link(__('Edit Comment'), array('action' => 'edit', $comment['Comment']['id']), array('class' => '')); ?> </li>
                                <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Comment'), array('action' => 'delete', $comment['Comment']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $comment['Comment']['id'])); ?> </li>
                                <li class="list-group-item"><?php echo $this->Html->link(__('List Comments'), array('action' => 'index')); ?></li>
                                <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('controller' => 'apartments', 'action' => 'index')); ?> </li>
                                <li class="list-group-item"><?php echo $this->Html->link(__('New Apartment'), array('controller' => 'apartments', 'action' => 'add')); ?> </li>
                                <li class="list-group-item"><?php echo $this->Html->link(__('List Associations'), array('controller' => 'associations', 'action' => 'index')); ?> </li>
                                <li class="list-group-item"><?php echo $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
                        
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="comments view">

            <h2><?php  echo __('Comment'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
			<?php echo h($comment['Comment']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Apartment Number'); ?></strong></td>
                            <td>
			<?php  
                            echo $this->Html->link($comment['Apartment']['apt_number'], array('controller' => 'apartments', 'action' => 'view', $comment['Apartment']['id']), array('class' => ''));
                        ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
			<?php echo h($comment['Comment']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
                            <td>
			<?php echo h($comment['Comment']['email']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Comment'); ?></strong></td>
                            <td>
			<?php echo h($comment['Comment']['text']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Association'); ?></strong></td>
                            <td>
			<?php  if ($this->Session->check('Auth.User')) { 
                            echo $this->Html->link($comment['Association']['nom'], array('controller' => 'associations', 'action' => 'view', $comment['Association']['id']), array('class' => '')); 
                        }else{
                            echo h($comment['Association']['nom']);
                        }
                            ?>
                                &nbsp;
                            </td>
                        </tr>				</tbody>
                </table><!-- /.table table-striped table-bordered -->
                <?php  if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $comment['Building']['user_id']) { echo $this->Html->link(__('Edit Comment'), array('action' => 'edit', $comment['Comment']['id']), array('class' => 'btn btn-large btn-primary'));} ?> </li>
        <?php  if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $comment['Building']['user_id']) { echo $this->Form->postLink(__('Delete Comment'), array('action' => 'delete', $comment['Comment']['id']), array('class' => 'btn btn-large btn-primary'), __('Are you sure you want to delete # %s?', $comment['Comment']['id']));} ?> </li>

            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

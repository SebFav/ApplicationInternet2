
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
                                        <li class="list-group-item"><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?> </li>
        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
        <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?> </li>
        <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?> </li>
        <li class="list-group-item"><?php echo $this->Html->link(__('List Buildings'), array('controller' => 'buildings', 'action' => 'index'), array('class' => '')); ?> </li>
        <li class="list-group-item"><?php echo $this->Html->link(__('New Building'), array('controller' => 'buildings', 'action' => 'add'), array('class' => '')); ?> </li>
                        
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="users view">

            <h2><?php  echo __('User'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Username'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['username']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Password'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['password']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Role'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['role']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['email']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
<?php   if ($this->Session->read('Auth.User.role') == "admin") {echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-large btn-primary'));} ?> 
                <?php   if ($this->Session->read('Auth.User.role') == "admin") {echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-large btn-primary'), __('Are you sure you want to delete # %s?', $user['User']['id']));} ?> 


            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Buildings'); ?></h3>

				<?php if (!empty($user['Building'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Description'); ?></th>
                            <th><?php echo __('Address'); ?></th>
                            <th><?php echo __('Manager'); ?></th>
                            <th><?php echo __('Phone'); ?></th>
                            <th><?php echo __('User Id'); ?></th>
                            <th><?php echo __('Created'); ?></th>
                            <th><?php echo __('Modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
									<?php
										$i = 0;
										foreach ($user['Building'] as $building): ?>
                        <tr>
                            <td><?php echo $building['id']; ?></td>
                            <td><?php echo $building['building_name']; ?></td>
                            <td><?php echo $building['building_description']; ?></td>
                            <td><?php echo $building['building_address']; ?></td>
                            <td><?php echo $building['building_manager']; ?></td>
                            <td><?php echo $building['building_phone']; ?></td>
                            <td><?php echo $building['user_id']; ?></td>
                            <td><?php echo $building['created']; ?></td>
                            <td><?php echo $building['modified']; ?></td>
                            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'buildings', 'action' => 'view', $building['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'buildings', 'action' => 'edit', $building['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'buildings', 'action' => 'delete', $building['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $building['id'])); ?>
                            </td>
                        </tr>
	<?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

				<?php endif; ?>


            <div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Building'), array('controller' => 'buildings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

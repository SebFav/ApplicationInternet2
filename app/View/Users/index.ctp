
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
                        <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Buildings'), array('controller' => 'buildings', 'action' => 'index'), array('class' => '')); ?></li> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Building'), array('controller' => 'buildings', 'action' => 'add'), array('class' => '')); ?></li> 
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="users index">

            <h2><?php echo __('Users'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                                <!--<th><?php echo $this->Paginator->sort(__('id')); ?></th>-->
                            <th><?php echo $this->Paginator->sort(__('username')); ?></th>
                            <!--<th><?php echo $this->Paginator->sort(__('password')); ?></th>-->
                            <th><?php echo $this->Paginator->sort(__('role')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('name')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('email')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('created')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('modified')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($users as $user): ?>
                        <tr>
                                <!--<td><?php echo h($user['User']['id']); ?>&nbsp;</td>-->
                            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                            <!--<td><?php echo h($user['User']['password']); ?>&nbsp;</td>-->
                            <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                            <td><?php 
                    foreach ($user['Building'] as $building) { 
                        echo $this->Html->link($building['building_name'], array('controller' => 'buildings', 'action' => 'view', $building['id']), array('class' => 'label label-info')) . " &nbsp;";                       

                        
                    } 
                    ?>
                                &nbsp;</td>
                            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                            <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                            </td>
                        </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->

            <p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
                </small></p>

            <ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
            </ul><!-- /.pagination -->

        </div><!-- /.index -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
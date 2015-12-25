
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
                        <li class="list-group-item"><?php echo $this->Html->link(__('Edit Tag'), array('action' => 'edit', $tag['Tag']['id']), array('class' => '')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Tag'), array('action' => 'delete', $tag['Tag']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $tag['TagAc']['id'])); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?></li>          
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Tag'), array('action' => 'add'), array('class' => '')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('controller' => 'apartments', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Apartments'), array('controller' => 'apartments', 'action' => 'add')); ?> </li>
                        
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="tags view">

            <h2><?php  echo __('Tag'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
			<?php echo h($tag['Tag']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
			<?php echo h($tag['Tag']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
                <?php  if ($this->Session->check('Auth.User')) { echo $this->Html->link(__('Edit Tag'), array('action' => 'edit', $tag['Tag']['id']), array('class' => 'btn btn-large btn-primary'));} ?>
               <?php  if ($this->Session->check('Auth.User')) { echo $this->Form->postLink(__('Delete Tag'), array('action' => 'delete', $tag['Tag']['id']), array('class' => 'btn btn-large btn-primary'), __('Are you sure you want to delete # %s?', $tag['Tag']['id']));} ?>

            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Apartments'); ?></h3>

				<?php if (!empty($tag['Apartment'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Apartment Number'); ?></th>
                            <th><?php echo __('Description'); ?></th>
                            <th><?php echo __('Building Id'); ?></th>
                            <th><?php echo __('Created'); ?></th>
                            <th><?php echo __('Modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
									<?php
										$i = 0;
										foreach ($tag['Apartment'] as $apartment): ?>
                        <tr>
                            <td><?php echo $apartment['id']; ?></td>
                            <td><?php echo $apartment['apt_number']; ?></td>
                            <td><?php echo $apartment['content']; ?></td>
                            <td><?php echo $apartment['building_id']; ?></td>
                            <td><?php echo $apartment['created']; ?></td>
                            <td><?php echo $apartment['modified']; ?></td>
                            <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'apartments', 'action' => 'view', $apartment['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php  if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['user_id']) { echo $this->Html->link(__('Edit'), array('controller' => 'apartments', 'action' => 'edit', $apartment['id']), array('class' => 'btn btn-default btn-xs'));} ?>
                                <?php  if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['user_id']) { echo $this->Form->postLink(__('Delete'), array('controller' => 'apartments', 'action' => 'delete', $apartment['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $apartment['id']));} ?>
                            </td>
                        </tr>
	<?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

				<?php endif; ?>


            <div class="actions">
                                        <?php if ($this->Session->check('Auth.User')) {echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Apartment'), array('controller' => 'apartments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));} ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

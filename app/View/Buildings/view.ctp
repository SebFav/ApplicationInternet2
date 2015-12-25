
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
        <li class="list-group-item"><?php echo $this->Html->link(__('Edit Building'), array('action' => 'edit', $building['Building']['id']), array('class' => '')); ?> </li>
        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Building'), array('action' => 'delete', $building['Building']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $building['Building']['id'])); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List Buildings'), array('action' => 'index')); ?></li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New Building'), array('action' => 'add'), array('class' => '')); ?></li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('controller' => 'apartments', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New Apartment'), array('controller' => 'apartments', 'action' => 'add')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                        
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="buildings view">

            <h2><?php echo __('Building'); ?></h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($building['Building']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($building['Building']['building_name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
                            <td>
                                <?php echo h($building['Building']['building_description']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Address'); ?></strong></td>
                            <td>
                                <?php echo h($building['Building']['building_address']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Manager'); ?></strong></td>
                            <td>
                                <?php echo h($building['Building']['building_manager']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Phone'); ?></strong></td>
                            <td>
                                <?php echo h($building['Building']['building_phone']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
                            <td>
                                <?php
                                if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.confirm') == "1") {
                                    echo $this->Html->link($building['User']['username'], array('controller' => 'users', 'action' => 'view', $building['User']['id']), array('class' => ''));
                                } else {
                                    echo h($building['User']['username']);
                                }
                                ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td><?php
                                $created = $building['Building']['created'];
                                echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created);
                                ?>&nbsp;</td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td><?php
                                $modified = $building['Building']['modified'];
                                echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified);
                                ?>&nbsp;</td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
                <?php if ($building['Building']['building_img']) echo $this->Html->image($building['Building']['building_img'], array('escape' => false, 'width' => '100', 'height' => '100')); ?>
                <?php
                if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $building['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
                    echo $this->Html->link(__('Edit Building'), array('action' => 'edit', $building['Building']['id']), array('class' => 'btn btn-large btn-primary'));
                }
                ?> 
<?php
if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $building['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
    echo $this->Form->postLink(__('Delete Building'), array('action' => 'delete', $building['Building']['id']), array('class' => 'btn btn-large btn-primary'), __('Are you sure you want to delete # %s?', $building['Building']['id']));
}
?> 


            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

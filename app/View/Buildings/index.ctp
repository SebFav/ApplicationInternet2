<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-2">

        <div class="actions">

            <ul class="list-group">

                <div id="header" class="container">
                    <div class="btn-group-vertical" role="group" aria-label="...">
                        <?php echo $this->element('menu/side_menu'); ?>
                    </div>
                </div>                
            <!--<li class="list-group-item"><?php echo $this->Html->link(__('New Building'), array('action' => 'add'), array('class' => '')); ?></li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('controller' => 'apartments', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New Apartment'), array('controller' => 'apartments', 'action' => 'add')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="buildings index">

            <h2><?php echo __('Buildings'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
                            <th><?php echo $this->Paginator->sort('building_name'); ?></th>
                            <th><?php echo $this->Paginator->sort('building_description'); ?></th>
                            <th><?php echo $this->Paginator->sort('building_address'); ?></th>
                            <th><?php echo $this->Paginator->sort('building_manager'); ?></th>
                            <th><?php echo $this->Paginator->sort('building_phone'); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buildings as $building): ?>
                        <tr>
                            <!--<td><?php echo h($building['Building']['id']); ?>&nbsp;</td>-->
                            <td><?php echo h($building['Building']['building_name']); ?>&nbsp;</td>
                            <td><?php echo h($building['Building']['building_description']); ?>&nbsp;</td>
                            <td><?php echo h($building['Building']['building_address']); ?>&nbsp;</td>
                            <td><?php echo h($building['Building']['building_manager']); ?>&nbsp;</td>
                            <td><?php echo h($building['Building']['building_phone']); ?>&nbsp;</td>
                            <td>
                                    <?php
                                    if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.confirm') == "1") {

                                        echo $this->Html->link($building['User']['username'], array('controller' => 'users', 'action' => 'view', $building['User']['id']));
                                    } else {
                                        echo h($building['User']['username']);
                                    }
                                    ?>
                            </td>
                            <td><?php $created = $building['Building']['created'];
                                echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created);
                                    ?>&nbsp;</td>
                            <td><?php $modified = $building['Building']['modified'];
                                echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified);
                                ?>&nbsp;</td>
                            <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $building['Building']['id']), array('class' => 'btn btn-default btn-xs')); ?>
    <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $building['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
        echo $this->Html->link(__('Edit'), array('action' => 'edit', $building['Building']['id']), array('class' => 'btn btn-default btn-xs'));
    } ?>
    <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $building['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $building['Building']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $building['Building']['id']));
    } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
                    <?php if ($this->Session->check('Auth.User')) {
                        echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Building'), array('controller' => 'buildings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
                    } ?>				

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
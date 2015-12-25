<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-2">

        <div class="actions">

            <ul class="list-group">

                <div id="header" class="container">
                    <div class="btn-group-vertical" role="group" aria-label="...">
                        <?php echo $this->element('menu/side_menu'); ?>
                    </div>
                </div>
                <!--
                    

            <li class="list-group-item"><?php echo $this->Html->link(__('New Apartment'), array('action' => 'add'), array('class' => '')); ?></li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
            <li class="list-group-item"><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
        </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="apartments index">

            <h2><?php echo __('Apartments'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
                            <th><?php echo $this->Paginator->sort('apt_number'); ?></th>
                            <th><?php echo $this->Paginator->sort('content'); ?></th>
                            <th><?php echo $this->Paginator->sort('tags'); ?></th>
                            <th><?php echo $this->Paginator->sort('comments'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($apartments as $apartment): ?>
                        <tr>
                                <!--<td><?php echo h($apartment['Apartment']['id']); ?>&nbsp;</td>-->
                            <td><?php echo h($apartment['Apartment']['apt_number']); ?>&nbsp;</td>
                            <td><?php echo h($apartment['Apartment']['content']); ?>&nbsp;</td>
                            <td><?php
                                    foreach ($apartment['Tag'] as $tag) {
                                        echo $this->Html->link($tag['name'], array('controller' => 'tags', 'action' => 'view', $tag['id']), array('class' => 'label label-info')) . " &nbsp;";
                                    }
                                    ?>
                                &nbsp;</td>
                            <td><?php
                                    foreach ($apartment['Comment'] as $comment) {
                                        echo $this->Html->link($comment['text'], array('controller' => 'comments', 'action' => 'view', $comment['id']), array('class' => 'label label-info')) . " &nbsp;";
                                    }
                                    ?>
                                &nbsp;</td>
                            <td><?php $created = $apartment['Apartment']['created'];
                                echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created);
                                    ?>&nbsp;</td>
                            <td><?php $modified = $apartment['Apartment']['modified'];
                                echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified);
                                ?>&nbsp;</td>
                            <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $apartment['Apartment']['id']), array('class' => 'btn btn-default btn-xs')); ?>
    <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
        echo $this->Html->link(__('Edit'), array('action' => 'edit', $apartment['Apartment']['id']), array('class' => 'btn btn-default btn-xs'));
    } ?>
    <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $apartment['Apartment']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $apartment['Apartment']['id']));
    } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
                    <?php if ($this->Session->check('Auth.User')) {
                        echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Apartment'), array('controller' => 'apartments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
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
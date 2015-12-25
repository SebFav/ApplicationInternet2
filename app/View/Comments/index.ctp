
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
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Comment'), array('action' => 'add'), array('class' => '')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('controller' => 'apartments', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Apartment'), array('controller' => 'apartments', 'action' => 'add')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Associations'), array('controller' => 'associations', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="comments index">

            <h2><?php echo __('Comments'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                                <!--<th><?php echo $this->Paginator->sort(__('id')); ?></th>-->
                            <th><?php echo $this->Paginator->sort('apartment_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('association_id'); ?></th>
                            <th><?php echo $this->Paginator->sort(__('name')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('email')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('text')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $comment): ?>
                            <tr>
                                    <!--<td><?php echo h($comment['Comment']['id']); ?>&nbsp;</td>-->
                                <td>
                                    <?php echo $this->Html->link($comment['Apartment']['apt_number'], array('controller' => 'apartments', 'action' => 'view', $comment['Apartment']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($comment['Association']['nom'], array('controller' => 'associtaions', 'action' => 'view', $comment['Association']['id'])); ?>
                                </td>
                                <td><?php echo h($comment['Comment']['name']); ?>&nbsp;</td>
                                <td><?php echo h($comment['Comment']['email']); ?>&nbsp;</td>
                                <td><?php echo h($comment['Comment']['text']); ?>&nbsp;</td>

                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $comment['Comment']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comment['Comment']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comment['Comment']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $comment['Comment']['id'])); ?>
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
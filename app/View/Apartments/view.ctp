
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
                        <li class="list-group-item"><?php echo $this->Html->link(__('Edit Apartment'), array('action' => 'edit', $apartment['Apartment']['id']), array('class' => '')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Apartment'), array('action' => 'delete', $apartment['Apartment']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $apartment['Apartment']['id'])); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('action' => 'index')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Apartment'), array('action' => 'add'), array('class' => '')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
                        
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="apartments view">

            <h2><?php echo __('Apartment'); ?></h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($apartment['Apartment']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Apartment Number'); ?></strong></td>
                            <td>
                                <?php echo h($apartment['Apartment']['apt_number']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
                            <td>
                                <?php echo h($apartment['Apartment']['content']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td><?php
                                $created = $apartment['Apartment']['created'];
                                echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created);
                                ?>&nbsp;</td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td><?php
                                $modified = $apartment['Apartment']['modified'];
                                echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified);
                                ?>&nbsp;</td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
                <?php
                if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
                    echo $this->Html->link(__('Edit Apartment'), array('action' => 'edit', $apartment['Apartment']['id']), array('class' => 'btn btn-large btn-primary'));
                }
                ?> 
<?php
if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
    echo $this->Form->postLink(__('Delete Apartment'), array('action' => 'delete', $apartment['Apartment']['id']), array('class' => 'btn btn-large btn-primary'), __('Are you sure you want to delete # %s?', $apartment['Apartment']['id']));
}
?> 


            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Comments'); ?></h3>

<?php if (!empty($apartment['Comment'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Apartment Id'); ?></th>
                            <th><?php echo __('Association Id'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Email'); ?></th>
                            <th><?php echo __('Comment'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    $i = 0;
    foreach ($apartment['Comment'] as $comment):
        ?>
                        <tr>
                            <td><?php echo $comment['id']; ?></td>
                            <td><?php echo $comment['apartment_id']; ?></td>
                            <td><?php echo $comment['association_id']; ?></td>
                            <td><?php echo $comment['name']; ?></td>
                            <td><?php echo $comment['email']; ?></td>
                            <td><?php echo $comment['text']; ?></td>
                            <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id']), array('class' => 'btn btn-default btn-xs')); ?>
        <?php
        if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
            echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id']), array('class' => 'btn btn-default btn-xs'));
        }
        ?>
        <?php
        if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
            echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $comment['id']));
        }
        ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
            <?php
            if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "0") {
                echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Comment'), array('controller' => 'comments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
            }
            ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


        <div class="related">

            <h3><?php echo __('Related Tags'); ?></h3>

                        <?php if (!empty($apartment['Tag'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($apartment['Tag'] as $tag):
                                        ?>
                        <tr>
                            <td><?php echo $tag['id']; ?></td>
                            <td><?php echo $tag['name']; ?></td>
                            <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'tags', 'action' => 'view', $tag['id']), array('class' => 'btn btn-default btn-xs')); ?>
                    <?php
                    if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
                        echo $this->Html->link(__('Edit'), array('controller' => 'tags', 'action' => 'edit', $tag['id']), array('class' => 'btn btn-default btn-xs'));
                    }
                    ?>
                        <?php
                        if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
                            echo $this->Form->postLink(__('Delete'), array('controller' => 'tags', 'action' => 'delete', $tag['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $tag['id']));
                        }
                        ?>
                            </td>
                        </tr>
    <?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
<?php
if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $apartment['User']['id'] && $this->Session->read('Auth.User.confirm') == "1") {
    echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Tag'), array('controller' => 'tags', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
}
?>				
            </div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

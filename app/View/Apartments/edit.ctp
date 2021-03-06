
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">
            <div id="header" class="container">
                <div class="btn-group-vertical" role="group" aria-label="...">
				<?php echo $this->element('menu/side_menu'); ?>
                </div>
            </div>

            <!--
                <ul class="list-group">
                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Apartment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Apartment.id'))); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('action' => 'index')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Edit Apartment'); ?></h2>

        <div class="aparments form">

			<?php echo $this->Form->create('Apartment', array('type'=> 'file','role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
						<?php echo $this->Form->input('apt_number', array('type' => 'text','class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
						<?php echo $this->Form->input('content', array('type' => 'text','class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
						<?php echo $this->Form->input('text', array('type' => 'text','class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                                                <?php echo $this->Form->input('Tag', array('multiple' => 'checkbox'));?>
                </div><!-- .form-group -->

                 <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Apartment.id')), array('class' => 'btn btn-large btn-primary'), __('Are you sure you want to delete # %s?', $this->Form->value('Apartment.id'))); ?>



            </fieldset>

			<?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
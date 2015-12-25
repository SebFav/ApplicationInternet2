<?php

//let's load jquery libs from google
  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => false));
  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('inline' => false));
  $this->Html->script('View/Associations/index', array('inline' => false));
  ?>
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
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Comments'), array('action' => 'index')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('controller' => 'apartments', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Apartment'), array('controller' => 'apartments', 'action' => 'add')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Associations'), array('controller' => 'associations', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
                </ul> /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Add Comment'); ?></h2>

        <div class="comments form">

			<?php echo $this->Form->create('Comment', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
						<?php echo $this->Form->input('apartment_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
						<?php echo $this->Form->input('association_id', array('class' => 'form-control', 'id' => 'autocomplete', 'type' => 'text')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                                                <?php echo $this->Form->input(('name'), array('type' => 'text','class' => 'form-control')); ?>						
                </div><!-- .form-group -->
                <div class="form-group">
                                                <?php echo $this->Form->input(('email'), array('type' => 'text','class' => 'form-control')); ?>						
                </div><!-- .form-group -->
                <div class="form-group">
                                                <?php echo $this->Form->input(('text'), array('type' => 'text','class' => 'form-control')); ?>						
                </div><!-- .form-group -->

                                                <?php echo $this->Form->submit(('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

			<?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
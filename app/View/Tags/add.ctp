
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
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('controller' => 'apartments', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Apartments'), array('controller' => 'apartments', 'action' => 'add')); ?> </li>
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Add Tag'); ?></h2>

        <div class="tags form">

			<?php echo $this->Form->create('Tag', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">

                                                        <?php echo $this->Form->input('Apartment', array('multiple' => 'checkbox'));?>
                </div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

			<?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

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
                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Building.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Building.id'))); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Buildings'), array('action' => 'index')); ?></li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Apartments'), array('controller' => 'apartments', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Apartment'), array('controller' => 'apartments', 'action' => 'add')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                        <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Edit Building'); ?></h2>

        <div class="buildings form">

			<?php echo $this->Form->create('Building', array('type'=> 'file','role' => 'form')); ?>

            <fieldset>


                <div class="form-group">
						<?php echo $this->Form->input('building_name', array('type' => 'text','class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
						<?php echo $this->Form->input('building_description', array('type' => 'text','class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
						<?php echo $this->Form->input('building_address', array('type' => 'text','class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
						<?php echo $this->Form->input('building_manager', array('type' => 'text','class' => 'form-control')); ?>
                </div><!-- .form-group -->                                    
                <div class="form-group">
						<?php echo $this->Form->input('building_phone', array('type' => 'text','class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">

						<?php echo $this->Form->input('building_img', array('type'=>'file','options' => array($this->request->data['Building']['building_img'])));
                                                    if(strlen($this->request->data['Building']['building_img']) > 0){
                                                        echo $this->Html->image($this->request->data['Building']['building_img'], array('escape' => false , 'width' => '100' , 'height' => '100'));
                                                        }else{
                                                            echo "No Image Selected";
                                                        }
                                                ?>
                </div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Building.id')), array('class' => 'btn btn-large btn-primary'), __('Are you sure you want to delete # %s?', $this->Form->value('Building.id'))); ?>



            </fieldset>

			<?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
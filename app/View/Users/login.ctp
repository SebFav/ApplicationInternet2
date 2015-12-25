<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <div id="sidebar" class="col-sm-2">

        <div class="actions">
            <div id="header" class="container">
                <div class="btn-group-vertical" role="group" aria-label="...">

                </div>
            </div>
        </div>
    </div>
    <div id="page-content" class="col-sm-9">
        <fieldset>

            <legend>
            <?php echo __('Please enter your username and password!'); ?>
            </legend>
        <?php
        echo $this->Form->input(('username'), array('type' => 'text','class' => 'form-control'));
        echo $this->Form->input(('password'), array('class' => 'form-control'));
        ?>

        </fieldset>
<?php echo $this->Form->end(__('Login'), array('class' => 'btn btn-large btn-primary')); ?>
    </div>
</div>


<?php

if ($this->Session->check('Auth.User')) {
    if ($this->Session->read('Auth.User.confirm') == "1" || $this->Session->read('Auth.User.role') == "admin") {
    echo '<div class="dropdown"><button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
    . $this->Html->link(__('Building'), array('action' => 'add'), array('class' => ''))
    . '<span class="caret"></span></button><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><li>'
    . $this->Html->link(__('New Building'), array('action' => 'add'), array('class' => ''))
    .'</li><li>'
    . $this->Html->link(__('List Buildings'), array('controller' => 'buildings', 'action' => 'index'), array('class' => ''))
    . '</li></ul></div>'
    . "\r\n"
    . '<div class="dropdown"><button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
    . $this->Html->link(__('Apartment'), array('controller' => 'apartments', 'action' => 'add'), array('class' => ''))
    . '<span class="caret"></span></button><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><li>'
    . $this->Html->link(__('New Apartment'), array('controller' => 'apartments', 'action' => 'add'), array('class' => ''))
    .'</li><li>'
    . $this->Html->link(__('List Apartments'), array('controller' => 'apartments', 'action' => 'index'), array('class' => ''))
    . '</li></ul></div>'
    . "\r\n"
    . '<div class="dropdown"><button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><div class="dropdown-toggle" data-toggle="dropdown">'
    . $this->Html->link(__('Tag'), array('controller' => 'tags', 'action' => 'add'), array('class' => ''))
    . '<b class="caret"></b></div></button><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><li>'
    . $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add'), array('class' => ''))
    .'</li><li>'
    . $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index'), array('class' => ''))
    . '</ul></div>'
    . "\r\n"
    . '<div class="dropdown"><button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><div class="dropdown-toggle" data-toggle="dropdown">'
    . $this->Html->link(__('Comment'), array('controller' => 'comments', 'action' => 'add'), array('class' => ''))
    . '<b class="caret"></b></div></button><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><li>'
    . $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add'), array('class' => ''))
    .'</li><li>'
    . $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index'), array('class' => ''))        
    . '</li></ul></div>'
    . "\r\n"
    . '<div class="dropdown"><button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><div class="dropdown-toggle" data-toggle="dropdown">'
    . $this->Html->link(__('Association'), array('controller' => 'associations', 'action' => 'add'), array('class' => ''))
    . '<b class="caret"></b></div></button><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><li>'
    . $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add'), array('class' => ''))
    .'</li><li>'
    . $this->Html->link(__('List Associations'), array('controller' => 'associations', 'action' => 'index'), array('class' => ''))
    . '</li></ul></div>';
    ;
    }
    if ($this->Session->read('Auth.User.role') == "admin") {
        echo "\r\n"
        . '<div class="dropdown"><button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><div class="dropdown-toggle" data-toggle="dropdown">'
        . $this->Html->link(__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => ''))
        . '<b class="caret"></b></div></button><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><li>'
        . $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => ''))
        .'</li><li>'
        . $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => ''))
        . '</li></ul></div>';
    }
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


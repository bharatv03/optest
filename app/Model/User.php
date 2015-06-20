<?php
class User extends AppModel {
    public $validate = array(
        
        'password' => array(
            'rule' => array('minLength', '8'),
            'message' => 'Minimum 8 characters long'
        ),
        'u_e' => 'email'
    );
}
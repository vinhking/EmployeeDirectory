<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 * @property Department $Department
 */
class Employee extends AppModel {

    //var $name = "Employee";
/**
 * Validation rules
 *
 * @var array
 */
    
	public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Tên nhân viên được yêu cầu'
            )
        ),
        'email' => array(
            'required1' => array(
                'rule' => 'notBlank',
                'message' => 'Email được yêu cầu'
            ),
            "required2" => array(
                'rule' => array('email', true),
                "message" => "Vui lòng nhập đúng định dạng",
            ),
            'required3' => array(
                'rule' => 'isUnique',
                'message' => 'Email đã tồn tại'
            )
        ),
        'position' => array(
            'required1' => array(
                'rule' => 'notBlank',
                'message' => 'Chức vụ nhân viên được yêu cầu'
            )
        )   
        );
	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');
/**
 * Department Model
 *
 * @property Employee $Employee
 */
class Department extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
        'name' => array(
            'required1' => array(
                'rule' => 'notBlank',
                'message' => 'Tên phòng ban được yêu cầu'
            ),
            'required2' => array(
                'rule' => 'isUnique',
                'message' => 'Tên phòng ban đã tồn tại'
            )
        )
    );

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'department_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}

<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 * @property Post $Post
 */
class User extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'username' => array(
            'required1' => array(
                'rule' => 'notBlank',
                'message' => 'Username được yêu cầu'
            ),
            'required2' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Chỉ bao gồm các chữ cái và chữ số'
            ),
            'required3' => array(
                'rule' => array('lengthBetween', 5, 20),
                'message' => 'Từ 5 đến 20 kí tự'
            ),
            'required4' => array(
                'rule' => 'isUnique',
                'message' => 'Username đã tồn tại'
            )
        ),
        'password' => array(
            'required1' => array(
                'rule' => 'notBlank',
                'message' => 'Password được yêu cầu'
            ),
            'required2' => array(
                'rule' => array('minLength', '6'),
                'message' => 'Tối thiểu 6 kí tự'
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
        'display_name' => array(
            'required1' => array(
                'rule' => 'notBlank',
                'message' => 'Tên hiển thị được yêu cầu'
            ),
            'required2' => array(
                'rule' => array('lengthBetween', 5, 20),
                'message' => 'Từ 5 đến 20 kí tự'
            )
        ),
        'avatar' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Avatar được yêu cầu'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array(0, 1)),
                'message' => 'Chọn cấp quyền người dùng',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'user_id',
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

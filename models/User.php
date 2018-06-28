<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

//class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
class User extends ActiveRecord implements IdentityInterface
{
//    public $id;
//    public $username;
//    public $password;
    public $confirm_password;
//    public $authKey;
//    public $accessToken;

//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'username', 'password', 'confirm_password'], 'required'],
            ['username', 'checkUserName'],
            ['password', 'string', 'min' => 5],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'The password does not match.'],
        ];
    }

    public static function tableName()
    {
        return '{{users}}';
    }

    public function checkUserName($attribute, $params)
    {
        if (!$this->hasErrors())
            if (User::findByUsername($this->username) != null)
                $this->addError($attribute, 'Username "' . $this->username . '" is already taken.');

    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
//        var_dump(json_encode(User::find()->all(), JSON_PRETTY_PRINT));
//        foreach (self::$users as $user) {
        foreach (User::find()->all() as $user) {
            if (strcasecmp($user->username, $username) === 0) {
                return new static($user);
            }
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}

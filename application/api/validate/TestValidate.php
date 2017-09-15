<?php
/**
 * Created by PhpStorm.
 * User: Gsan
 * Date: 2017/9/10
 * Time: 16:09
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
    ];
}
<?php
/**
 * Created by PhpStorm.
 * User: Gsan
 * Date: 2017/9/10
 * Time: 18:41
 */

namespace app\api\validate;


use app\lib\exception\BaseException;
use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        //获取http传入参数
        //校验
        $request = Request::instance();
        $params = $request->param();

        // batch 多个验证错误错误
        $result = $this->batch()->check($params);
        if (!$result) {
            $e = new ParameterException([
                'msg' => $this->error
            ]);
//            $e->msg = $this->error;
//            $e->errorCode = 10002;
            //$error = $this->error;
            throw $e;
        } else {
            return true;
        }
    }
}
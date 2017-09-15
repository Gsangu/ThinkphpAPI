<?php
/**
 * Created by Gsan.
 * Date: 2017/9/14
 * Time: 17:12
 */

namespace app\lib\exception;


use think\Exception;
use Throwable;

class BaseException extends Exception
{
    public function __construct($params = [])
    {
        if (!is_array($params)) {
            throw new Exception('参数必须是数组');
        }
        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }
        if (array_key_exists('msg', $params)) {
            $this->msg = $params['msg'];
        }
        if (array_key_exists('errorCode', $params)) {
            $this->errorCode = $params['errorCode'];
        }
    }

    // HTTP 状态码  404，200....
    public $code = 400;

    // 错误具体信息
    public $msg = "参数错误";

    // 自定义错误码
    public $errorCode = 10000;
}
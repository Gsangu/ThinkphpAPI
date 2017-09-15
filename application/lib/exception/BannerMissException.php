<?php
/**
 * Created by Gsan.
 * Date: 2017/9/14
 * Time: 17:16
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = "请求的banner不存在";
    public $errorCode = 40000;
}
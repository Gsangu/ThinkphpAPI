<?php
/**
 * Created by Gsan.
 * Date: 2017/9/14
 * Time: 17:09
 */

namespace app\lib\exception;


use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    // 客户端当前请求的URL路径
    public function render(\Exception $e)
    {
        if ($e instanceof BaseException) {
            // 若是自定义异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            if(config('app_debug')){
                return parent::render($e);
            }
            $this->code = 500;
            $this->msg = '服务器内部错误';
            $this->errorCode = 999;
            $this->recordErrorLog($e);
        }
        $request = Request::instance();

        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request->url()
        ];
        return json($result, $this->code);
    }

    private function recordErrorLog(Exception $e)
    {
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(),'error');
    }
}
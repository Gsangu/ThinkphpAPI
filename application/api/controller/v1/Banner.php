<?php
/**
 * Created by PhpStorm.
 * User: Gsan
 * Date: 2017/9/10
 * Time: 14:09
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePositiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
use think\Exception;
use think\Validate;

class Banner
{
    /**
     * 获取指定id 的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     *
     */
    public function getBanner($id)
    {
        (new IDMustBePositiveInt())->goCheck();

        $banner = BannerModel::getBannerByID($id);
        if(!$banner){
            throw new Exception('内部错误');
        }
        return $banner;
    }
}
<?php
/**
 * Created By PhpStorm.
 * User: Li Ming
 * Date: 2021-08-27
 * Fun:
 */

namespace Modules\AlipayApplet\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Support\Jsonable;

class AlipayAppletTemplate extends BaseModel
{
    use HasFactory;
    protected $table = "alipay_applet_template";

    public static function getGroupArr()
    {
        return [
            ["name" => "shop", "title" => "商城"],
            ["name" => "share", "title" => "分销"],
            ["name" => "pt", "title" => "拼团"],
            ["name" => "yy", "title" => "预约"],
            ["name" => "mch", "title" => "多商户"],
            ["name" => "fission", "title" => "裂变拆红包"],
        ];
    }

}
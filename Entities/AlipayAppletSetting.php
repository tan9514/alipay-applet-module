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

class AlipayAppletSetting extends BaseModel
{
    use HasFactory;
    protected $table = "alipay_applet_setting";
}
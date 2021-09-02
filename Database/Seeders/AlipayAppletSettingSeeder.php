<?php
namespace Modules\AlipayApplet\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * @author liming
 * @date 2021-08-26
 */
class AlipayAppletSettingSeeder extends Seeder
{
    public function run()
    {
        if (Schema::hasTable('alipay_applet_setting')){
            $info = DB::table('alipay_applet_setting')->where('id', '>', 0)->first();
            if(!$info){
                $arr = $this->defaultInfo();
                if(!empty($arr) && is_array($arr)) {
                    $created_at = $updated_at = date("Y-m-d H:i:s");
                    foreach ($arr as $name => $item) {
                        DB::table('alipay_applet_setting')->insert([
                            'group' => $item['group'],
                            'code' => $item['code'],
                            'title' => $item['title'],
                            'value' => $item["value"],
                            'remark' => $item["remark"],
                            'sort' => $item["sort"],
                            'created_at' => $created_at,
                            'updated_at' => $updated_at,
                        ]);
                    }
                }
            }
        }
    }

    /**
     * 新增支付宝小程序基础信息
     */
    private function defaultInfo()
    {
        return [
            [
                "group" => "base", "code" => "app_id", "title" => "小程序ID",
                "value" => "", "remark" => "", "sort" => 1,
            ],
            [
                "group" => "base", "code" => "alipay_public_key", "title" => "支付宝公钥",
                "value" => "", "remark" => "", "sort" => 2,
            ],
            [
                "group" => "base", "code" => "app_private_key", "title" => "应用私钥",
                "value" => "", "remark" => "", "sort" => 3,
            ],
            [
                "group" => "customer_service", "code" => "tnt_inst_id", "title" => "云客服 - tntInstId",
                "value" => "", "remark" => "智能客服聊天窗里面的参数", "sort" => 4,
            ],
            [
                "group" => "customer_service", "code" => "scene", "title" => "云客服 - scene",
                "value" => "", "remark" => "智能客服聊天窗里面的参数", "sort" => 5,
            ],
        ];
    }
}
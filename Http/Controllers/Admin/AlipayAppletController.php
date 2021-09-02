<?php
// @author liming
namespace Modules\AlipayApplet\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\AlipayApplet\Entities\AlipayAppletSetting;
use Modules\AlipayApplet\Entities\AlipayAppletTemplate;
use Modules\AlipayApplet\Http\Requests\Admin\AlipayAppletSettingRequest;
use Modules\AlipayApplet\Http\Requests\Admin\AlipayAppletTemplateRequest;
use Modules\AlipayApplet\Http\Controllers\Controller;

class AlipayAppletController extends Controller
{
    /**
     * 支付宝小程序基础配置
     */
    public function setting(AlipayAppletSettingRequest $request)
    {
        if($request->isMethod('post')) {
            $request->check();
            $data = $request->post("data");
            if(!is_array($data)) return $this->failed('参数错误');

            DB::beginTransaction();
            try {
                foreach ($data as $item){
                    $code = $item['code'] ?? "";
                    $info = AlipayAppletSetting::where("code", $code)->first();
                    if(!$info) throw new \Exception("小程序配置参数不存在");
                    $info->value = $item['value'] ?? "";
                    if(!$info->save()) throw new \Exception("操作失败：" . $info->title . "修改失败");
                }
                DB::commit();
                return $this->success();
            }catch (\Exception $e){
                DB::rollBack();
                return $this->failed($e->getMessage());
            }
        } else {
            $title = "基础设置";
            $list = AlipayAppletSetting::orderBy("group")->orderBy("sort")->get();
            return view('alipayappletview::admin.alipay_applet.setting', compact('title', "list"));
        }
    }

    /**
     * 支付宝小程序模板消息设置
     */
    public function template(AlipayAppletTemplateRequest $request)
    {
        if($request->isMethod('post')) {
            $request->check();
            $data = $request->post();

            DB::beginTransaction();
            try {
                foreach ($data as $code => $value){
                    $info = AlipayAppletTemplate::where("code", $code)->first();
                    if(!$info) throw new \Exception("小程序模板标识不存在");
                    $info->value = $value ?? "";
                    if(!$info->save()) throw new \Exception("操作失败：" . $info->title . "修改失败");
                }
                DB::commit();
                return $this->success();
            }catch (\Exception $e){
                DB::rollBack();
                return $this->failed($e->getMessage());
            }
        } else {
            $title = "模板消息";
            $list = AlipayAppletTemplate::getGroupArr();
            foreach ($list as &$item){
                $item["data"] = AlipayAppletTemplate::where("group", $item["name"])->orderBy("sort")->get()->toArray();
            }
            return view('alipayappletview::admin.alipay_applet.template', compact('title', "list"));
        }
    }
}

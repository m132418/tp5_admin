<?php
namespace app\admin\controller;
use think\Controller ;
use think\Db;
use think\Request;
class Test extends Controller
{
    public function index()
    {
      $data = Db::name('users')->where('user_id',1031)->find();
//       var_dump($data) ;die() ;
        
        $this->assign('name',$data['nickname']) ;
        $this->assign('email',$data['email']) ;
        
      return   $this->fetch() ;
    }
    public function json() {
        
      $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
//         return ['data'=>$data,'code'=>1,'message'=>'操作完成'];
        return json_encode($data);
//         $this->ajaxReturn($data);
//         return ['name'=>'thinkphp','status'=>1];
        
    }
    public function t2() {
        $request = Request::instance();
        // 获取当前域名
        echo 'domain: ' . $request->domain() . '<br/>';
        // 获取当前入口文件
        echo 'file: ' . $request->baseFile() . '<br/>';
        // 获取当前URL地址 不含域名
        echo 'url: ' . $request->url() . '<br/>';
        // 获取包含域名的完整URL地址
        echo 'url with domain: ' . $request->url(true) . '<br/>';
        // 获取当前URL地址 不含QUERY_STRING
        echo 'url without query: ' . $request->baseUrl() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root:' . $request->root() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root with domain: ' . $request->root(true) . '<br/>';
        // 获取URL地址中的PATH_INFO信息
        echo 'pathinfo: ' . $request->pathinfo() . '<br/>';
        // 获取URL地址中的PATH_INFO信息 不含后缀
        echo 'pathinfo: ' . $request->path() . '<br/>';
        // 获取URL地址中的后缀信息
        echo 'ext: ' . $request->ext() . '<br/>';
        
//         $request = Request::instance();
        echo "当前模块名称是" . $request->module();
        echo "当前控制器名称是" . $request->controller();
        echo "当前操作名称是" . $request->action();
        
        echo '路由信息：';
        dump($request->route());
        echo '调度信息：';
        dump($request->dispatch());
        
        p($request->isAjax()) ;
        
//         $this->success('好',url('index'));
//         $this->error('新增失败');
        $this->redirect(url('index'));
    }
    public function t3() {
        echo "" . PUBLIC_PATH ;
    }
}

<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        // 获取首页大图数据
        $topPicNews = D("PositionContent")->select(array('status'=>1, 'position_id'=>2), 1);
        // 首页3小图推荐
        $topSmallNews = D("PositionContent")->select(array('status'=>1, 'position_id'=>3), 3);
        
        $this->assign('result', array(
            'topPicNews' => $topPicNews,
            'topSmallNews' => $topSmallNews,
        ));
        $this->display();
    }
}

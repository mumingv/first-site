<?php
/***********************************************************
 *     FileName: MenuController.class.php
 *         Desc: 后台菜单相关处理
 *       Author: Jie Yin
 *        Email: mumingv@163.com
 *     HomePage: https://github.com/mumingv
 *      Version: 0.0.1
 *   LastChange: 2016-05-31 23:00:10
 *      History:
 ***********************************************************/
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class MenuController extends CommonController {

    public function add(){
        if ($_POST) {
            print_r($_POST);
        } else {
            $this->display();
        }
        // echo "welcome to singcms";
    }

    public function index() {
        $this->display();
    }

}

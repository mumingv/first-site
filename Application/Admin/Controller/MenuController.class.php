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
            //print_r($_POST);
            if (!isset($_POST['name']) || !$_POST['name']) {
                return show(0, '菜单名称不能为空');
            }
            if (!isset($_POST['m']) || !$_POST['m']) {
                return show(0, '模块名称不能为空');
            }
            if (!isset($_POST['c']) || !$_POST['c']) {
                return show(0, '控制器名称不能为空');
            }
            if (!isset($_POST['f']) || !$_POST['f']) {
                return show(0, '方法名称不能为空');
            }

            $menuId = D("Menu")->insert($_POST);
            if ($menuId) {
                return show(1, '新建成功', $menuId );
            }
            return show(1, '新增失败', $menuId);
        } else {
            $this->display();
        }
        // echo "welcome to singcms";
    }

    public function index() {
        $data = array();
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;
        $menus = D("Menu")->getMenus($data, $page, $pageSize);
        $menusCount = D("Menu")->getMenusCount($data);

        $res = new \Think\Page($menusCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('menus', $menus);
        $this->display();
    }

}

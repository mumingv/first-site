<?php
namespace Common\Model;
use Think\Model;

class MenuModel extends Model {
    private $_db = '';
    public function __construct() {
        $this->_db = M('menu');
    }

    public function insert($data = array()) {
        if (!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
}

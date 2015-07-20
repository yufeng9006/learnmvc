<?php

defined("APPPATH") or exit("No direct script access allowed");

    /**
     * Class M_sign
     * 用于用户登录的操作
     */
    class M_sign extends SR_Model
    {
        function __construct()
        {
            parent::__construct();
            $this->_db = $this->load->database("learnmvc");
        }


        /**
         * 注册用户数据入库
         * @author jun
         * @access public
         * @param string $user_name 用户名
         * @param string $user_pwd 用户密码
         * @return array
         */
        public function signOn( $user_name , $user_pwd )
        {
            $result = array('status'=>false, 'msg'=>'', 'code'=>10088, 'data'=>array());
            $data = array(
                'u_name'    =>  $user_name,                 // 用户名
                'u_pwd'     =>  $user_pwd,                  // 用户密码
                'u_addtime' =>  date(time()),               // 注册时间
                'u_addip'   =>  $_SERVER['REMOTE_ADDR'],    // 浏览当前页面的用户ip地址
            );
            $insert_id = $this->_db->autoInsert( $data, 'l_use' );
            if(intval($insert_id) > 0)
            {
                $result['status'] = true;
            }
            return $result;
        }
    }
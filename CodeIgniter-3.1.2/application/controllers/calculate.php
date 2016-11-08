<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/3 0003
 * Time: 16:38
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 计算控制器，类名首字母必须大写，所有的控制器必须继承自CI_Controller类
 */
class Calculate extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('calculate_model');
    }

    function index(){
        $this->load->view('calculate_view');
    }

    function count(){
        //使用输入类接收参数
        $num1 = $this->input->post('num1');
        $op = $this->input->post('operate');
        $num2 = $this->input->post('num2');

        if(is_numeric($num1) && is_numeric($num2)) {
            //如果两个输入数据均为数字，则调用calculate_model模型下的count方法
            $result = $this->calculate_model->count($num1,$num2,$op);
            //生成要传给视图的数据
//            $data = array('num1'=>$num1, 'num2'=>$num2, 'op'=>$op, 'result'=>$result);
            //加载视图
//            $this->load->view('result_view', $data);

            //ajax修改：采用文本格式作为回传值，所以直接返回结果
            echo $result;
        }else {
            echo FALSE;
        }
    }
}
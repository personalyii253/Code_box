<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	//分页
	public function index($page=0)
	{
		$count=$this->db->count_all('admin');//总条数
		$page=isset($_POST['page'])?$_POST['page']:1;//当前页
		$size=3;//每页显示条数
		$num=ceil($count/$size);//总页数
		$limit=($page-1)*$size;//偏移量
		$data['arr']=$this->db->get('admin',$size,$limit)->result_array();//按每页条数与偏移量查询出数据
		//print_R($data);
		$last=$page-1<1?1:$page-1;
		$next=$page+1>$num?$num:$page+1;
		$ast="";
		$ast.="<a href='javascript:void(0)' onclick='fun(1)'>首页</a>";
		$ast.="<a href='javascript:void(0)' onclick='fun($last)'>上一页</a>";
		$ast.="<a href='javascript:void(0)' onclick='fun($next)'>下一页</a>";
		$ast.="<a href='javascript:void(0)' onclick='fun($num)'>尾页</a>";
		$data['page']=$ast;
		//print_r($data);
		$this->load->view('list',$data);
	}
	//即点即改
	public function up_xiu(){
		$a_id=$_POST['a_id'];
		$a_name=$_POST['vals'];
		//print_r($a_name);die;
		$thi=$this->db->where('a_id',$a_id)->update('admin',array('a_name'=>$a_name));
		//print_R($a_name);
		/*if($thi){
			echo 1;die;
		}else{
			echo 0;die;
		}*/
	}
}

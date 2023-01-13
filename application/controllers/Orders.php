<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
	public function index()
	{
		$data = array();
		$req['access_token'] = $_SESSION['userSession'];
		$data['orders'] = post_curl("admin/orders/get", $req)['data'];
		userTemplate("pages/orders/list", $data);
	}

	public function details($order_master_id = null)
	{
		if($order_master_id == null){
			redirect("orders");
			exit;
		}
		$data = array();
		$req['access_token'] = $_SESSION['userSession'];
		$req['order_id'] = $order_master_id;
		$data['order'] = post_curl("admin/orders/details", $req)['data'];
		userTemplate("pages/orders/detail", $data);
	}

	public function approve($order_master_id = null)
	{
		if($order_master_id == null){
			redirect("orders");
			exit;
		}
		$req['access_token'] = $_SESSION['userSession'];
		$req['order_id'] = $order_master_id;
		$req['action'] = 'approved';
		post_curl("admin/orders/action", $req)['data'];
		redirect(base_url("orders/details/".$order_master_id));
	}

	public function deliver($order_master_id = null)
	{
		if($order_master_id == null){
			redirect("orders");
			exit;
		}
		$req['access_token'] = $_SESSION['userSession'];
		$req['order_id'] = $order_master_id;
		$req['action'] = 'received';
		post_curl("admin/orders/action", $req)['data'];
		redirect(base_url("orders/details/".$order_master_id));
	}

	public function reject($order_master_id = null)
	{
		if($order_master_id == null){
			redirect("orders");
			exit;
		}
		$req['access_token'] = $_SESSION['userSession'];
		$req['order_id'] = $order_master_id;
		$req['action'] = 'cancelled';
		post_curl("admin/orders/action", $req)['data'];
		redirect(base_url("orders/details/".$order_master_id));
	}
}

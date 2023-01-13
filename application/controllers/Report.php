<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
	public function summary()
	{
		$data = array();
		$req['access_token'] = $_SESSION['userSession'];
		$req['period'] = getMonth();
		if (isset($_POST['period'])) {
			$req['period'] = $_POST['period'];
		}
		$response = post_curl("admin/report/summary", $req);
		$data['period'] = $req['period'];
		$data['reports'] = $response['data'];
		userTemplate("pages/reports/summary", $data);
	}

	public function yearly()
	{
		$data = array();
		$req['access_token'] = $_SESSION['userSession'];
		$response = post_curl("admin/report/yearly", $req);
		$data['reports'] = $response['data'];
		userTemplate("pages/reports/yearly", $data);
	}

	public function year($year)
	{
		$data = array();
		$req['access_token'] = $_SESSION['userSession'];
		$req['year'] = $year;
		$response = post_curl("admin/report/year", $req);
		$data['reports'] = $response['data'];
		userTemplate("pages/reports/year", $data);
	}

	public function month($month)
	{
		$data = array();
		$req['access_token'] = $_SESSION['userSession'];
		$req['month'] = $month;
		$response = post_curl("admin/report/month", $req);
		$data['reports'] = $response['data'];
		userTemplate("pages/reports/month", $data);
	}

	public function star()
	{
		set_time_limit(0);
		ini_set('memory_limit', '1024M');
		ini_set('max_execution_time', '-1');
		ini_set('post_max_size ', '-1');
		$data['title'] = "[[ADM_STAR_REPORT]]";
		$data['star_reportx'] = true;
		$data['fl_user'] = isset($_POST['fl_user']) ? $_POST['fl_user'] : '';
		$data['fl_rank'] = isset($_POST['fl_rank']) ? $_POST['fl_rank'] : 'any';
		$data['period'] = isset($_POST['period']) ? $_POST['period'] : date("Y-m");

		$data['access_token'] = $_SESSION['userSession'];
		$response = post_curl("admin/report/star", $data);
		$data['reports'] = $response['data'];
		userTemplate("pages/reports/star", $data);
	}
}

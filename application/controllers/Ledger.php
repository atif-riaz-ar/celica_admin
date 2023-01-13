<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ledger extends CI_Controller
{
	public function sales()
	{
		if (!isset($_POST['selyrfrom'])) {
			$_POST['currency'] = "CC";
			$_POST['selyrfrom'] = date('Y');
			$_POST['selmonfrom'] = date('m');
			$_POST['selyrto'] = date('Y');
			$_POST['selmonto'] = date('m');
			$_POST['member_id'] = "";
		}
		$_POST['type'] = "sales";
		$data['reports'] = post_curl("admin/report/ledger", $_POST)['data'];
		$data['currencies'] = post_curl("currencies/get", $_POST)['data'];
		userTemplate("pages/ledgers/sales", $data);
	}

	public function withdrawals()
	{
		if (!isset($_POST['selyrfrom'])) {
			$_POST['currency'] = "CC";
			$_POST['selyrfrom'] = date('Y');
			$_POST['selmonfrom'] = date('m');
			$_POST['selyrto'] = date('Y');
			$_POST['selmonto'] = date('m');
			$_POST['member_id'] = "";
		}
		$_POST['type'] = "withdrawals";
		$data['reports'] = post_curl("admin/report/ledger", $_POST)['data'];
		$data['currencies'] = post_curl("currencies/get", $_POST)['data'];
		userTemplate("pages/ledgers/withdrawals", $data);
	}

	public function transfers()
	{
		if (!isset($_POST['selyrfrom'])) {
			$_POST['currency'] = "CC";
			$_POST['selyrfrom'] = date('Y');
			$_POST['selmonfrom'] = date('m');
			$_POST['selyrto'] = date('Y');
			$_POST['selmonto'] = date('m');
			$_POST['member_id'] = "";
		}
		$_POST['type'] = "transfers";
		$data['reports'] = post_curl("admin/report/ledger", $_POST)['data'];
		$data['currencies'] = post_curl("currencies/get", $_POST)['data'];
		userTemplate("pages/ledgers/transfers", $data);
	}

	public function converts()
	{
		if (!isset($_POST['selyrfrom'])) {
			$_POST['currency'] = "CC";
			$_POST['selyrfrom'] = date('Y');
			$_POST['selmonfrom'] = date('m');
			$_POST['selyrto'] = date('Y');
			$_POST['selmonto'] = date('m');
			$_POST['member_id'] = "";
		}
		$_POST['type'] = "converts";
		$data['reports'] = post_curl("admin/report/ledger", $_POST)['data'];
		$data['currencies'] = post_curl("currencies/get", $_POST)['data'];
		userTemplate("pages/ledgers/converts", $data);
	}

	public function commissions()
	{
		if (!isset($_POST['selyrfrom'])) {
			$_POST['bonus'] = "ALL_BONUS";
			$_POST['selyrfrom'] = date('Y');
			$_POST['selmonfrom'] = date('m');
			$_POST['selyrto'] = date('Y');
			$_POST['selmonto'] = date('m');
			$_POST['member_id'] = "";
		}
		$_POST['type'] = "commissions";
		$data['reports'] = post_curl("admin/report/ledger", $_POST)['data'];
		$data['currencies'] = post_curl("currencies/get", $_POST)['data'];
		userTemplate("pages/ledgers/commissions", $data);
	}

	public function topups()
	{
		if (!isset($_POST['selyrfrom'])) {
			$_POST['currency'] = "CC";
			$_POST['selyrfrom'] = date('Y');
			$_POST['selmonfrom'] = date('m');
			$_POST['selyrto'] = date('Y');
			$_POST['selmonto'] = date('m');
			$_POST['member_id'] = "";
		}
		$_POST['type'] = "topups";
		$data['reports'] = post_curl("admin/report/ledger", $_POST)['data'];
		$data['currencies'] = post_curl("currencies/get", $_POST)['data'];
		userTemplate("pages/ledgers/topups", $data);
	}
}

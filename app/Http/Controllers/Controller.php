<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function index() {
		$setups = DB::table('setup')->get();
		$cmds = DB::table('command_default_list')->get();
		return view('dashboard',['setups'=>$setups,'cmds'=>$cmds]);
	}

	public function configurator() {
		return view('default-settings');
	}

	public function command($id_cmd,$id_setup){
		if ($this->already_exist($id_cmd, $id_setup)== null) {
			DB::table('command_exec')->insert(['id_user' => $id_setup, 'id_command' => $id_cmd, 'executed' => 0]);
		}
		return back();
	}
	private function find_command($cms) {
		try {
			$cms_id = DB::table('command_default_list')->where('cmd', '=', $cms)->first();
			return $cms_id->id;
		} catch (\Exception $e) {
			$e->getMessage();
		}
	}

	private function already_exist($cms,$id) {
		$result = DB::table('command_exec')->select('*')
			->where([
				['id_user','=',$id],
				['id_command','=',$this->find_command($cms)],
				['executed','=','0'],
			])->first();
		return $result;
	}

	public function find_setup($hwid) {
		return DB::table('setup')->where('hwid','=',$hwid)->first();
	}

}

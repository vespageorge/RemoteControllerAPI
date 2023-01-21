<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
	public function api_get_commands($id) {
		return DB::table('command_exec')
		->join('command_default_list', 'command_exec.id_command', '=', 'command_default_list.id')
		->join('setup', 'setup.id', '=', 'command_exec.id_user')
		->join('command_types','command_types.id','=','command_default_list.command_type_id')
		->select('command_default_list.cmd', 'command_exec.id', 'command_default_list.command_type_id','command_types.name')
		->where('executed', '=', '0')
		->where('setup.id', '=', $id)
		->get();
	}

	public function api_get_setup($hwid) {
		return DB::table('setup')->where('hwid', '=', $hwid)->first();
	}

	public function api_post_setup(Request $request) {
		if (!Controller::find_setup($request->hwid)) {
			return DB::table('setup')
			->insert([
				'platform' => $request->platform,
				'hostname' => $request->hostname,
				'ip_address' => $request->ip_address,
				'mac_address' => $request->mac_address,
				'hwid' => $request->hwid
			]);
		} else {
			return DB::table('setup')->where('hwid','=',$request->hwid)->first();
		}
	}

	public function update_cmd_status($cmd_id) {
		return DB::table('command_exec')->where('id','=',$cmd_id)->update(['executed'=>1]);
	}

	public function upload_ss(Request $request) {
		$file = $request->file('img');
		$path = public_path() . '/uploads/images/store/';
    	$file->move($path, $file->getClientOriginalName());
		return 200;
	}

}

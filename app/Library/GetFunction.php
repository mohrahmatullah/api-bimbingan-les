<?php
namespace App\Library;

use App\Models\Transaction;
use DateTime;

class GetFunction
{
  /**
   * Get function for reports
   *
   * @param Start date, End date
   * @return obj
   */
	public static function autoCancelTransaction()
	{
		$table = Transaction::where('status','pending')->get();
		foreach($table as $row){
			
			$start = date("Y-m-d H:i:s", strtotime($row->created_at));
			// $order_expired_date = date('Y-m-d H:i:s', strtotime($row->created_at . ' +2 minutes'));
			// $order_expired_date = date('Y-m-d H:i:s', strtotime($row->created_at . ' +1 hours'));

			$startdate = date("Y-m-d H:i:s", strtotime($row->created_at));
			// $expire = strtotime($startdate. ' + 2 minutes');
			$expire = strtotime($startdate. ' + 1 hours');
			$today = strtotime("now");

			if($today >= $expire){
			    Transaction::where('status','pending')->update(['status' => 'cancel']);;
			} 

		}  

		// Variable Response Code, Data, Messages, Status
		$response = ['code' => 200, 'msg' => 'success', 'status' => true];
		// Return Response
		return $response;
	}
}

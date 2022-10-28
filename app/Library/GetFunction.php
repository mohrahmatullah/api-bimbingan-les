<?php
namespace App\Library;

use App\Models\Transaction;

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
		$table = Transaction::all();
		foreach($table as $row){
			
			$create_at = date("Y-m-d H:i:s", strtotime($row->created_at));
			$order_expired_date = date('Y-m-d H:i:s', strtotime($row->created_at . ' +2 minutes'));

			if($create_at > $order_expired_date){
				$result[] = Transaction::where('status','pending')->update(['status' => 'cancel']);
			}
			// $now	=	date('Y-m-d H:i:s', strtotime('now'));
			// $create_at = date("Y-m-d H:i:s", strtotime($row->created_at));
			// $time_limit = date("Y-m-d H:i:s", strtotime($row->created_at . " +2 minutes"));
			// // $time_limit = date("Y-m-d H:i:s", strtotime($row->created_at . " +1 hours"));
			    
			// if (($now >= $create_at) && ($now <= $time_limit)){
			//     $result[] = Transaction::where('status','pending')->update(['status' => 'cancel']);
			// }else{
			//     echo "NO GO!";  
			// }

		}  

		// Variable Response Code, Data, Messages, Status
		$response = ['code' => 200, 'msg' => 'success', 'status' => true];
		// Return Response
		return $response;
	}
}

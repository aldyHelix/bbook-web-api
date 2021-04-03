<?php 

namespace App\Repositories\Raw;

interface RawInterface {
	public function deleteHasRawById($table, $column, $id);
}
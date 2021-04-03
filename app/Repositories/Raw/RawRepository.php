<?php

namespace App\Repositories\Raw;

use App\Repositories\Raw\RawInterface as RawInterface;
use DB;

class RawRepository implements RawInterface
{
	protected $raw;

	public function __construct(DB $raw)
	{
		$this->raw = $raw;
	}

	public function deleteHasRawById($table, $column, $id)
	{
		$this->raw = table($table)->where($column,$id)->delete();
		return 'Success delete data';
	}
}

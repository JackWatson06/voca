<?php

namespace App\Services\Constant;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Constant
{

		/**
		 * TODO:  Use caching
		 * TODO:  Custom Exceptions
		 * TODO:  Constants Collision (what should we do about that?)
		 * TODO:  Use the static syntax for calling constants Constant::EMPLOYEE
		 */

		/**
		 * Dictionary which holds all the constants in the program.
		 * @var array
		 */
		private $constants = [];


		public function __construct() {

    	}



		/**
		 * Load the constants inside the table.
		 * @return bool Success in loading all of the values.
		 */
		public function load(){

			$tables = config('constant.tables');

			foreach($tables as $table){
				$this->extractConstantsFromTable($table);
			}

			return true;
		}


		
		/**
		 * Get a constant based on the name of the constant.
		 * @param  string $constant Constant we want
		 * @return int           Id for the constant.
		 */
		public function get(string $constant)
		{
			$tableConst = $this->transformConstantInput($constant);

			if( isset($this->constants[$tableConst->table][$tableConst->constant]) )
			{
				return $this->constants[$tableConst->table][$tableConst->constant];
			}
			else
			{
				throw new \Exception($constant . " contstant not found.");
			}

		}



		public function getAll(string $table)
		{
			if( isset($this->constants[$table]) )
			{
				return $this->constants[$table];
			}
			else
			{
				throw new \Exception($table . " table not found.");
			}
		}


		/**
		 * This function takes in data that is returned from a table, and pushes them
		 * to the constants array.
		 * TODO check to see if constant already exists under table. If it does throw an error.
		 * @return void
		 */
		private function extractConstantsFromTable(string $table){
			if(!Schema::hasTable($table)) return;

			$constants = DB::table($table)->get()->toArray();

			foreach($constants as $constant)
			{
				$tableConstant = $this->arrayToTableConstant([$table, $constant->name]);
				$this->constants[$tableConstant->table][$tableConstant->constant] = $constant->id;
			}
		}


		private function transformConstantInput(String $constant)
		{
			$constantSplit = explode (":", $constant);

			if(count($constantSplit) != 2) throw new \Exception(' Constant does not follow pattern table:constant ');

			return $this->arrayToTableConstant($constantSplit);

		}


		private function arrayToTableConstant(array $constArray)
		{
			if(count($constArray) != 2) throw new \Exception(' Constant does not follow pattern [table, constant] ');

			$tableConstant = new TableConstant();
			$tableConstant->table = strtolower($constArray[0]);
			$tableConstant->constant = strtolower($constArray[1]);

			return $tableConstant;
		}



}


class TableConstant 
{
    public $table;
    public $constant;
}

<?php

namespace App\Services\Constant;

use Illuminate\Support\Facades\DB;

class Constant
{

		/**
		 * TODO:  Use caching
		 * TODO:  Custom Exceptions
		 * TODO:  Constants Collision (what should we do about that?)
		 * TODO:  Use the static syntax for calling constants Constant::EMPLOYEE
		 * TODO:  Check to see what happens when there is a collision of constants. Did
		 * 				not get time to see. Ex,  Roles::EMPLOYEE, Document::EMPLOYEE
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
				$this->extractConstantsFromTable('constant_' . $table);
			}

			return true;
		}

		/**
		 * Get a constant based on the name of the constant.
		 * TODO refactor to support checks for multiple constants with same name.
		 * @param  string $constant [description]
		 * @return [type]           [description]
		 */
		public function get(string $constant){

			if(isset($this->constants[$constant])){
				return $this->constants[$constant];
			}else{
				throw new \Exception($constant . " contstant not found.");
			}

		}

		/**
		 * This function takes in data that is returned from a table, and pushes them
		 * to the constants array.
		 * @return void
		 */
		private function extractConstantsFromTable(string $table){
			$constants = DB::table($table)->get()->toArray();

			foreach($constants as $constant){
				$this->constants[$constant->name] = $constant->id;
			}

		}



}

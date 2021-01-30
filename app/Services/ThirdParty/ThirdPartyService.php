<?php

class ThirdPartyService
{


		private $apis = [

			Constants::ENGAGEBAY => "App\Services\ThirdParty\ThirPartyApi\EngageBayApi.php",
			Constants::GOOGLECALENDER => "App\Services\ThirdParty\ThirPartyApi\EngageBayApi.php",

		];

		public function __construct() {
        echo "In BaseClass constructor\n";
    }


		public function api(){


		}



}

<?php

    /*
	 * ETISPublications
	 *
	 * Gets all publications of a preson from ETIS using profile URL
	 *
	 * @etis_main ETIS main URL used for constructing other URLs
	 * @profile_url URL of a person profile in ETIS
	 * @personVID PersonVID parameter in ETIS, should be person unique identifier
	 * @pubs_holder_id Identifier of an element publications should be extracted from
	 * @pubs Array of extracted publications
	 * @pubs_count Count of extracted publications
	 *
	 */

    class ETISPublications {
		private $etis_main = 'https://www.etis.ee/';
		private $profile_url;
		private $personVID;
		private $pubs_holder_id = 'ctl00_ContentPlaceHolder1_PortaalIsikuPublikatsioonid1_GridView1';
		private $pubs = array();
		private $pubs_count = 0;

        /**
         * Constructs an object with extracted publications data.
         * @param string $profile_url Profile URL
         * @return void
         */
		public function __construct($profile_url) {
			$this->profile_url = $profile_url;
			$this->extractPersonVID();
			if ($this->personVID) {
				$data = mb_convert_encoding(file_get_contents($this->etis_main."portaal/isikuPublikatsioonid.aspx?PersonVID={$this->personVID}&lang=et"), 'HTML-ENTITIES', 'UTF-8');
                // Set error suppression according to config
                $old_luie = libxml_use_internal_errors(elgg_get_config('etis:libxml_use_internal_errors'));
				$doc = new DOMDOcument();
				$doc->loadHTML($data);
				unset($data);
				$pubs_holder = $doc->getElementById($this->pubs_holder_id);
				if ($pubs_holder) {
					$pubs_a = $pubs_holder->getElementsByTagName('a');
					$pubs = array();
					foreach ($pubs_a as $pub) {
						$pubs[] = $pub->nodeValue;
					}
					$this->setPubs($pubs);
					unset($pubs); unset($pubs_a);
				}
				unset($pubs_holder);
				unset($doc);
                // Set error suppression back to old value and clear errors
                libxml_use_internal_errors($old_luie);
                libxml_clear_errors();
			}
		}

        /**
         * Returns profile URL (provided on construction)
         * @return string Profile URL
         */
		public function getProfileUrl() {
			return $this->profile_url;
		}

        /**
         * Returns personVID parameter value
         * @return string PersonVID
         */
		public function getPersonVID() {
			return $this->personVID;
		}

        /**
         * Returns publications data
         * @return array
         */
		public function getPubs() {
			return $this->pubs;
		}

        /**
         * Returns publications count (defaults to 0)
         * @return int
         */
		public function getPubsCount() {
			return $this->pubs_count;
		}

        /**
         * Set publications
         * @param array Publications data
         * @return void
         */
		private function setPubs($pubs) {
			$this->pubs = $pubs;
			$this->pubs_count = sizeof($pubs);
		}

        /**
         * Extract personVID from URL.
         * Extracted identifier will be set as personVID parameter of an object.
         * @return void
         */
		private function extractPersonVID() {
			if (preg_match('#PersonVID=([^&]+)#i', $this->profile_url, $vid)) {
				if (is_array($vid) && sizeof($vid)>1) {
					$this->personVID = $vid[1];
				}
			}
		}
	}

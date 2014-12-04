<?php
require_once( dirname(__FILE__) . "/ValidateFormElements.php");

/**
 * SubmitForm
 *
 * Submit and process the form
 */
class SubmitForm {

	/**
	 * calls the necessary logic to process the form, randomize the people and send
	 * the emails
	 *
	 * @param  array  $postData array of post data from the form
	 * @return boolean
	 */
	public function call(array $postData = array()) {
		if (
			!is_array($postData)
			|| !array_key_exists('data', $postData)
		) {
			return false;
		}

		$people = ($postData['data']) ? $postData['data'] : null;

		if (
			!is_array($people)
			|| !array_key_exists('Person', $people)
		) {
			return false;
		}

		// Person should contain: name/email/wishlist
		foreach($people['Person'] as &$person) {
			$person['name'] = filter_var($person['name'], FILTER_SANITIZE_STRING);
			$person['email'] = filter_var($person['email'], FILTER_SANITIZE_EMAIL);
			$person['wishlist'] = filter_var($person['wishlist'], FILTER_SANITIZE_STRING);

			$ValidateFormElements = new ValidateFormElements();
			if (
				!$ValidateFormElements->validateName($person['name'])
				|| $ValidateFormElements->validateEmail($person['email'])
			) {
				return false;
			}
		}
	}
}
<?php

namespace Auth;

class User {

	private $wpId;
	private $code;
	private $username;
	private $cardNumber;
	private $firstName;
	private $lastName;
	private $phone;
	private $email;
	private $street1;
	private $street2;
	private $city;
	private $state;
	private $postalCode;
	private $country;
	private $password;

	/**
	 * @param mixed $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param mixed $cardNumber
	 */
	public function setCardNumber($cardNumber) {
		$this->cardNumber = $cardNumber;
	}

	/**
	 * @return mixed
	 */
	public function getCardNumber() {
		return $this->cardNumber;
	}

	/**
	 * @param mixed $city
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * @return mixed
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @param mixed $country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * @return mixed
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param mixed $firstName
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * @return mixed
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @param mixed $lastName
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * @return mixed
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @param mixed $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * @return mixed
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param mixed $postalCode
	 */
	public function setPostalCode($postalCode) {
		$this->postalCode = $postalCode;
	}

	/**
	 * @return mixed
	 */
	public function getPostalCode() {
		return $this->postalCode;
	}

	/**
	 * @param mixed $state
	 */
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * @return mixed
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * @param mixed $street1
	 */
	public function setStreet1($street1) {
		$this->street1 = $street1;
	}

	/**
	 * @return mixed
	 */
	public function getStreet1() {
		return $this->street1;
	}

	/**
	 * @param mixed $street2
	 */
	public function setStreet2($street2) {
		$this->street2 = $street2;
	}

	/**
	 * @return mixed
	 */
	public function getStreet2() {
		return $this->street2;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Gets the value of wpId.
	 *
	 * @return mixed
	 */
	public function getWpId() {
		return $this->wpId;
	}

	/**
	 * Sets the value of wpId.
	 *
	 * @param mixed $wpId the wp id
	 *
	 * @return self
	 */
	public function setWpId($wpId) {
		$this->wpId = $wpId;

		return $this;
	}

	public function createUserFromSS($accountInfo) {

		$this->code       = $accountInfo->code;
		$this->cardNumber = $accountInfo->card_number;
		$this->firstName  = $accountInfo->first_name;
		$this->lastName   = $accountInfo->last_name;
		$this->phone      = $accountInfo->phone;
		$this->email      = $accountInfo->email;
		$this->street1    = $accountInfo->street1;
		$this->street2    = $accountInfo->street2;
		$this->city       = $accountInfo->city;
		$this->state      = $accountInfo->state;
		$this->postalCode = $accountInfo->postal_code;
		$this->country    = $accountInfo->country;

	}

	public function createUserFromWP($metaUser) {
		$this->code      = $metaUser['nickname'][0];
		$this->firstName = $metaUser['first_name'][0];
		$this->lastName  = $metaUser['last_name'][0];
	}

	public function isEmpty() {
		if (!empty($this->code)) {
			return false;
		}
		return true;
	}

	/**
	 * Gets the value of code.
	 *
	 * @return mixed
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * Sets the value of code.
	 *
	 * @param mixed $code the code
	 *
	 * @return self
	 */
	public function setCode($code) {
		$this->code = $code;

		return $this;
	}
}
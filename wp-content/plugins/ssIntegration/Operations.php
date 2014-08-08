<?php

namespace Operations;

require_once "Request/Request/Request.php";
require_once "Auth.php";

use Auth\User;
use Request\Request;

class Operations {

	private static $instance;
	private $user;
	private $password;
	private $request;
	private $params;
	private $baseUrl;
	private $userInfo;
	private $isLogged;

	const POST          = "POST";
	const SUCCESS       = "success";
	const VALIDATE_USER = "validate_customer_password";
	const FIND_USER     = "customer_search";
	const BALANCE       = "customer_balance";
	const CAMPAIGNS     = "campaigns_list";
	const SS_CATEGORY   = "sticky-street";

	function __construct() {
		$this->request                 = new Request();
		$this->params['output']        = $this->request->config['StickyStreet']['output'];
		$this->params['account_id']    = $this->request->config['StickyStreet']['account_id'];
		$this->params['user_id']       = $this->request->config['StickyStreet']['user_id'];
		$this->params['user_password'] = $this->request->config['StickyStreet']['user_password'];

		$this->baseUrl  = $this->request->config['StickyStreet']['url'];
		$this->user     = new User();
		$this->isLogged = false;
	}

	public function login() {
		if (empty($this->user) && (empty($this->password))) {
			return false;
		}
		$params = $this->params;

		if ($this->isUsernameType()) {
			$params['card_number'] = $this->user->getCardNumber();
		} else {
			$this->user->setCardNumber($this->user->getUsername());
			$params['card_number'] = $this->user->getCardNumber();
		}

		$params['type'] = self::VALIDATE_USER;
		$response       = $this->request->sendRequest(self::POST, $this->baseUrl, $params);

		if ($response->status != self::SUCCESS) {
			//$this->user = new User();
			return false;
		}

		$this->isLogged = true;
		return true;
	}

	private function isUsernameType() {
		$params                      = $this->params;
		$params['type']              = self::FIND_USER;
		$params['customer_username'] = $this->user->getUsername();
		$response                    = $this->request->sendRequest(self::POST, $this->baseUrl, $params);

		if ($response->status == self::SUCCESS) {
			$customer   = $response->customers[0];
			$cardNumber = $this->user->getCardNumber();

			if (empty($cardNumber)) {
				$this->user->setCardNumber($customer->card_number);
				$this->user->createUserFromSS($customer);
			}

			return true;
		}
		return false;

	}

	/**
	 * @param mixed $user
	 */
	public function setUsername($user) {
		$this->user->setUsername($user);
		$this->params['username'] = $user;
	}

	/**
	 * @return mixed
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password) {
		$this->user->setPassword($password);
		$this->params['customer_password'] = $password;
	}

	/**
	 * @return mixed
	 */
	public function getUserInfo() {
		return $this->userInfo;
	}

	public static function getSingleton() {
		if (!self::$instance instanceof self) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * @return mixed
	 */
	public function getIsLogged() {
		return $this->isLogged;
	}

	public function logout() {
		$_SESSION['isLogged'] = false;
	}

	public function getBalance() {
		$campaigns = $this->getCampaigns();

		if (count($campaigns) <= 0) {
			return NULL;
		}

		$params         = $this->params;
		$params["type"] = self::BALANCE;
		$params["code"] = $this->user->getCode();

		foreach ($campaigns as $campaign) {
			$params["campaign_id"] = $campaign->id;
			$response              = $this->request->sendRequest(self::POST, $this->baseUrl, $params);

			$balance = array(
				"campaign"     => $campaign->name,
				"type"         => $campaign->type,
				"balance"      => $response->campaign->customer->balance,
				"transactions" => $response->campaign->customer->transactions
			);
			$balances[] = $balance;
		}

		return $balances;
	}

	private function getCampaigns() {
		$params                 = $this->params;
		$params["type"]         = self::CAMPAIGNS;
		$params["user_api_key"] = $params["user_password"];

		$response = $this->request->sendRequest(self::POST, $this->baseUrl, $params);
		return $response->campaigns;
	}

}
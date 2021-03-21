<?php

class Client
{
	private $client_id;
    private $client_secret;
    private $redirect_uri;
    private $accessToken;
    private $refreshToken;

    private $base_url= "https://api.accounting.sage.com/v3.1/";
    private $auth_url = "https://www.sageone.com/oauth2/auth/central?filter=apiv3.1";
    private $token_url= "https://oauth.accounting.sage.com/token";
    private $scope = "full_access";

    public function __construct($client_id, $client_secret, $redirect_uri)
    {
		$this->client_id = $client_id;
		$this->client_secret = $client_secret;
		$this->redirect_uri = $redirect_uri;		
    }
	
	/* POST request to exchange the authorization code for an access_token */
	public function getInitialAccessToken($code){	
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => "client_id=$this->client_id&client_secret=$this->client_secret&code=$code&grant_type=authorization_code&redirect_uri=$this->redirect_uri"
			)
		);
		$context  = stream_context_create($options);
		$token_res = json_decode(file_get_contents($this->token_url, false, $context));
		if ($token_res === FALSE) { 
			return false;
			var_dump('something went wrong'); 
		}
		$this->accessToken = $token_res->access_token;
		$this->refreshToken = $token_res->refresh_token;
		
		session_start();
		$_SESSION['auth'] = $token_res->access_token;
		
		return true;
	}
	
	public function renewAccessToken() {
		$refresh_options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => "client_id=$this->client_id&client_secret=$this->client_secret&grant_type=refresh_token&refresh_token=$this->refreshToken"
		    )
		);
		$refresh_context  = stream_context_create($refresh_options);
		$refresh_token_res = json_decode(file_get_contents($this->token_url, false, $refresh_context));
		if ($refresh_token_res === FALSE) { echo('something went wrong'); }

		//var_dump($refresh_token_res->access_token);
		return true;
	}
		
}
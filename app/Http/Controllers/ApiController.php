<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * ApiController constructor.
     * @param Client $client
     */
    public function __construct()
    {
        // variable for the main url
        $this->url = 'https://mcstaging.sastodeal.com/';

        // variable for the guzzle client
        $this->client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $url    = $this->url . 'rest/V1/integration/admin/token';
        $token  = $this->client->request('POST', $url, [
            'body' => json_encode([
                'username' => 'kripal@sastodeal.com',
                'password' => 'b3rsrbPQ'
            ])
        ]);
        $status = $token->getStatusCode();

        // check for the status of the request
        if ($status == 200)
        {
            // variable for the token
            $this->token = json_decode($token->getBody()->getContents());
        }
    }

    /**
     *
     */
    public function productSearch()
    {
        $params['direction']           = 'searchCriteria[sortOrders][0][direction]=DESC';
        $params['condition_type']      = 'searchCriteria[filter_groups][0][filters][0][condition_type]=like';
        $params['value']               = 'searchCriteria[filter_groups][0][filters][0][value]=%mobile%';
        $params['filter_groups_field'] = 'searchCriteria[filter_groups][0][filters][0][field]=name';
        $params['sort_orders_field']   = 'searchCriteria[sortOrders][0][field]=created_at';

        $url = $this->url . "rest/V1/products?searchCriteria[filter_groups][0][filters][0][field]=name&searchCriteria[filter_groups][0][filters][0][value]=%dog%&searchCriteria[filter_groups][0][filters][0][condition_type]=like&searchCriteria[sortOrders][0][field]=created_at&searchCriteria[pageSize]=10&searchCriteria[currentPage]=1";

        if (isset($this->token))
        {
            $product = $this->client->request('GET', $url, [
                'headers' => [
                    "Authorization: Bearer " . $this->token,
                ]
            ]);
            $status  = $product->getStatusCode();
            $content = json_decode($product->getBody()->getContents());
            dd($content);
        }
        else
        {
            return "error";
        }

    }
}

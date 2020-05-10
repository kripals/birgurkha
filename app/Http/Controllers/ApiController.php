<?php

namespace App\Http\Controllers;

use App\Models\Local;
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
     * @param Request $request
     * @return string
     */
    public function productSearch(Request $request)
    {
        $params['direction']           = 'searchCriteria[sortOrders][0][direction]=DESC';
        $params['condition_type']      = 'searchCriteria[filter_groups][0][filters][0][condition_type]=like';
        $params['value']               = 'searchCriteria[filter_groups][0][filters][0][value]=%' . $request->value . '%';
        $params['filter_groups_field'] = 'searchCriteria[filter_groups][0][filters][0][field]=name';
        $params['sort_orders_field']   = 'searchCriteria[sortOrders][0][field]=created_at';

        $url = $this->url . "rest/V1/products?" .
            $params['direction'] . '&' .
            $params['condition_type'] . '&' .
            $params['value'] . '&' .
            $params['filter_groups_field'] . '&' .
            $params['sort_orders_field'];

        if (isset($this->token))
        {
            $product = $this->client->request('GET', $url, [
                'headers' => [
                    "Authorization: Bearer " . $this->token,
                ]
            ]);

            $status = $product->getStatusCode();
            if ($status == 200)
            {
                $content = json_decode($product->getBody()->getContents());

                return view('products', compact('content'));
            }
            else
            {
                return "error";
            }
        }
        else
        {
            return "error";
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function categoriesSearch(Request $request)
    {
        $params['direction']           = 'searchCriteria[sortOrders][0][direction]=DESC';
        $params['condition_type']      = 'searchCriteria[filter_groups][0][filters][0][condition_type]=like';
        $params['value']               = 'searchCriteria[filter_groups][0][filters][0][value]=%' . $request->value . '%';
        $params['filter_groups_field'] = 'searchCriteria[filter_groups][0][filters][0][field]=name';
        $params['sort_orders_field']   = 'searchCriteria[sortOrders][0][field]=created_at';

        $url = $this->url . "rest/V1/categories/list?" .
            $params['direction'] . '&' .
            $params['condition_type'] . '&' .
            $params['value'] . '&' .
            $params['filter_groups_field'] . '&' .
            $params['sort_orders_field'];

        if (isset($this->token))
        {
            $product = $this->client->request('GET', $url, [
                'headers' => [
                    "Authorization: Bearer " . $this->token,
                ]
            ]);

            $status = $product->getStatusCode();
            if ($status == 200)
            {
                $content = json_decode($product->getBody()->getContents());

                return view('categories', compact('content'));
            }
            else
            {
                return "error";
            }
        }
        else
        {
            return "error";
        }
    }

    /**
     * @return mixed
     */
    public function slidersApi()
    {
        $sliders = Local::where('type', 'SLIDER')->get();

        return $sliders;
    }

    /**
     * @return mixed
     */
    public function categoryApi()
    {
        $category = Local::where('type', 'CATEGORY')->get();

        return $category;
    }

    /**
     * @return mixed
     */
    public function productApi()
    {
        $product = Local::where('type', 'PRODUCT')->get();

        return $product;
    }
}

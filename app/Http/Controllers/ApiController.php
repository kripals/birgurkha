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

        $url = $this->url . "rest/V1/products?" . $params['direction'] . '&' . $params['condition_type'] . '&' . $params['value'] . '&' . $params['filter_groups_field'] . '&' . $params['sort_orders_field'];

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

        $url = $this->url . "rest/V1/categories/list?" . $params['direction'] . '&' . $params['condition_type'] . '&' . $params['value'] . '&' . $params['filter_groups_field'] . '&' . $params['sort_orders_field'];

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function cmsPagesSearch(Request $request)
    {
        $url    = $this->url . "graphql";
        $search = $request->search;

        if (isset($this->token))
        {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL            => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "POST",
                CURLOPT_POSTFIELDS     => "{\"query\":\"{\\r\\n  cmsPage(identifier: \\\"$search\\\") {\\r\\n    url_key\\r\\n    title\\r\\n    content\\r\\n    content_heading\\r\\n    page_layout\\r\\n    meta_title\\r\\n    meta_description\\r\\n    meta_keywords\\r\\n  }\\r\\n}\",\"variables\":{}}",
                CURLOPT_HTTPHEADER     => [
                    "Content-Type: application/json",
                    "Authorization: Bearer " . $this->token
                ],
            ]);

            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response, true);

            if (array_key_exists('data', $data))
            {
                $content = $data['data']['cmsPage'];

                return view('cmsPages', compact('content'));
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
    public function local()
    {
        $local = Local::with('image')->get();

        return $local;
    }
}

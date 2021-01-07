<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\LandingPageEntity;
use App\Models\Local;
use App\Models\Type;
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
        $this->url = 'https://sastodeal.com/';

        // variable for the guzzle client
        $this->client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $url    = $this->url . 'rest/V1/integration/admin/token';
        $token  = $this->client->request('POST', $url, [
            'body' => json_encode([
                'username' => 'mobileapplication@sastodeal.com',
                'password' => 'S!^MST"{cu+k{{6z'
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function productSearch(Request $request)
    {
        $url    = $this->url . "graphql";
        $search = str_replace('. " .', '', $request->value);

        if (isset($this->token))
        {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL            => "$url",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "POST",
                CURLOPT_POSTFIELDS     => '{"query":"{\\r\\n    products (\\r\\n        search: \\"Flipkart Smartbuy Double Bed Box Mosquito Net\\", \\r\\n        pageSize: 20\\r\\n    )\\r\\n    {\\r\\n        aggregations {\\r\\n            attribute_code\\r\\n            label\\r\\n            options {\\r\\n                label\\r\\n                value\\r\\n            }\\r\\n        }\\r\\n\\r\\n        total_count\\r\\n        items {\\r\\n            id\\r\\n            name\\r\\n            sku    \\r\\n            media_gallery {\\r\\n            url\\r\\n            ... on ProductVideo {\\r\\n                video_content {\\r\\n                video_provider\\r\\n                video_url\\r\\n                }\\r\\n            }\\r\\n            }\\r\\n        }\\r\\n    }\\r\\n}\\r\\n","variables":{}}',
                CURLOPT_HTTPHEADER     => [
                    "Authorization: Bearer kesndsasbp4ldlgj9wnohdo1w86wrwuf",
                    "Content-Type: application/json",
                    "Cookie: __cfduid=d484cefcc12ce3923a0e3b347fff9be581594879126; PHPSESSID=53s2iaq6b0d645asiqpol38vsk; private_content_version=377dd824ac2834fa07c5d9c9dc4e1217"
                ],
            ]);

            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response, true);

            if (array_key_exists('data', $data))
            {
                $content          = $data['data']['products'];
                $content['value'] = $search;

                if ($request->search_aggregation)
                {
                    $content['is_product'] = false;
                }
                else
                {
                    $content['is_product'] = true;
                }

                if ($request->is_cms)
                {
                    return view('landing_page.entities.products', compact('content'));
                }
                else
                {
                    return view('products', compact('content'));
                }
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
        $url    = $this->url . "graphql";
        $search = $request->value;

        if (isset($this->token))
        {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL            => "$url",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "POST",
                CURLOPT_POSTFIELDS     => "{\"query\":\"{\\r\\n  categoryList(filters: \\r\\n  {\\r\\n    name: { match: \\\"$search\\\" }\\r\\n    }\\r\\n  )\\r\\n  {\\r\\n    id\\r\\n    level\\r\\n    name\\r\\n  }\\r\\n}\",\"variables\":{}}",
                CURLOPT_HTTPHEADER     => [
                    "Authorization: Bearer kesndsasbp4ldlgj9wnohdo1w86wrwuf",
                    "Content-Type: application/json",
                    "Cookie: __cfduid=d484cefcc12ce3923a0e3b347fff9be581594879126; PHPSESSID=53s2iaq6b0d645asiqpol38vsk; private_content_version=27dd2dc5f95771231f156fbd4e0ff4ba"
                ],
            ]);

            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response, true);

            if (array_key_exists('data', $data))
            {
                $content = $data['data']['categoryList'];

                if ($request->is_cms)
                {
                    return view('landing_page.entities.categories', compact('content'));
                }
                else
                {
                    return view('categories', compact('content'));
                }
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
        $arrayData = [];
        $types     = Type::orderBy('position', 'asc')->where('visible', 1)->with('image')->get()->toArray();

        foreach ($types as $keyT => $type)
        {
            $arrayLocal['data'] = [];
            $arrayType          = [];

            $arrayType = [
                "name"                => $type['name'],
                "position"            => $type['position'],
                "type"                => $type['type'],
                "start_date"          => $type['start_date'],
                "end_date"            => $type['end_date'],
                "after_start_phrase"  => $type['add_on_words'],
                "before_start_phrase" => $type['before_start_phrase'],
                "add_on_words"        => $type['add_on_words'],
                "view_all_buttons"    => $type['view_all_buttons'],
                "background_color"    => $type['background_color'],
                "button_type"         => $type['entity_type'],
                "button_id"           => $type['entity_id'],
                'image_path'          => ( $type['image'] != null ) ? $type['image']['url_path'] : null,
            ];
            $locals    = Local::orderBy('position', 'asc')->where('type_id', $type['id'])->with('images')->get()->toArray();

            foreach ($locals as $keyL => $local)
            {
                if ($local['image'] != null) {
                    $image = $local['image'];
                }
                elseif ($local['images'])
                {
                    $image = $local['image']['url_path'];
                }
                else {
                    $image = null;
                }

                $arrayLocal['data'][] = [
                    'type'             => 'local',
                    'entity_id'        => $local['entity_id'],
                    'magento_type'     => $local['magento_type'],
                    'name'             => $local['name'],
                    'position'         => $local['position'],
                    'image_path'       => $image,
                    'category_color'   => $local['category_color'],
                    'description_text' => $local['description_text'],
                ];
            }
            $landingPages = LandingPage::orderBy('created_at', 'asc')->where('visible', 1)->where('type_id', $type['id'])->with('image')->get()->toArray();

            foreach ($landingPages as $keyLP => $landing_page)
            {
                $arrayLocal['data'][] = [
                    'landing_page_id' => $landing_page['id'],
                    'type'            => 'landing_page',
                    'title'           => $landing_page['title'],
                    'position'        => 0,
                    'urlkey'          => $landing_page['urlkey'],
                    'visible'         => $landing_page['visible'],
                    'image_path'      => ( $landing_page['image'] != null ) ? $landing_page['image']['url_path'] : null,
                ];
            }

            $arrayData[] = $arrayType + $arrayLocal;
        }

        return $arrayData;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function landingPage(Request $request)
    {
        $landingPageId   = $request->landing_page_id;
        $landingPage     = LandingPage::where('id', $landingPageId)->first();
        $landingPageData = [
            'title'  => $landingPage['title'],
            'urlkey' => $landingPage['urlkey']
        ];

        if ($landingPage->landingPagesEntites()->exists())
        {
            $landingPagesEntities = $landingPage->landingPagesEntites->sortBy('type_id')->sortBy('position');

            foreach ($landingPagesEntities as $key => $landingPagesEntity)
            {
                $type_id = $landingPagesEntity->type_id;

                $data[ $type_id ] = [
                    "section"  => $landingPagesEntity->type->section,
                    "name"     => $landingPagesEntity->type->name,
                    "position" => $landingPagesEntity->type->position,
                    "type"     => $landingPagesEntity->type->type
                ];

                $data1[ $type_id ][] = [
                    'entity_id'        => $landingPagesEntity->entity_id,
                    'magento_type'     => $landingPagesEntity->magento_type,
                    'name'             => $landingPagesEntity->name,
                    'position'         => $landingPagesEntity->position,
                    'image_path'       => ( $landingPagesEntity->image != null ) ? $landingPagesEntity->image['url_path'] : null,
                    'description_text' => $landingPagesEntity->description_text,
                ];
            }

            foreach ($data1 as $key => $value)
            {
                $data [ $key ]['data'] = $value;
            }

            $landingPageData['sections'] = $data;

            foreach ($landingPageData['sections'] as $key => $value)
            {
                $data2[] = $value;
                unset($landingPageData['sections'][ $key ]);
            }
            unset($landingPageData['sections']);
            $landingPageData['sections'] = $data2;

            return $landingPageData;
        }

        return json_encode([ "error" => "404"]);
    }
}

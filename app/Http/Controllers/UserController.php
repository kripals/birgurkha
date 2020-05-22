<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function array()
    {
        $data = json_decode(file_get_contents('5A4zFSHx.json'));

        $addressArray = [];
        foreach ($data as $key => $value)
        {
            if ($key == 'province')
            {
                foreach ($value as $pKey => $pValue)
                {
                    $addressArray['province'][ $pValue->code ]['region_id']                                                               = $pValue->code;
                    $addressArray['province'][ $pValue->code ]['code']                                                                    = $pValue->code;
                    $addressArray['province'][ $pValue->code ]['name']                                                                    = $pValue->code;
                    $addressArray['province'][ $pValue->code ]['districts'][ $pValue->city ]['name']                                    = $pValue->city;
                    $addressArray['province'][ $pValue->code ]['districts'][ $pValue->city ]['regions'][ $pValue->area ]['name']      = $pValue->area;
                    $addressArray['province'][ $pValue->code ]['districts'][ $pValue->city ]['regions'][ $pValue->area ]['post_code'] = $pValue->pincode;
                }
            }
            else
            {
                $addressArray[ $key ] = $value;
            }
        }

        foreach ($addressArray['province'] as $keyp => $valuep)
        {
            foreach ($valuep['districts'] as $keyd => $valued)
            {
                foreach ($valued['regions'] as $keyr => $valuer)
                {
                    $valued ['regions'][] = $valuer;
                    unset($valued['regions'][ $keyr ]);
                }
                $valuep ['districts'][] = $valued;
                unset($valuep['districts'][ $keyd ]);
            }
            $addressArray ['province'][] = $valuep;
            unset($addressArray['province'][ $keyp ]);
        }
    }
}

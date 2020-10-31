<?php

namespace App\Http\Controllers\API;

class ResponseFormatter
{
  protected static $response = [
    'meta' => [
      'code' => 200,
      'status' => 'success',
      'message' => null
    ],
    'data' => null
  ];

  public static function success($data = null, $message = null)
  {
    self::$response['meta']['message'] = $message; //menyimpan 
    self::$response['data'] = $data;

    return response()->json(self::$response, self::$response['meta']['code']);
  }

  public static function error($data = null, $message = null, $code = 400)
  {
    self::$response['meta']['status'] = 'error';
    self::$response['meta']['code'] = $code;
    self::$response['meta']['message'] = $message;
    self::$response['data'] = $data;

    return response()->json(self::$response, self::$response['meta']['code']);
  }

}

// Static Jika kita mendeklarasikan function atau 
// variable sebagai static berarti kita tidak perlu membuat 
// instance untuk mengakses function atau variable tersebut.
//  Sebagai contoh bisa diakses dengan Klas::fungsiKu(); 
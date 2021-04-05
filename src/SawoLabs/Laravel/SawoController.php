<?php

namespace SawoLabs\Laravel;

use Illuminate\Http\Request;

class SawoController
{
    /**
     * [index description].
     *
     * @param Request $request [description]
     *
     * @return [type] [description]
     */
    public function index(Request $request)
    {
        return Sawo::view();
    }

    /**
     * [verify description].
     *
     * @param Request $request [description]
     *
     * @return [type] [description]
     */
    public function verify(Request $request)
    {
        $verified = Sawo::validateToken($request->user_id, $request->verification_token);

        if ($verified) {
            return response()->json([
                'message' => 'Verification successful',
                'verified' => $verified,
            ]);
        } else {
            return response()->json([
                'message' => 'Verification failed',
            ], 400);
        }
    }
}

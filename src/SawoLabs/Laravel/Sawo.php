<?php
namespace SawoLabs\Laravel;
use Illuminate\Support\Facades\Http;

class Sawo
{
    /**
     * Load HTML view for auth form.
     */
    public static function view()
    {
        return view('sawo::auth');
    }

    /**
     * Validate if token is valid with respect to Identifier.
     *
     * @param string $user_id Identifier from Sawo
     * @param string $token   One Time Token from Sawo
     *
     * @return bool if user was authenticated successfully
     */
    public static function validateToken(string $user_id, string $token): bool
    {
        $response = Http::post('https://api.sawolabs.com/api/v1/userverify/', [
            'user_id' => $user_id,
            'verification_token' => $token
        ]);
        $response_data = $response->json();

        if (200 != $response->status()) {
            return false;
        }

        return ($response_data['user_valid'] == true) ? true : false;
    }
}

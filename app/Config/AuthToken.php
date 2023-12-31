<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthToken as ShieldAuthToken;

/**
 * Configuration for Token Auth and HMAC Auth
 */
class AuthToken extends ShieldAuthToken
{
    /**
     * --------------------------------------------------------------------
     * Record Login Attempts for Token Auth and HMAC Auth
     * --------------------------------------------------------------------
     * Specify which login attempts are recorded in the database.
     *
     * Valid values are:
     * - Auth::RECORD_LOGIN_ATTEMPT_NONE
     * - Auth::RECORD_LOGIN_ATTEMPT_FAILURE
     * - Auth::RECORD_LOGIN_ATTEMPT_ALL
     */
    public int $recordLoginAttempt = Auth::RECORD_LOGIN_ATTEMPT_FAILURE;

    /**
     * --------------------------------------------------------------------
     * HMAC secret key byte size
     * --------------------------------------------------------------------
     * Specify in integer the desired byte size of the
     * HMAC SHA256 byte size
     */
    public int $hmacSecretKeyByteSize = 32;
}

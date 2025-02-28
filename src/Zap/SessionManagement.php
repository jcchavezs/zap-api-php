<?php
/**
 * Zed Attack Proxy (ZAP) and its related class files.
 *
 * ZAP is an HTTP/HTTPS proxy for assessing web application security.
 *
 * Copyright 2022 the ZAP development team
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on
 * an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 */


namespace Zap;

/**
 * This file was automatically generated.
 */
class SessionManagement
{
    private Zap $zap;

    public function __construct(Zap $zap)
    {
        $this->zap = $zap;
    }

    /**
     * Gets the name of the session management methods.
     */
    public function getSupportedSessionManagementMethods(string $apikey = '')
    {
        return $this->zap->request($this->zap->base . 'sessionManagement/view/getSupportedSessionManagementMethods/', [
            'apikey' => $apikey,
        ])->getSupportedSessionManagementMethods ?? null;
    }

    /**
     * Gets the configuration parameters for the session management method with the given name.
     */
    public function getSessionManagementMethodConfigParams($methodname, string $apikey = '')
    {
        return $this->zap->request(
            $this->zap->base . 'sessionManagement/view/getSessionManagementMethodConfigParams/',
            [
                'methodName' => $methodname,
                'apikey' => $apikey,
            ]
        )->getSessionManagementMethodConfigParams ?? null;
    }

    /**
     * Gets the name of the session management method for the context with the given ID.
     */
    public function getSessionManagementMethod($contextid, string $apikey = '')
    {
        return $this->zap->request($this->zap->base . 'sessionManagement/view/getSessionManagementMethod/', [
            'contextId' => $contextid,
            'apikey' => $apikey,
        ])->getSessionManagementMethod ?? null;
    }

    /**
     * Sets the session management method for the context with the given ID.
     */
    public function setSessionManagementMethod($contextid, $methodname, $methodconfigparams = null, string $apikey = '')
    {
        $params = [
            'contextId' => $contextid,
            'methodName' => $methodname,
            'apikey' => $apikey,
        ];
        if ($methodconfigparams !== null) {
            $params['methodConfigParams'] = $methodconfigparams;
        }
        return $this->zap->request($this->zap->base . 'sessionManagement/action/setSessionManagementMethod/', $params);
    }
}

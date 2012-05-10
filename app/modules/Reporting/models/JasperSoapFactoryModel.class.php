<?php

class Reporting_JasperSoapFactoryModel extends JasperConfigBaseModel implements AgaviISingletonModel {

    const SERVICE_SCHEDULER        = 'ReportScheduler';
    const SERVICE_PERMISSIONS      = 'PermissionsManagementService';
    const SERVICE_USER             = 'UserAndRoleManagementService';
    const SERVICE_REPOSITORY       = 'repository';
    const SERVICE_ADMIN            = 'AdminService';
    const SERVICE_VERSION          = 'Version';

    private $clients               = array();

    public function initialize(AgaviContext $context, array $parameters = array()) {
        parent::initialize($context, $parameters);
    }

    protected function wrapWsdl($service_name) {
        return sprintf('%s/services/%s?wsdl', $this->getParameter('jasper_url'), $service_name);
    }

    /**
     * Creates a configured SOAP client
     * @param string $url
     * @param array $additional_options
     * @return SoapClient
     */
    protected function getSoapClient($wsdl, array $additional_options=array()) {
        if (!isset($this->clients[$wsdl]) || !$this->clients[$wsdl] instanceof SoapClient) {
            
            $this->testWsdl($wsdl);
            
            $options = array(
                           'cache_wsdl'    => WSDL_CACHE_NONE,
                           'trace'         => true,
                           'exceptions'    => true
                       );

            if ($this->getParameter('jasper_user') !== null) {
                $options['login'] = $this->getParameter('jasper_user');
            }

            if ($this->getParameter('jasper_pass') !== null) {
                $options['password'] = $this->getParameter('jasper_pass');
            }
            
            $this->clients[$wsdl] = new JasperSoapMultipartClient($wsdl, $options);
        }

        return $this->clients[$wsdl];
    }
    
    /**
     * Tests the SOCKET connection to jasper
     * (This is small hack because I can not catch/supress constructor
     * created PHP FATAL ERRORS (which occurs as AppKit Exceptions))
     * @param string $wsdl
     * @throws Reporting_JasperSoapFactoryModelExceltion
     * @return boolean true on success
     */
    protected function testWsdl($wsdl) {
        $parts = parse_url($wsdl);
        $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $test = @socket_connect($sock, $parts['host'], $parts['port']);
        socket_close($sock);
        if ($test) {
            return true;
        } else {
            throw new Reporting_JasperSoapFactoryModelExceltion(null, 'Could not connect to server');
        }
    }

    /**
     * Just a wrapper to get the configured client for a Jasper service name (class constants)
     * @param string $service_name
     * @return SoapClient
     */
    public function getSoapClientForWSDL($service_name) {
        return $this->getSoapClient($this->wrapWsdl($service_name));
    }

    /**
     * Checks if we can use the jasper server at the soap side
     * @return boolean true response
     */
    public function pingServer() {
        try {
            $client = $this->getSoapClientForWSDL(self::SERVICE_VERSION);
            $response = $client->getVersion();

        } catch (Exception $e) {
            $response = '';
        }

        return (preg_match('/^apache axis[^\d]+\d+\.\d+/i', $response)) ? true : false;
    }

}

class Reporting_JasperSoapFactoryModelExceltion extends SoapFault {}

?>
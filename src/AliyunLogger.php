<?php

namespace Paulversion\AliyunSls;

class AliyunLogger
{
    private $logger;


    /**
     * Create a logger and boot.
     *
     * @param string $logstore
     * @return $this
     * @throws \Exception
     */
    public function logger(string $logstore = '')
    {
        $endpoint      = config('aliyunsls.endpoint');
        $access_key    = config('aliyunsls.access_key');
        $access_secret = config('aliyunsls.access_secret');
        $project       = config('aliyunsls.project');
        $logstore      = $logstore ?: config('aliyunsls.default_logstore');

        try {
            $registry_key = 'aliyun_sls_logger';
            if (Registry::isExist($registry_key)) {
                $this->logger = Registry::get($registry_key);
            } else {
                $client       = new \Aliyun_Log_Client($endpoint, $access_key, $access_secret);
                $this->logger = \Aliyun_Log_LoggerFactory::getLogger($client, $project, $logstore);
                Registry::set($registry_key, $this->logger);
            }
            return $this;
        } catch (Exception $exception) {
            //write laravel.log
        }

        return $this;
    }


    /**
     * Write a log of the 'info' level.
     *
     * @param string $title
     * @param array $context
     * @return bool
     */
    public function infoArray(string $title, array $context = [])
    {
        try {
            $this->logger();
            $context['title'] = $title;
            $this->logger->infoArray($context);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }

    /**
     * Write a log of the 'warning' level.
     *
     * @param string $title
     * @param array $context
     * @return bool
     */
    public function warningArray(string $title, array $context = [])
    {
        try {
            $this->logger();
            $context['title'] = $title;
            $this->logger->warnArray($context);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }

    /**
     * Write a log of the 'error' level.
     *
     * @param string $title
     * @param array $context
     * @return bool
     */
    public function errorArray(string $title, array $context = [])
    {
        try {
            $this->logger();
            $context['title'] = $title;
            $this->logger->errorArray($context);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }

    /**
     * Write a log of the 'debug' level.
     *
     * @param string $title
     * @param array $context
     * @return bool
     */
    public function debugArray(string $title, array $context = [])
    {
        try {
            $this->logger();
            $context['title'] = $title;
            $this->logger->debugArray($context);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }



    /**
     * Write a log of the 'info' level.
     *
     * @param string $logMessage
     * @return bool
     */
    public function info(string $logMessage)
    {
        try {
            $this->logger();
            $this->logger->info($logMessage);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }

    /**
     * Write a log of the 'warning' level.
     *
     * @param string $logMessage
     * @return bool
     */
    public function warning(string $logMessage)
    {
        try {
            $this->logger();;
            $this->logger->warn($logMessage);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }

    /**
     * Write a log of the 'error' level.
     *
     * @param string $logMessage
     * @return bool
     */
    public function error(string $logMessage)
    {
        try {
            $this->logger();
            $this->logger->error($logMessage);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }

    /**
     * Write a log of the 'debug' level.
     *
     * @param string $logMessage
     * @return bool
     */
    public function debug(string $logMessage)
    {
        try {
            $this->logger();
            $this->logger->debug($logMessage);
        } catch (Exception $exception) {
            //..laravel.log
        }
        return true;
    }





}

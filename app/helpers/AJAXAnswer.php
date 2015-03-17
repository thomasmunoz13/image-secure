<?php
/**
 * Created by PhpStorm.
 * User: thomasmunoz
 * Date: 03/03/15
 * Time: 00:35
 */

namespace app\helpers;

/**
 * Class AJAXAnswer
 * @package app\helpers
 */
class AJAXAnswer
{
    /**
     * Success of the AJAX answer
     * @var bool
     */
    private $success = false;

    /**
     * Message of the AJAX answer
     * @var string
     */
    private $message;

    /**
     * @param bool $success
     * @param string $message
     */
    public function __construct($success = false, $message = "")
    {
        $this->success = $success;
        $this->message = $message;
    }

    /**
     * Setter for success
     * @param $success
     */
    public function setSuccess($success) { $this->success = $success; }
    /**
     * Setter for message
     * @param $message
     */
    public function setMessage($message) { $this->message = $message; }

    /**
     * Getter for success
     * @return bool
     */
    public function getSuccess() { return $this->success; }

    /**
     * Display the json response
     * @param bool $file
     */
    public function answer($file = false)
    {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Wed, 09 Nov 1994 15:45:00 GMT');
        header('Content-type: application/json');

        $message = new \stdClass();
        $message->success = $this->success;
        $message->message = $this->message;
        $message = json_encode($message, JSON_UNESCAPED_SLASHES);

        if($file){
            header("Content-Length: " . strlen($message));
        }
        echo $message;
    }
}
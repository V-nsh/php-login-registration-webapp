<?php
include_once('class.stream.php');
session_start();
function route($route, $path_to_include)
{
    $ROOT = ROOT;
    if ($route == "/404") {
        include_once("$ROOT/$path_to_include");
        exit();
    }
    $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
    $request_url = rtrim($request_url, '/');
    $request_url = strtok($request_url, '?');
    $route_parts = explode('/', $route);
    $request_url_parts = explode('/', $request_url);
    array_shift($route_parts);
    array_shift($request_url_parts);
    if (SUBFOLDER != "") {
        array_shift($request_url_parts);
    }
    if ($route_parts[0] == '' && count($request_url_parts) == 0) {
        include_once("$ROOT/$path_to_include");
        exit();
    }
    if (count($route_parts) != count($request_url_parts)) {
        return;
    }
    $parameters = [];
    for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {
        $route_part = $route_parts[$__i__];
        if (preg_match("/^[$]/", $route_part)) {
            $route_part = ltrim($route_part, '$');
            array_push($parameters, $request_url_parts[$__i__]);
            $$route_part = urldecode($request_url_parts[$__i__]);
        } else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {
            return;
        }
    }
    include_once("$ROOT/$path_to_include");
    exit();
}
function out($text)
{
    echo htmlspecialchars($text);
}
function set_csrf(bool $value = false)
{
    if (!isset($_SESSION["csrf"])) {
        $_SESSION["csrf"] = bin2hex(random_bytes(50));
    }
    if($value){
        echo $_SESSION["csrf"];
    } else {
        echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
    }
}
function is_csrf_valid($csrf)
{
    if (!isset($_SESSION['csrf']) || !isset($csrf)) {
        return false;
    }
    if ($_SESSION['csrf'] != $csrf) {
        return false;
    }
    return true;
}
// function getData(&$_METHOD){
//     $data = array();
//     new stream($data);
//     $_METHOD = $data['post'];
//     $_FILES = $data['file'];
//     /* Handle moving the file(s) */
//     // if (count($_FILES) > 0) {
//     //     foreach($_FILES as $key => $value) {
//     //         if (!is_uploaded_file($value['tmp_name'])) {
//     //             rename($value['tmp_name'], '/path/to/uploads/'.$value['name']);
//     //         } else {
//     //             move_uploaded_file($value['tmp_name'], '/path/to/uploads/'.$value['name']);
//     //         }
//     //     }
//     // }
//     unset($data);
//     unset($value);
//     unset($key);
// }

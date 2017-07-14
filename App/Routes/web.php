<?php
use System\Router as Route;
use System\Controller;

function view(string $view, array $var = null)
{
    (new Controller())->load->view($view, $var);
}






Route::get("/", function () {
    header("Content-type:application/json");
    echo json_encode([
            "status" => 404,
            "content" => "Not found!"
        ], 128);
    die;
});
Route::post("receiver/6055e32fa0aca68460ebcc9e41c2130f/4b0416f60433598b746ee85f01aefa6790da27f9", "ltm_receiver@index");

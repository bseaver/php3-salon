<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application();
    $app['debug'] = true;

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        return $app['twig']->render(
            'stylists.html.twig',
            array(
                'isEdit' => false,
                'edit_stylist' => new Stylist,
                'stylists' => Stylist::getAll()
            )
        );
    });

    $app->post("/post/stylist", function() use ($app) {
        return 'To Do';
    });

    $app->get("/get/stylist/{id}/edit", function($id) use ($app) {
        return 'To Do';
    });

    $app->patch("/patch/stylist/{id}", function($id) use ($app) {
        return 'To Do';
    });

    $app->delete("/delete/stylist/{id}", function($id) use ($app) {
        return 'To Do';
    });

    $app->delete("/delete/stylists", function() use ($app) {
        return 'To Do';
    });

    $app->get("/get/clients/{stylist_id}", function($stylist_id) use ($app) {
        return 'To Do';
    });

    return $app;
?>

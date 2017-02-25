<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

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

    // Stylist routes

    $app->get("/", function() use ($app) {
        return $app['twig']->render('stylists.html.twig',
            array('edit_stylist' => new Stylist, 'stylists' => Stylist::getAll())
        );
    });

    $app->post("/post/stylist", function() use ($app) {
        $stylist = new Stylist($_POST['stylist_name'], $_POST['stylist_contact_info']);
        $stylist->save();

        return $app['twig']->render('stylists.html.twig',
            array('edit_stylist' => new Stylist, 'stylists' => Stylist::getAll())
        );
    });

    $app->get("/get/stylist/{id}/edit", function($id) use ($app) {
        $stylist = Stylist::findById($id);

        return $app['twig']->render('stylists.html.twig',
            array('edit_stylist' => $stylist, 'stylists' => Stylist::getAll())
        );
    });

    $app->patch("/patch/stylist/{id}", function($id) use ($app) {
        $stylist = Stylist::findById($id);
        $stylist->update($_POST['stylist_name'], $_POST['stylist_contact_info']);

        return $app['twig']->render('stylists.html.twig',
            array('edit_stylist' => new Stylist, 'stylists' => Stylist::getAll())
        );
    });

    $app->delete("/delete/stylist/{id}", function($id) use ($app) {
        $stylist = Stylist::findById($id);
        $stylist->delete();

        return $app['twig']->render('stylists.html.twig',
            array('edit_stylist' => new Stylist, 'stylists' => Stylist::getAll())
        );
    });

    $app->delete("/delete/stylists", function() use ($app) {
        Stylist::deleteAll();

        return $app['twig']->render('stylists.html.twig',
            array('edit_stylist' => new Stylist, 'stylists' => Stylist::getAll())
        );
    });

    // Client routes

    $app->get("/get/clients/{stylist_id}", function($stylist_id) use ($app) {
        $stylist = Stylist::findById($stylist_id);
        return $app['twig']->render('clients.html.twig',
            array('edit_client' => new Client, 'clients' => Client::getAll($stylist_id), 'stylist' => $stylist)
        );
    });

    $app->post("/post/client", function() use ($app) {
        $stylist_id = $_POST['client_stylist_id'];
        $stylist = Stylist::findById($stylist_id);
        $client = new Client($_POST['client_name'], $_POST['client_contact_info'], $stylist_id);
        $client->save();
        return $app['twig']->render('clients.html.twig',
            array('edit_client' => new Client, 'clients' => Client::getAll($stylist_id), 'stylist' => $stylist)
        );
    });

    $app->get("/get/client/{id}/edit", function($id) use ($app) {
        return 'To Do';
    });

    $app->delete("/delete/clients", function() use ($app) {
        return 'To Do';
    });

    $app->delete("/delete/stylist/clients/{stylist_id}", function($stylist_id) use ($app) {
        return 'To Do';
    });

    $app->patch("/patch/client/{id}", function($id) use ($app) {
        return 'To Do';
    });

    $app->delete("/delete/client/{id}", function($id) use ($app) {
        return 'To Do';
    });

    return $app;
?>

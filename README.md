LogFrontend
========
This bundle allows to log events in your backend via endpoint.

1.Download
-----------

Open a command console, enter your project directory and execute the following command:
```
$ composer require tarnawski/log-frontend
```

2.Enable the Bundle
-------------------
Enable the bundle by adding it to the list of registered bundles in the app/AppKernel.php file of your project.

```
<?php
$bundles = array(
    new LogFrontendBundle\LogFrontendBundle(),
);
```

3.Register the Routes:
---------------------
```
LogViewerBundle:
    resource: "@LogFrontendBundle/Resources/config/routing.yml"
    prefix:   /logger
```

4.Configure the Bundle:
------------------------
```
log_frontend:
    path: /dev/shm/api-backend/logs/front.log
    allow_host:
        - api-backend.dev
        - ras-backend.dev
```
If you wont allow all host:
```
log_frontend:
    path: /dev/shm/api-backend/logs/front.log
    allow_host: ~
```

You can log the events by send request with body:
```
{
    "level": "ERROR",
    "message": "Error with send email",
    "context": "The email address not valid"
}
```

Available logging levels: 
`EMERGENCY`, `ALERT`, `CRITICAL`, `ERROR`, `WARNING`, `INFO`, `NOTICE`, `DEBUG`

Example with jQuery:

```
$.post( "your-app.com/logger", { 
    "level": "ERROR",
    "message": "Error with send email",
    "context": "The email address not valid"
});
```

To nicely display log files you can use: [LogViewerBundle](https://github.com/tarnawski/log-viewer)
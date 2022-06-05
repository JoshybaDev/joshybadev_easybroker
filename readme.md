# EasyBroker for PHP
A gem that makes it easy to work with the [EasyBroker API](https://api.easybroker.com/).

- Is a copy from [EasyBroker API GEM](https://github.com/easybroker/easybroker_gem).

- Visit [More info](https://ayuda.easybroker.com/article/330-api-de-easybroker-beta).

- modify file env
- add next line
- API_KEY_EasyBroker= Use your API Key

```php
//Get all 
//Instance class with parameter
$easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
$contactosResponsePagination = $easy->client()->contact_requests()->search("");
if(!$contactosResponsePagination->error())
{
    //Return content
    return $contactosResponsePagination->content();
}
else
{
    //Return message by error
    return $contactosResponsePagination->response()["error"];
}

```
### Aplicacion en heroku para ver su uso con la version de prueba
[https://probandoeasybroker.herokuapp.com/](https://probandoeasybroker.herokuapp.com/).

## Installing JoshybaDev/EasyBroker

The recommended way to install JoshybaDev/EasyBroker is through
[Composer](https://getcomposer.org/).

```bash
composer require joshybadev/easybroker "*"
```

## License

JoshybaDev/EasyBroker is made available under the MIT License (MIT). Please see [License File](LICENSE) for more information.
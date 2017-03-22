# Laravel Integer Hashids

#### Make Integers Hashids

This package is an adaptation and combination of the following 3 packages:
- Laravel-Manager https://github.com/GrahamCampbell/Laravel-Manager
- Hashids https://github.com/ivanakimov/hashids.php
- Laravel Hashids https://github.com/vinkla/laravel-hashids

This package works like [Laravel Hashids][218ac709] but you can make integers hashids placing in alphabet connections only numbers and you can implement prefix ids.
**Also you can use encode() and decode() helpers.**
*You can also make alphanumeric Hashids*

  [218ac709]: https://github.com/vinkla/laravel-hashids "Laravel Hashids"

## Installation

### Composer require
``` bash
$ composer require amamarul/integer-hashids
```
### Add Provider into config/app.php
``` php
Amamarul\Hashids\HashidsServiceProvider::class,
```
### Publish config file
``` bash
$ php artisan vendor:publish --provider='Amamarul\Hashids\HashidsServiceProvider'
```

## Usage

1. Setup the Config file (`config/hashids.php`)
  You can create differents connections with differents parameters
  ``` php
      'default' => 'main',
      'prefix-separator' => '-',

      '<Name Connection>' => [
          'salt' => 'your-salt-string',
          'length' => '10',
          'alphabet' => '0123456789',
          'prefix' => null,
      ],
  ```
  - Name Connection: There are a 'main' connection that is used by default but you can create custom connections and then call them.
  - salt: is a phrase string.
  - length: Number of characters you need
  - alphabet: you can set any character to make the hash, but if you want integer hashid keep the same ('0123456789').
  - prefix: if you want a prefixed hashid you can add the prefix, if not you can omit it or delete the parameter.

  - prefix-separator: If you use a prefix maybe do you want to use a prefix separator. If not leave empty ('').
  - default: you can change the default connection

2. With 'main' connection and without 'prefix' (`'prefix' => null`)
  ``` php
    use Hashids;

    Hashids::encode(1548);
    // output: 7988887798

    Hashids::decode('7988887798');
    // output: 1548
  ```

3. With 'main' connection and with 'prefix' (`'prefix' => 'AA'`)
  ``` php
    use Hashids;

    Hashids::encode(1548);
    // output: AA-7988887798

    Hashids::decode('AA-7988887798');
    // output: 1548
  ```

4. With 'custom' name connection and with and without 'prefix'
  ``` php
    use Hashids;

    Hashids::connection('custom')->encode(1548);
    // output: 7988887798

    Hashids::connection('custom')->decode('7988887798');
    // output: 1548
  ```

5. If you prefer to use dependency injection over facades, you can inject the manager:
- With 'main' connection
  ``` php
    use Amamarul\Hashids\Support\HashidsManager;

    class Foo
    {
    	protected $hashids;

    	public function __construct(HashidsManager $hashids)
    	{
    		$this->hashids = $hashids;
    	}

    	public function encode($id)
    	{
    		$this->hashids->encode($id)
    	}

    	public function decode($hashid)
    	{
    		$this->hashids->decode($hashid)
    	}
    }
  ```
- With 'custom' connection
  ``` php
    use Amamarul\Hashids\Support\HashidsManager;

    class Foo
    {
    	protected $hashids;

    	public function __construct(HashidsManager $hashids)
    	{
    		$this->hashids = $hashids->connection('custom');
    	}

    	public function encode($id)
    	{
    		$this->hashids->encode($id)
    	}

    	public function decode($hashid)
    	{
    		$this->hashids->decode($hashid)
    	}
    }
  ```
## Helpers
You can use the 'encode()' and 'decode()' helpers
- encode()
``` php
  // with 'main' connection
  encode($id)
  // with 'custom' connection
  encode($id,'custom')
```
- decode()
``` php
  // with 'main' connection
  decode($hashid)
  // with 'custom' connection
  decode($hashid,'custom')
```

### Feel free to send improvements
Created by [Maru Amallo-amamarul][760a7857]

  [760a7857]: https://github.com/amamarul "https://github.com/amamarul"

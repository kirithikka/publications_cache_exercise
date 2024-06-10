## Steps:

Run the following command:
```bash
    composer install
```

Create .env file in the root of the application. Copy the contents from .env.example to .env and run the following commands:
```bash
    php artisan key:generate
    php artisan migrate
```

To start the server:
```bash
    php artisan serve
```

## Other details:
I have implemented the API in the following way:

You can access the API using '/publications/{$doi}'

where $doi can be either full or partial. The requests are first checked in the application's cache. If not found, requests are sent to CrossRef:

For full DOI, the publication is retrieved from 
https://api.crossref.org/works/{$doi}
and is cached in the application

For partial DOI, the publications are retrieved from 
https://api.crossref.org/works?query={$doi}
All the publications fetched from the above link are cached in the application

If there are no publications in the cache/crossRef, the following response is returned:
{
  "error": "Publication(s) not found"
}

I have deployed the API in the AWS EC2 which can be accessed at
http://ec2-18-218-17-250.us-east-2.compute.amazonaws.com/publications/{$doi}

Please note that currently, HTTPS is not used.


I have added my answers to followup questions in FOLLOW-UP.md
# Structured programming

This repository is an example of functional decomposition in a web application. It has been built
according to the standards defined at my personal blog (https://bitween.software/blog) and serves
as an example for that blog.

## Usage

The usage is fairly simple, first, build up the Docker container:

    $ docker-compose

Now, you have access to 2 browser pages:

- [localhost/form.html](http://localhost/form.html): The form for submitting posts
- [localhost/get.php](http://localhost/get.php): The HTML table for all the posts

### Testing

In order to test the application, issue the following command inside your Docker container:

    $ bin/test
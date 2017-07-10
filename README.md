# Website Analysis Tool

Compare the digital performance up your web site with up to three competitor web sites. Just enter the url's and click submit. Results show a variety of digital performance metrics harvested from Google

The web site legverages a RESTful api housed in the website-analysis-api repo

## Download Source

To get you started you can simply clone the repo and install the dependencies:

### Clone the repo

Clone the repository using [git][git]:

```
git clone https://github.com/toddlamothe/website-analysis-web.git
```

## Configure Web Server

### Install Dependencies

```
cd website-analysis-web
php composer.phar install
```

You should find that you have two a new folder in your project.

* `vendor` - contains the composer packages for the tools we need

### Run the Application

This project can be run using any standard web server with php support. The site was built using php 5.6.30. Simply download the code, install dependencies and browse to the project root, something like:

`http://localhost/website-analysis-web/`.


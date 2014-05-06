Small MVC PHP cinema guide (RESTful API)
========================================
This API is written in PHP using the framework Laravel 4 and MSSQL as a database.



Installation
------------
1. Donwload the project.
2. Install "composer" if necessary.
3. Update the database config file.
4. Create a database.
5. Run the following artisan command in the terminal.
   * `php artisan migrate`
   * `php artisan db:seed`


API Functionalities
-------------------

### Authentication/Authorization

#### 1. Authentication
The API use laravel basic-auth as authentication for all responds.
The user must be authenticated in orden to use the API.

The default users are:
* User 1 (the role of this user is "user"):
```shell
  user:christian 
  password:christian
```
* User 2 (the role of this user is "pacific"):
```shell
user:pacific
password:pacific
```
#### 2. Authorization
Only users with "pacific" role are allow to use the location functionality.


### Cinemas Listing
Return all cinemas (pagination is supported).

Accepts the parameter "?page={number}"

_**note:** if the parameter is missing, it returns the list of all cinemas._

examples:
```shell
  ../christian/cinemas
  ../christian/cinemas?page=1
```

### Cinemas Information
Return all cinemas base on a given name

examples:
```shell
  ../christian/cinemas/UNSW
```
### Cinema Information by date
Return all cinemas base on a given name and date.
Partial dates such as "today","yesterday" and "tomorrow" are supported,
as well as date format dd-mm-yyyy

examples:
```shell
  ../christian/unsw/today
  ../christian/unsw/08-09-2014
```

### Cinema Location
Return all cinemas with the distance between the cinema and a gps point,
base on a given gps location.
Some train station are supported as well, such as central, circular quay and bondi.

examples:
```shell
  ../christian/cinemas/location/central
  ../christian/cinemas/location/-33.9185977,151.2399935
```

### Movie Information
return all available movies base on a given movie name
examples:
```shell
  ../christian/movies/The%20Amazing%20Spider-Man
```



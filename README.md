WDIM361 - Spring 2012
=====================

Art Institute of Portland
-------------------------

### [Week 1](https://github.com/benjaminfisher/wdim361/tree/master/week1) ###

Intro to the PHP server side scripting language.

#### Topics ####
* Set Default Timezone: `date_default_timezone_set()`
* `print` and `echo`
* `include 'filename'`
* Basic **Arrays**
* **Arrays:** `foreach()`
* **Arrays:** `shuffle()`
* Creating basic **Functions**

### [Week 2](https://github.com/benjaminfisher/wdim361/tree/master/week2) ###

Creating and calling functions.

#### Topics ####
* `ini_set('display_errors', 1);`
* `if(!empty($variable)){...}`
* **Arrays:** `explode($array)`
* _in_ `_header.php` : `basename($_SERVER['PHP_SELF'])`
* _in_ `index.php` : sanitize user input: 
```PHP
strip_tags(trim($_POST['name_of_input']))
```

* _in_ `index.php` : Display errors during development `ini_set('display_errors', 1)`
* Also `error_reporting(E_ALL)`
* `switch` statements
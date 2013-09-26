walkMVC - Clean easy to read PHP MVC stack
=======


Quick Start: 
----------
1. Look at the app project under : walkMVC/tree/master/webapp/simpleDemo
2. In that folder, the main file is : access.php
3. From there, you can follow the trail of PHP file-include calls (aka "require_once")


*Server-Side MVC Structure*

Each of the top-level folders (excluding folders that start with '_') in the web app project folder - simpleDemo in this case, represent the elements of a model.  Specifically, this entails the following file naming conventions:
* map_ : Uses the phpDataMapper ORM to define table fields
* form_ : Configuration file to render HTML form of model, using jquery dform
* logic_ : Application logic specific to the model
* rest_ : The controller logic that maps urls to logic.  This is really where everything begins in terms of client/server communication.  See index.html to determine the default REST path when calling the web app root

*Client-Side MVC Structure (aka, The View Layer)*

From the app root folder, notice there is a folder /_templates .  That is where the Smarty .tpl template files are placed.

Introduction
----------

This is a PHP MVC stack that is based on two core principles:

A) Build the stack using proven open source frameworks to streamline heavy lifting.  walkMVC is organized around phpDataMapper, Smarty, slimFramework, and jquery.dform‎.  The big advantage here is that when you move to the next project that uses a different framework, there's a good chance you will get to use at least some of the components you worked with here. 

B) Build all components in a "model-centric" way

The majority of the work in any app revolves around the model.  So in this framework, instead of grouping models and controllers separately - controllers are placed in the model folder they are most closely connected with.  Granted this approach may not work for every application, but I think for many it should do the trick.



Design Patterns
----------
This structure uses the following patterns to help make navigating the code as easy as possible:

* define the model data in PHP for both the database and HTML forms

* use a centralized dispatcher with slimPHP
 * Here we have an .htaccess file that allows to take the file abc.php and make the root of the path /abc (without mention of PHP)

* instead of dividing/grouping the code across M-V-C, we group controllers and models in the same model folder

* in each model folder, we use the file name conventions (where Xyz is the model name): 
  * formcfg_Xyz.php - HTML form definition for dForm. Also, use this file for mapping request params to DB model values
  * map_Xyz.php - DB model definition
  * rest_Xyz.php - REST paths to use and the associated helper function.  It handles selecting the view to render
  * [Model controller] - for accessing the database




Example Project1: /webapps/walk_auth 
================================

See the file access.php - it is the main access point for the app.






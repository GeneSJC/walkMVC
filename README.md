walkMVC - Clean easy to read PHP MVC stack
=======

This is a PHP MVC stack that is based on two core principles:

A) Build the stack using proven open source frameworks to streamline heavy lifting.  walkMVC is organized around phpDataMapper, Smarty, slimFramework, and jquery.dform‎.  The big advantage here is that when you move to the next project that uses a different framework, there's a good chance you will get to use at least some of the components you worked with here. 

B) Build all components in a "model-centric" way

The majority of the work in any app revolves around the model.  So in this framework, instead of grouping models and controllers separately - controllers are placed in the model folder they are most closely connected with.  Granted this approach may not work for every application, but I think for many it should do the trick.



Design Patterns
----------
This structure uses the following patterns to help make navigating the code as easy as possible:
* define the model data in PHP for both the database and HTML forms
* use a centralized dispatcher with slimPHP
* instead of dividing/grouping the code across M-V-C, we group controllers and models in the same model folder
* in each model folder, we use the file name conventions (where Xyz is the model name): 
  * formcfg_Xyz.php - HTML form definition
  * map_Xyz.php - DB model definition
  * rest_Xyz.php - REST paths to use and the associated helper function

Configuration
---------------
One of the todo items is to fix hardcoded paths.  In the mean time, if you search for '/Library/WebServer/Documents/dev/', you should find all my hardcoded folders


Examples Summary
================================

Here are example /webapp projects that use the same database schema - a simple blog post (only 1 table)



Example Project1: /webapps/walk_auth 
--------------------------------

See the file access.php - it is the main access point for the app.






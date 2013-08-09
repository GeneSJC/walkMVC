walkMVC
=======

MVC stack organized around phpDataMapper, Smarty, slimFramework, and jquery.dform‎


Motivation
----------
I organized this structure because I got tired of always having to master all the ins & outs of some MVC framework every time a new project comes along.

The aim of this structure is to allow the developer to quickly define the model data in PHP:
a) DB tables with the ORM
b) The form structure with jquery.dform

Additionally, support for REST is incorporated with slim.  However, there are still some things to fix there - see todo.txt


Configuration
---------------
One of the todo items is to fix hardcoded paths.  In the mean time, if you search for '/Library/WebServer/Documents/dev/', you should find all my hardcoded folders


Example Projects
-------------------

/webapps/app1 - the main work is needed in subdirectories: /post & /_template

In /post:
* post_ctrl.php : add custom business logic
* post_mapper.php : define your DB schema mappings
* post_formcfg.php : define the form structure for the model
* post_tbl.sql : just here for refence. Use post_mapper.php to generate schema



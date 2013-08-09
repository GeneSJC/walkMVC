walkMVC
=======

MVC stack organized around phpDataMapper, Smarty, slimFramework, and jquery.dform‎


Motivation
----------
I organized this structure because I got tired of always having to master all the ins & outs of some MVC framework every time a new project comes along.

The aim of this structure is to allow the developer to quickly define the model data in PHP:
* DB tables with the ORM
* The HTML-form structure with jquery.dform

Additionally, support for REST is incorporated with slim.  However, there are still some things to fix there - see todo.txt


Configuration
---------------
One of the todo items is to fix hardcoded paths.  In the mean time, if you search for '/Library/WebServer/Documents/dev/', you should find all my hardcoded folders


Examples Summary
================================

Here are two example /webapp projects that use the same database schema - a simple blog post (only 1 table)

Example Project1: /webapps/app1 
--------------------------------

The main work is needed in subdirectories: /post & /_template

In /post:
* post_ctrl.php : add custom business logic
* post_mapper.php : define your DB schema mappings
* post_formcfg.php : define the HTML-form structure for the model
* post_tbl.sql : just here for refence. Use post_mapper.php to generate schema

In /_template:
* Here we create our smarty templates
* see ..\smarty_cfg.php for configuring your template directories


Example Project2: /webapps/slimRest_postMgr 
--------------------------------

The file structure is actually the same as ../app1, except instead of accessing post_ctrl.php directly, we have the slim_dispatcher.php at the top level of the app directory





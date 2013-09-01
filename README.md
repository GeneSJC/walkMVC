walkMVC - Clean easy to read PHP MVC stack
=======

This is a PHP MVC stack that is based on two core principles:

A) Build the stack using proven open source frameworks to streamline heavy lifting.  walkMVC is organized around phpDataMapper, Smarty, slimFramework, and jquery.dform‎.  The big advantage here is that when you move to the next project that uses a different framework, there's a good chance you will get to use at least some of the components you worked with here. 

B) Build all components in a "model-centric" way

The majority of the work in any app revolves around the model.  So in this framework, instead of grouping models and controllers separately - controllers are placed in the model folder they are most closely connected with.  Granted this approach may not work for every application, but I think for many it should do the trick.



Motivation
----------
I organized this structure as an alternative to having to relearn all the ins n outs of some MVC framework every time a new project comes along.  Furthermore, I was tired of being frusterated by what seemed like overly complicated ways to have to do things.

The aim of this structure is to allow the developer to quickly define the model data in PHP:
* DB tables with the ORM
* The HTML-form structure with jquery.dform

Additionally, support for REST is incorporated with slim.  However, there are still some things to fix there - see todo.txt


Configuration
---------------
One of the todo items is to fix hardcoded paths.  In the mean time, if you search for '/Library/WebServer/Documents/dev/', you should find all my hardcoded folders


Examples Summary
================================

Here are example /webapp projects that use the same database schema - a simple blog post (only 1 table)



Example Project1: /webapps/walk_auth 
--------------------------------

This project pulls in slimPHP, dform, and basic user login authentication using the patterns of walkMVC

See the file access.php - it is the main access point for the app.



Example Project2: /webapps/app1 
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


Example Project3: /webapps/slimRest_postMgr 
--------------------------------

The file structure is actually the same as ../app1, except instead of accessing post_ctrl.php directly, we have the slim_dispatcher.php at the top level of the app directory





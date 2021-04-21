CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Recommended modules
 ## Installation
   ### Debugging with PhpStorm (or the tool of your choice)
If you've installed PHP using homebrew, the standard port 9003 might be unavailable, so this guide uses port 9002 instead.
1. Make sure your enabled xdebug with
   ```lando xdebug debug,develop, off```
   based on https://xdebug.org/docs/all_settings#mode.
1. file with the lines: ```.lando/xdebug.sh ``` & ```php: .lando/php.ini```
1. In the custom php.ini, make sure `xdebug.start_with_request = yes`
1. Set the debug port to 9003 in Phpstorm
1. Enable the debug plugin for Chrome (click the green bug icon)
1. Click the telephone icon in PhpStorm ("Start listening for PHP Debug connections")
1. Set a breakpoint in index.php
1. Start the website in Chrome
1. The first time, Phpstorm will display a dialog entitled "Incoming Connection from Xdebug"
1. Accept the connection
1. PhpStorm will break on the line.
1. To disable xdebug runs ```lando xdebug off```
 * Configuration
 * Troubleshooting
 * FAQ
 * Maintainers

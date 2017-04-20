# php-slack-inviter-app
Slim-based self service php application for sending team invites in Slack.
Implementation is based on the [ndobromirov/php-slack-inviter](https://github.com/ndobromirov/php-slack-inviter) library.

# Requirements
 - PHP 5.5+
 - composer

# Installation 
The system is in active development. The following instructions are in no way
production-ready, but ment to. Allow you to experiment with this locally.
1. Checkout the repository in a folder
   `git clone https://github.com/ndobromirov/php-slack-inviter ~/inviter-app`
   Navigate to the newly created folder.
2. Make the runtime directory writable by the PHP process
   `chmoda a+rw ~/inviter-app/runtime -R`, so the app will be able to write logs
   and cache data.
3. Copy the *.env.sample* file in *.env* and configure the values there. Check
   library's README for instructions of what's needed and why. Sample command: 
   `cp ~/inviter-app/.env.sample ~/inviter-app/.env`.
4. Run `composer install`  to install all the needed 
5. Configure a web server's root in the public sub-folder or run `composer start`
   to trigger the PHP's development server to start on localhost:8080. The code
   support apache by default. If you have issues with configurations, consult
   with Slim 3 configuration instructions [here](https://www.slimframework.com/docs/start/web-servers.html).
6. If everything worked :D, you should be able to open the page in the browser.
   For the PHP's server case, it's `http://localhost:8080`.

# Contributions
I will be very happy to review PRs :D. There are already TODOs in the code 
(`src/routes.php`) to give some directions of what is needed to reach a state
that it can be tagged.

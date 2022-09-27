/**
* JetBrains Space Automation
* This Kotlin-script file lets you automate build activities
* For more info, see https://www.jetbrains.com/help/space/automation.html
*/

job("Prepare Dev Docker Image") {
    // do not run on git push
    startOn {
        gitPush { enabled = false }
    }

    docker {

        env["AUTOMATION_CLIENT_ID"] = Params("automation_client_id")
        env["AUTOMATION_TOKEN"] = Secrets("automation_token")

        build {
       		context = ".castor/docker"
            file = "lib/Dockerfile"
            target = "dev"
            args["COMPOSER_USER"] = "\$AUTOMATION_CLIENT_ID"
            args["COMPOSER_TOKEN"] = "\$AUTOMATION_TOKEN"
        }

       	push("castorlabs.registry.jetbrains.space/p/phposlib/images/context") {
       	    tags("dev")
       	}
    }
}

job("Quality Checks") {
    container(image = "castorlabs.registry.jetbrains.space/p/phposlib/images/context:dev") {
        shellScript {
            content = """
                composer install --no-interaction --no-progress --no-suggest --prefer-dist
                vendor/bin/php-cs-fixer fix --dry-run -vvv
                vendor/bin/psalm --stats --no-cache --show-info=true
                vendor/bin/phpunit --testdox --coverage-text
            """
        }
    }
}

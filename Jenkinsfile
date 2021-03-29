node {
    stage("composer_install") {
        sh 'composer install'
    }
    stage("php_lint") {
        sh 'find . -name "*.php" -print0 | xargs -0 -n1 php -l'
    }
    stage("phpunit") {
        sh 'vendor/bin/phpunit'
    }
}

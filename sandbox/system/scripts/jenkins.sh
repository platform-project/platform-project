#!/bin/bash
$JENKINS_KEY="https://pkg.jenkins.io/debian-stable/jenkins.io.key"

sudo -k
jenkins_key(){
    wget -q -O -  | sudo apt-key add -
}

jenkins_source(){
    # TODO: check if entry exists before adding it
    echo "deb https://pkg.jenkins.io/debian-stable binary/" >> /etc/apt/sources.list
}

jenkins_install()
{
    sudo apt-get update
    sudo apt-get install jenkins
}

jenkins_key && jenkins_source && jenkins_install
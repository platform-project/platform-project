#!/bin/bash
GITLAB_HOME="/home/git/gitlab"
sudo -k
echo "Startup GitLab"
sudo service gitlab start
echo "Startup Unicorn"
cd $GITLAB_HOME && sudo -u git -H bundle exec unicorn_rails -c config/unicorn.rb -E production -D
echo "Startup Sidekiq"
sudo -u git -H bundle exec rake sidekiq:start RAILS_ENV=production
echo "Check GitLab Status"
sudo -u git -H bundle exec rake gitlab:check RAILS_ENV=production

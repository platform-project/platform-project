# Ruby on Rails Installation Guide

This guide will walk you through the steps to install the Ruby on Rails framework on your system. Ruby on Rails, often simply called Rails, is a popular and powerful web application framework written in Ruby.

## Prerequisites

Before you begin, make sure you have the following prerequisites installed on your system:

- Ruby (recommended version 2.6.0 or higher)
- RubyGems (a Ruby package manager)
- Node.js (for managing frontend assets)
- Yarn (a package manager for JavaScript)
- Git (for version control)
- SQLite (a lightweight database, or you can choose a different database)

## Step 1: Install Ruby

You can download and install Ruby from the official Ruby website: [https://www.ruby-lang.org/en/documentation/installation/](https://www.ruby-lang.org/en/documentation/installation/)

Follow the installation instructions for your specific operating system.

To check if Ruby is installed, open your terminal or command prompt and run:

```bash
ruby -v
```
You should see the installed Ruby version.

## Step 2: Install RubyGems
RubyGems is included with Ruby by default, so you don't need to install it separately.

To check if RubyGems is installed, run:

```bash
gem -v
```
You should see the installed RubyGems version.

## Step 3: Install Node.js and Yarn
Node.js and Yarn are used for managing JavaScript dependencies and frontend assets in a Rails application.

Install Node.js and Yarn by following the instructions on their official websites:

- Node.js: https://nodejs.org/
- Yarn: https://classic.yarnpkg.com/en/docs/install
To check if Node.js and Yarn are installed, run:

```bash
node -v
yarn -v
```
You should see the installed versions.

## Step 4: Install Rails
Open your terminal or command prompt and run the following command to install Rails:

```bash
gem install rails
```
This command will download and install the latest version of the Rails gem.

To check if Rails is installed, run:

```bash
rails -v
```
You should see the installed Rails version.

## Step 5: Create a New Rails Application
Now that Rails is installed, you can create a new Rails application. Navigate to the directory where you want to create your app and run:

```bash
rails new my-rails-app
```
Replace my-rails-app with the desired name of your Rails project directory.

## Step 6: Configure the Database
By default, Rails uses SQLite as the database. If you'd like to use a different database (e.g., MySQL or PostgreSQL), you'll need to update your config/database.yml file with the appropriate settings.

## Step 7: Start the Development Server
Navigate to your Rails project directory:

```bash
cd my-rails-app
```
Start the development server by running:

```bash
rails server
```
You can now access your Rails application in your web browser at http://localhost:3000.

## Step 8: Additional Setup (Optional)
Set up version control for your project using Git.
Install any additional gems or libraries your project requires.
Create controllers, models, and views to start building your application.

## Step 9: Start Building
You're now ready to start building your Ruby on Rails application! Refer to the Ruby on Rails Guides for comprehensive documentation and tutorials on using Rails.

## Step 10: Additional Resources
Ruby on Rails Official Website
RubyGems
Node.js
Yarn
Git
Happy coding with Ruby on Rails!
# .NET Core Installation Guide

This guide will walk you through the steps to install the .NET Core framework on your system. .NET Core is a cross-platform, open-source framework developed by Microsoft for building modern, high-performance applications.

## Prerequisites

Before you begin, make sure you have the following prerequisites installed on your system:

- A compatible operating system (Windows, macOS, or Linux)
- An internet connection to download the .NET Core SDK

## Step 1: Download the .NET Core SDK

Visit the official .NET website to download the .NET Core SDK for your operating system: [https://dotnet.microsoft.com/download](https://dotnet.microsoft.com/download)

Choose the appropriate download link based on your operating system (Windows, macOS, or Linux), and follow the installation instructions for your platform.

## Step 2: Verify Installation

After the installation is complete, open your terminal or command prompt and run the following command to verify that .NET Core has been successfully installed:

```bash
dotnet --version
```
This command will display the installed version of the .NET Core SDK. If you see the version number, it means .NET Core is installed and ready to use.

## Step 3: Create a Sample .NET Core Application (Optional)
To ensure that .NET Core is working correctly, you can create a sample "Hello World" application. Here are the steps to create and run a simple console application:

Create a new directory for your project:
```bash
mkdir my-dotnet-app
cd my-dotnet-app
```
Create a new console application:
```bash
dotnet new console
```
Build and run the application:

```bash
dotnet build
dotnet run
```
You should see "Hello World!" displayed in your terminal, indicating that the application has been successfully created and executed.

## Step 4: Start Developing
You're now ready to start developing .NET Core applications. You can use various tools, such as Visual Studio Code, Visual Studio, or JetBrains Rider, to write and build .NET Core projects.

Refer to the [.NET documentation](https://docs.microsoft.com/en-us/dotnet/core/) for detailed information on using .NET Core, including creating web applications, APIs, and more.

## Step 5: Additional Resources
- [.NET Core SDK Documentation](https://docs.microsoft.com/en-us/dotnet/core/)
- [Learn .NET Core](https://learn.microsoft.com/en-us/dotnet/core/)
- [Official .NET Blog](https://devblogs.microsoft.com/dotnet/)

Happy coding with .NET Core!
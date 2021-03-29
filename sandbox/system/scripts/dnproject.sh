#!/bin/bash
USER=`whoami`
REVISION="{REVISIION}"
COPYRIGHT=`date +%Y`
DATETIME=`date +%Y-%m-%d_%Hh%Mm%Ss`
YEAR=`date +%Y` 
DOTNET_PATH="/var/www/platform/sandbox/workspace/projects/dotnet"
UUID=$(cat /proc/sys/kernel/random/uuid)

if [ "$1" = "" ]
then
  echo ""
  echo "Please specify a project name"
  echo ""
  else 

    if [ ! -d "$DOTNET_PATH" ]
    then
      mkdir -p $DOTNET_PATH
    fi

    if [ ! -d "$DOTNET_PATH/$1" ]
    then
      echo ""
      echo "Creating project $1..."
      mkdir -p $DOTNET_PATH/$1 
      mkdir -p $DOTNET_PATH/$1/src/$1
      touch $DOTNET_PATH/$1/src/$1/$1.csproj && echo "<Project Sdk=\"Microsoft.NET.Sdk\">
  <PropertyGroup>
    <OutputType>Exe</OutputType>
    <TargetFramework>netcoreapp1.1</TargetFramework>
  </PropertyGroup>
  <ItemGroup>
    <PackageReference Include=\"System.Linq\" Version=\"4.3.0\" />
    <PackageReference Include=\"Microsoft.Extensions.DependencyInjection\" Version=\"1.1.1\" />
    <PackageReference Include=\"System.Threading\">
      <Version>4.3.0</Version>
    </PackageReference>
    <PackageReference Include=\"System.Threading.Tasks\">
      <Version>4.3.0</Version>
    </PackageReference>
  </ItemGroup>
</Project>" > $DOTNET_PATH/$1/src/$1/$1.csproj 
      GUID=`uuidgen`
      touch $DOTNET_PATH/$1/$1.sln && echo "
Microsoft Visual Studio Solution File, Format Version 12.00
# Visual Studio 2013
VisualStudioVersion = 12.0.0.0
MinimumVisualStudioVersion = 10.0.0.1
Project(\"{${UUID^^}}\") = \"$1\", \"src/$1/$1.csproj\", \"{${GUID^^}}\"
EndProject
Global
	GlobalSection(SolutionConfigurationPlatforms) = preSolution
		Debug|Any CPU = Debug|Any CPU
		Release|Any CPU = Release|Any CPU
	EndGlobalSection
	GlobalSection(ProjectConfigurationPlatforms) = postSolution
		{${GUID^^}}.Debug|Any CPU.ActiveCfg = Debug|Any CPU
		{${GUID^^}}.Debug|Any CPU.Build.0 = Debug|Any CPU
		{${GUID^^}}.Release|Any CPU.ActiveCfg = Release|Any CPU
		{${GUID^^}}.Release|Any CPU.Build.0 = Release|Any CPU
	EndGlobalSection
	GlobalSection(SolutionProperties) = preSolution
		HideSolutionNode = FALSE
	EndGlobalSection
EndGlobal
" > $DOTNET_PATH/$1/$1.sln 
      mkdir $DOTNET_PATH/$1/src
      touch $DOTNET_PATH/$1/src/.gitkeep
      mkdir $DOTNET_PATH/$1/test
      touch $DOTNET_PATH/$1/test/.gitkeep
      mkdir $DOTNET_PATH/$1/src/$1
      touch $DOTNET_PATH/$1/src/$1/Program.cs && echo "using System;

namespace $1
{
    public class Program
    {
        public static void Main(string[] args)
        {
            Console.WriteLine(\"Hello World!\");
        }
    }
}" > $DOTNET_PATH/$1/src/$1/Program.cs
      touch $DOTNET_PATH/$1/.gitignore && echo ".DS_Store
.idea
.gitignore
.travis.yml" > $DOTNET_PATH/$1/.gitignore
      touch $DOTNET_PATH/$1/.travis.yml && echo "language: csharp
solution: $1.sln
mono: none
dotnet: 1.0.1
dist: trusty
script:
 - dotnet restore
install:
  - sudo apt-get install -y gtk-sharp2
  - nuget restore $1.sln" > $DOTNET_PATH/$1/.travis.yml
      touch $DOTNET_PATH/$1/COPYRIGHT.md && echo "#COPYRIGHT" > $DOTNET_PATH/$1/COPYRIGHT.md 
      touch $DOTNET_PATH/$1/LICENSE.md && echo "#LICENSE" > $DOTNET_PATH/$1/LICENSE.md 
      touch $DOTNET_PATH/$1/README.md && echo "#README" > $DOTNET_PATH/$1/README.md 
      touch $DOTNET_PATH/$1/TODO.md && echo "#TODO" > $DOTNET_PATH/$1/TODO.md 
      cd $DOTNET_PATH/$1 
      echo ""
      echo "Creating dotnet project in '$DOTNET_PATH/$1'..."
      echo ""
      echo ""
      echo "Project created."
      echo ""
      echo ""
      echo "Quick note"
      echo "----------"
      echo "Start by adding content to '$DOTNET_PATH/$1/README.md'..."
      echo ""
      echo "Do you have things to do? If 'yes', then start by editing your TODO list"
      echo ""
      echo "See $DOTNET_PATH/$1/TODO.md"
      echo ""
      echo ""
      echo "Enjoy!"
    else 
      echo ""
      echo "dotnet project '$1' already exists"
    fi
fi

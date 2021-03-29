#!/bin/bash
set -e

dotnet restore

TEST_DIR=test

cd $TEST_DIR

build_trx(){
find . -type f -name '*.trx' -delete

for dir in $(ls); do
	cd $dir
	dotnet test --logger trx
	cd ..
done
}
#build_trx
cd ..

build_publish(){
rm -rf $(pwd)/publish/*

find -maxdepth 2 -type d \( \
 -name "*Gateway" -o -name "*Service" \
\) -exec sh -c \
	'for d;do 
		dotnet publish $d --configuration release --output $(pwd)/publish/$(basename $d); 
	done' \
   sh {} + 
} 
#build_publish
cd src
   
find -maxdepth 2 -type d \( \
 -name "*Gateway" -o -name "*Service" -o -name "*Subscriber" \
\) -exec sh -c \
	'for d;do 
		#Find the last modified file in the current directory
		latestfile=$(find $d -type f -not -path "$d/bin*" -not -path "$d/obj*" -printf "%T@ %p\n" | sort -n | tail -1 | cut -f2- -d" ");
	    filedate=$(date -r $latestfile +%s);
		
		#Get the list of project references from the csproj
		list=$(grep "ProjectReference" $d/*.csproj | cut -d "\"" -f 2 | tr "\\" "/" 2> /dev/null);
		
		#Recursively go through referenced projects and look for modified files, keep track of checked folders to avoid extra work
		folders=$d;
		while [ ${#list[@]} -gt 0 ];
		do
			#see footer
			item=$(echo $list | rev | cut -d" " -f 1 | rev);
			list=$(printf "%s" "$list" | sed -e "s@$item@@g" 2> /dev/null)
			
			checkdir=${item%/*csproj}
			if test "${list#*$checkdir}" = "$list" 
			then
				folders="${folders} $checkdir";
				latestrelated=$(find $d/$checkdir -type f -not -path "$d/$checkdir/bin*" -not -path "$d/$checkdir/obj*" -printf "%T@ %p\n" | sort -n | tail -1 | cut -f2- -d" ");
				relateddate=$(date -r $latestrelated +%s);
				if [ $relateddate -gt $filedate ];
				then
					filedate=$relateddate;
					latestfile=$latestrelated;
				fi
				
				appendlist=$(grep "ProjectReference" $d/$checkdir/*.csproj | cut -d "\"" -f 2 | tr "\\" "/" 2> /dev/null);
				if [ ${#list[@]} -gt 0 ];
				then
					list="${list} $appendlist";
				fi
			fi
		done
		pubdir=$(pwd)/../publish/$(basename $d)
		
		if [ -d $pubdir ]; 
		then
			pubdate=$(date -r $pubdir/$(ls -t $pubdir | head -n1) +%s)
		else
			pubdate=0
		fi
		
		echo Source directory: $d
		echo Publish directory: $pubdir
		
		if [ -d $pubdir ];
		then
			echo Latest pub file: $(ls -t $pubdir | head -n1)
			echo Latest source file: $latestfile
			
			if [ $filedate -gt $pubdate ];
			then
				echo "File modified"
			fi
		else
			echo $pubdir does not exist
		fi
		
	    if [ $filedate -gt $pubdate ];
		then
		    echo "Action:build"
			rm -rf $pubdir;
			dotnet restore $d;
			dotnet publish $d --configuration Release --output $pubdir; 
		else
			echo "Files not modified, skipping build"
		fi
		echo #sanity newline
	done' \
   sh {} + 
   
#some comments on the functions above
# $(date -r $(ls -t | head -n1) +%s)
#     $() #Needed to put output in a varialbe
#     ls -t | head -n1  #List all file by date and chooses the first one
#     date -r  #Gets the modified date of a file
#     +%s formats the date as an integer (long?) for comparison
#	  $d the 
#
#POSIX compliant shell does not have arrays, so we have to use a string
#
#Get the last item after space
#     item=$(echo $list | rev | cut -d" " -f 1 | rev);
#Remove the last item from the "Array" string. The function complains when the list is just whitespace, so we puth the error in 2> /dev/null
#     list=$(printf "%s" "$list" | sed -e "s@$item@@g" 2> /dev/null)
#Append any sub references to the string, effectively achieving recursion
#     list="${list} $appendlist";
#
#POSIX shell does not have string contains, but this does the same thing
#
#	 checkdir=${item%/*csproj}
#    if test "${list#*$checkdir}" = "$list" 

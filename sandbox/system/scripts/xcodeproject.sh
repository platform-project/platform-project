#!/bin/bash
USER=`whoami`
REVISION="{REVISIION}"
COPYRIGHT=`date +%Y`
DATETIME=`date +%Y-%m-%d_%Hh%Mm%Ss`
YEAR=`date +%Y` 
XCODE_PATH="/var/www/platform/sandbox/workspace/projects/xcode"
UUID=$(cat /proc/sys/kernel/random/uuid)

if [ "$1" = "" ]
then
  echo ""
  echo "Please specify an XCode project name"
  echo ""
  else 

    if [ ! -d "$XCODE_PATH" ]
    then
      mkdir -p $XCODE_PATH
    fi

    if [ ! -d "$XCODE_PATH/$1" ]
    then
      echo ""
      echo "Creating project $1..."
      mkdir -p $XCODE_PATH/$1
      mkdir -p $XCODE_PATH/$1/$1
      mkdir -p $XCODE_PATH/$1/$1/Base.lproj
      touch $XCODE_PATH/$1/$1/Base.lproj/.gitkeep
      mkdir -p $XCODE_PATH/$1/$1/en.lproj
      touch $XCODE_PATH/$1/$1/en.lproj/Localizable.strings
      touch $XCODE_PATH/$1/$1/README.md && echo "All your resources including '.swift', '.h' and '.m' files are located here." > $XCODE_PATH/$1/$1/README.md
      mkdir -p $XCODE_PATH/$1/$1.xcodeproj
      mkdir -p $XCODE_PATH/$1/$1.xcodeproj/project.xcworkspace
      touch $XCODE_PATH/$1/$1.xcodeproj/project.xcworkspace/contents.xcworkspacedata && echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<Workspace
   version = \"1.0\">
   <FileRef
      location = \"self:$1.xcodeproj\">
   </FileRef>
</Workspace>
" > $XCODE_PATH/$1/$1.xcodeproj/project.xcworkspace/contents.xcworkspacedata
      mkdir -p $XCODE_PATH/$1/$1.xcodeproj/xcshareddata
      mkdir -p $XCODE_PATH/$1/$1.xcodeproj/xcshareddata/xcschemes
      touch $XCODE_PATH/$1/$1.xcodeproj/xcshareddata/xcschemes/$1.xcscheme && echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<Scheme
   LastUpgradeVersion = \"0800\"
   version = \"1.3\">
   <BuildAction
      parallelizeBuildables = \"YES\"
      buildImplicitDependencies = \"YES\">
      <BuildActionEntries>
         <BuildActionEntry
            buildForTesting = \"YES\"
            buildForRunning = \"YES\"
            buildForProfiling = \"YES\"
            buildForArchiving = \"YES\"
            buildForAnalyzing = \"YES\">
            <BuildableReference
               BuildableIdentifier = \"primary\"
               BlueprintIdentifier = \"8F700F2D1B68FEC000A18343\"
               BuildableName = \"$1.app\"
               BlueprintName = \"$1\"
               ReferencedContainer = \"container:$1.xcodeproj\">
            </BuildableReference>
         </BuildActionEntry>
         <BuildActionEntry
            buildForTesting = \"NO\"
            buildForRunning = \"NO\"
            buildForProfiling = \"NO\"
            buildForArchiving = \"NO\"
            buildForAnalyzing = \"NO\">
            <BuildableReference
               BuildableIdentifier = \"primary\"
               BlueprintIdentifier = \"8F700F491B68FEC000A18343\"
               BuildableName = \"$1Tests.xctest\"
               BlueprintName = \"$1Tests\"
               ReferencedContainer = \"container:$1.xcodeproj\">
            </BuildableReference>
         </BuildActionEntry>
      </BuildActionEntries>
   </BuildAction>
   <TestAction
      buildConfiguration = \"Debug\"
      selectedDebuggerIdentifier = \"Xcode.DebuggerFoundation.Debugger.LLDB\"
      selectedLauncherIdentifier = \"Xcode.DebuggerFoundation.Launcher.LLDB\"
      shouldUseLaunchSchemeArgsEnv = \"YES\">
      <Testables>
      </Testables>
      <MacroExpansion>
         <BuildableReference
            BuildableIdentifier = \"primary\"
            BlueprintIdentifier = \"8F700F2D1B68FEC000A18343\"
            BuildableName = \"$1.app\"
            BlueprintName = \"$1\"
            ReferencedContainer = \"container:$1.xcodeproj\">
         </BuildableReference>
      </MacroExpansion>
      <AdditionalOptions>
      </AdditionalOptions>
   </TestAction>
   <LaunchAction
      buildConfiguration = \"Release\"
      selectedDebuggerIdentifier = \"Xcode.DebuggerFoundation.Debugger.LLDB\"
      selectedLauncherIdentifier = \"Xcode.DebuggerFoundation.Launcher.LLDB\"
      launchStyle = \"0\"
      useCustomWorkingDirectory = \"NO\"
      ignoresPersistentStateOnLaunch = \"NO\"
      debugDocumentVersioning = \"YES\"
      debugServiceExtension = \"internal\"
      allowLocationSimulation = \"YES\">
      <BuildableProductRunnable
         runnableDebuggingMode = \"0\">
         <BuildableReference
            BuildableIdentifier = \"primary\"
            BlueprintIdentifier = \"8F700F2D1B68FEC000A18343\"
            BuildableName = \"$1.app\"
            BlueprintName = \"$1\"
            ReferencedContainer = \"container:$1.xcodeproj\">
         </BuildableReference>
      </BuildableProductRunnable>
      <AdditionalOptions>
      </AdditionalOptions>
   </LaunchAction>
   <ProfileAction
      buildConfiguration = \"Release\"
      shouldUseLaunchSchemeArgsEnv = \"YES\"
      savedToolIdentifier = \"\"
      useCustomWorkingDirectory = \"NO\"
      debugDocumentVersioning = \"YES\">
      <BuildableProductRunnable
         runnableDebuggingMode = \"0\">
         <BuildableReference
            BuildableIdentifier = \"primary\"
            BlueprintIdentifier = \"8F700F2D1B68FEC000A18343\"
            BuildableName = \"$1.app\"
            BlueprintName = \"$1\"
            ReferencedContainer = \"container:$1.xcodeproj\">
         </BuildableReference>
      </BuildableProductRunnable>
   </ProfileAction>
   <AnalyzeAction
      buildConfiguration = \"Debug\">
   </AnalyzeAction>
   <ArchiveAction
      buildConfiguration = \"Release\"
      revealArchiveInOrganizer = \"YES\">
   </ArchiveAction>
</Scheme>
" > $XCODE_PATH/$1/$1.xcodeproj/xcshareddata/xcschemes/$1.xcscheme
      touch $XCODE_PATH/$1/$1.xcodeproj/xcshareddata/xcschemes/UnitTest.xcscheme && echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<Scheme
   LastUpgradeVersion = \"0800\"
   version = \"1.7\">
   <BuildAction
      parallelizeBuildables = \"YES\"
      buildImplicitDependencies = \"YES\">
      <BuildActionEntries>
         <BuildActionEntry
            buildForTesting = \"YES\"
            buildForRunning = \"YES\"
            buildForProfiling = \"YES\"
            buildForArchiving = \"YES\"
            buildForAnalyzing = \"YES\">
            <BuildableReference
               BuildableIdentifier = \"primary\"
               BlueprintIdentifier = \"8F700F2D1B68FEC000A18343\"
               BuildableName = \"$1.app\"
               BlueprintName = \"$1\"
               ReferencedContainer = \"container:$1.xcodeproj\">
            </BuildableReference>
         </BuildActionEntry>
         <BuildActionEntry
            buildForTesting = \"YES\"
            buildForRunning = \"YES\"
            buildForProfiling = \"NO\"
            buildForArchiving = \"NO\"
            buildForAnalyzing = \"YES\">
            <BuildableReference
               BuildableIdentifier = \"primary\"
               BlueprintIdentifier = \"8F700F491B68FEC000A18343\"
               BuildableName = \"$1Tests.xctest\"
               BlueprintName = \"$1Tests\"
               ReferencedContainer = \"container:$1.xcodeproj\">
            </BuildableReference>
         </BuildActionEntry>
      </BuildActionEntries>
   </BuildAction>
   <TestAction
      buildConfiguration = \"Debug\"
      selectedDebuggerIdentifier = \"Xcode.DebuggerFoundation.Debugger.LLDB\"
      selectedLauncherIdentifier = \"Xcode.DebuggerFoundation.Launcher.LLDB\"
      shouldUseLaunchSchemeArgsEnv = \"YES\">
      <Testables>
         <TestableReference
            skipped = \"NO\">
            <BuildableReference
               BuildableIdentifier = \"primary\"
               BlueprintIdentifier = \"8F700F491B68FEC000A18343\"
               BuildableName = \"$1Tests.xctest\"
               BlueprintName = \"$1Tests\"
               ReferencedContainer = \"container:$1.xcodeproj\">
            </BuildableReference>
            <SkippedTests>
               <Test
                  Identifier = \"SampleObject1Spec\">
               </Test>
               <Test
                  Identifier = \"SampleObject2Spec\">
               </Test>
            </SkippedTests>
            <LocationScenarioReference
               identifier = \"com.apple.dt.IDEFoundation.CurrentLocationScenarioIdentifier\"
               referenceType = \"1\">
            </LocationScenarioReference>
         </TestableReference>
      </Testables>
      <MacroExpansion>
         <BuildableReference
            BuildableIdentifier = \"primary\"
            BlueprintIdentifier = \"8F700F2D1B68FEC000A18343\"
            BuildableName = \"$1.app\"
            BlueprintName = \"$1\"
            ReferencedContainer = \"container:$1.xcodeproj\">
         </BuildableReference>
      </MacroExpansion>
      <AdditionalOptions>
      </AdditionalOptions>
   </TestAction>
   <LaunchAction
      buildConfiguration = \"Debug\"
      selectedDebuggerIdentifier = \"Xcode.DebuggerFoundation.Debugger.LLDB\"
      selectedLauncherIdentifier = \"Xcode.DebuggerFoundation.Launcher.LLDB\"
      launchStyle = \"0\"
      useCustomWorkingDirectory = \"NO\"
      ignoresPersistentStateOnLaunch = \"NO\"
      debugDocumentVersioning = \"YES\"
      debugServiceExtension = \"internal\"
      allowLocationSimulation = \"YES\">
      <BuildableProductRunnable
         runnableDebuggingMode = \"0\">
         <BuildableReference
            BuildableIdentifier = \"primary\"
            BlueprintIdentifier = \"8F700F2D1B68FEC000A18343\"
            BuildableName = \"$1.app\"
            BlueprintName = \"$1\"
            ReferencedContainer = \"container:$1.xcodeproj\">
         </BuildableReference>
      </BuildableProductRunnable>
      <AdditionalOptions>
      </AdditionalOptions>
   </LaunchAction>
   <ProfileAction
      buildConfiguration = \"Release\"
      shouldUseLaunchSchemeArgsEnv = \"YES\"
      savedToolIdentifier = \"\"
      useCustomWorkingDirectory = \"NO\"
      debugDocumentVersioning = \"YES\">
      <BuildableProductRunnable
         runnableDebuggingMode = \"0\">
         <BuildableReference
            BuildableIdentifier = \"primary\"
            BlueprintIdentifier = \"8F700F2D1B68FEC000A18343\"
            BuildableName = \"$1.app\"
            BlueprintName = \"$1\"
            ReferencedContainer = \"container:$1.xcodeproj\">
         </BuildableReference>
      </BuildableProductRunnable>
   </ProfileAction>
   <AnalyzeAction
      buildConfiguration = \"Debug\">
   </AnalyzeAction>
   <ArchiveAction
      buildConfiguration = \"Release\"
      revealArchiveInOrganizer = \"YES\">
   </ArchiveAction>
</Scheme>
" > $XCODE_PATH/$1/$1.xcodeproj/xcshareddata/xcschemes/UnitTest.xcscheme
      mkdir -p $XCODE_PATH/$1/$1.xcodeproj/xcuserdata
      mkdir -p $XCODE_PATH/$1/$1.xcodeproj/xcuserdata/PlatformUser.xcuserdatad/xcschemes
      touch $XCODE_PATH/$1/$1.xcodeproj/xcuserdata/PlatformUser.xcuserdatad/xcschemes/xcschememanagement.plist && echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<!DOCTYPE plist PUBLIC \"-//Apple//DTD PLIST 1.0//EN\" \"http://www.apple.com/DTDs/PropertyList-1.0.dtd\">
<plist version=\"1.0\">
<dict>
	<key>SchemeUserState</key>
	<dict>
		<key>UnitTest.xcscheme_^#shared#^_</key>
		<dict>
			<key>orderHint</key>
			<integer>1</integer>
		</dict>
		<key>$1.xcscheme_^#shared#^_</key>
		<dict>
			<key>orderHint</key>
			<integer>0</integer>
		</dict>
	</dict>
	<key>SuppressBuildableAutocreation</key>
	<dict>
		<key>8F700F2D1B68FEC000A18343</key>
		<dict>
			<key>primary</key>
			<true/>
		</dict>
		<key>8F700F491B68FEC000A18343</key>
		<dict>
			<key>primary</key>
			<true/>
		</dict>
	</dict>
</dict>
</plist>
" > $XCODE_PATH/$1/$1.xcodeproj/xcuserdata/PlatformUser.xcuserdatad/xcschemes/xcschememanagement.plist
      touch $XCODE_PATH/$1/$1.xcodeproj/project.pbxproj && echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<!DOCTYPE plist PUBLIC \"-//Apple//DTD PLIST 1.0//EN\" \"http://www.apple.com/DTDs/PropertyList-1.0.dtd\">
<plist version=\"1.0\">
<dict>
<!-- incomplete -->
</dict>
</plist>
" > $XCODE_PATH/$1/$1.xcodeproj/project.pbxproj
      mkdir -p $XCODE_PATH/$1/$1.xcworkspace
      touch $XCODE_PATH/$1/$1.xcworkspace/contents.xcworkspacedata && echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<Workspace
   version = \"1.0\">
   <FileRef
      location = \"group:$1.xcodeproj\">
   </FileRef>
</Workspace>
" >  $XCODE_PATH/$1/$1.xcworkspace/contents.xcworkspacedata
      mkdir -p $XCODE_PATH/$1/$1.xcworkspace/xcuserdata
      mkdir -p $XCODE_PATH/$1/$1.xcworkspace/xcuserdata/PlatformUser.xcuserdatad/xcdebugger
      touch $XCODE_PATH/$1/$1.xcworkspace/xcuserdata/PlatformUser.xcuserdatad/xcdebugger/.gitkeep
      mkdir -p $XCODE_PATH/$1/$1Tests
      touch $XCODE_PATH/$1/$1Tests/README.md && echo "All your resources including '.swift', '.h' and '.m' files are located here." > $XCODE_PATH/$1/$1Tests/README.md
      touch $XCODE_PATH/$1/$1Tests/Info.plist && echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<!DOCTYPE plist PUBLIC \"-//Apple//DTD PLIST 1.0//EN\" \"http://www.apple.com/DTDs/PropertyList-1.0.dtd\">
<plist version=\"1.0\">
<dict>
	<key>CFBundleDevelopmentRegion</key>
	<string>en</string>
	<key>CFBundleExecutable</key>
	<string>\$(EXECUTABLE_NAME)</string>
	<key>CFBundleIdentifier</key>
	<string>\$(PRODUCT_BUNDLE_IDENTIFIER)</string>
	<key>CFBundleInfoDictionaryVersion</key>
	<string>6.0</string>
	<key>CFBundleName</key>
	<string>\$(PRODUCT_NAME)</string>
	<key>CFBundlePackageType</key>
	<string>BNDL</string>
	<key>CFBundleShortVersionString</key>
	<string>1.0</string>
	<key>CFBundleSignature</key>
	<string>????</string>
	<key>CFBundleVersion</key>
	<string>1</string>
</dict>
</plist>
" > $XCODE_PATH/$1/$1Tests/Info.plist
      mkdir -p $XCODE_PATH/$1/script
      touch $XCODE_PATH/$1/script/cibuild && echo "#!/bin/bash --login
export LC_ALL=en_US.UTF-8
export LANG=en_US.UTF-8
export CI=1

set -ex
hostname

rbenv local 2.2.2

bundle install
bundle exec rake test
bundle exec rake build
" > $XCODE_PATH/$1/script/cibuild && chmod a+x $XCODE_PATH/$1/script/cibuild
      mkdir -p $XCODE_PATH/$1/vendor
      touch $XCODE_PATH/$1/Gemfile && echo "source \"http://rubygems.org\"

ruby \"2.2.2\"

# CocoaPods manages library dependencies for your Xcode project. You sp...
# [cocoapods](https://github.com/CocoaPods/CocoaPods)
gem \"cocoapods\", \"~> 0.38.2\"

# Rake is a Make-like program implemented in Ruby. Tasks and dependenci...
# [rake](https://github.com/jimweirich/rake)
gem \"rake\", \"~> 10.4.2\"

group :development, :test do
  gem \"xcpretty\"
  gem \"stringer\"
end
" > $XCODE_PATH/$1/Gemfile 
      touch $XCODE_PATH/$1/Podfile && echo "# Uncomment this line to define a global platform for your project
# platform :ios, \"6.0\"

use_frameworks!

target \"$1\" do
  pod \"PureLayout\", \"~> 3.0\"
  pod \"MBProgressHUD\", \"~> 0.9.1\"
  pod \"UICKeyChainStore\", \"~> 2.0.2\"
  pod \"BKPasscodeView\", \"~> 0.2.2\"
  pod \"Realm\"
  pod \"Realm+JSON\", \"~> 0.2\"
  pod \"Aspects\", \"~> 1.4\"
  pod \"Raven\", \"~> 1.0.1\"
  pod \"PromiseKit\", \"~> 4.0\"
  pod \"SMPageControl\"
  pod \"BGTableViewRowActionWithImage\"
  pod \"AFMInfoBanner\", \"~> 1.2.1\"
  pod \"Google/Analytics\"
  pod \"Branch\"
  pod \"OneSignal\"
  pod \"Appsee\"
end

target \"$1Tests\" do
  pod \"OCMock\", \"~> 3.1\"
  pod \"Specta\", \"~> 1.0.3\"
  pod \"Expecta\", \"~> 1.0.2\"
  pod \"KIF\", \"~> 3.3.2\"
  pod \"OHHTTPStubs\", \"~> 4.1\"
end

post_install do |installer|
  installer.pods_project.targets.each do |target|
    target.build_configurations.each do |config|
      config.build_settings[\"GCC_PREPROCESSOR_DEFINITIONS\"] ||= [\"\$(inherited)\"]
      config.build_settings[\"GCC_PREPROCESSOR_DEFINITIONS\"] << \"REALM_ENABLE_NULL=1\"
      config.build_settings[\"EXPANDED_CODE_SIGN_IDENTITY\"] = \"\"
      config.build_settings[\"CODE_SIGNING_REQUIRED\"] = \"NO\"
      config.build_settings[\"CODE_SIGNING_ALLOWED\"] = \"NO\"
      config.build_settings[\"ENABLE_BITCODE\"] = \"NO\"
      config.build_settings[\"SWIFT_VERSION\"] = \"3.0\"
    end
  end
end

" > $XCODE_PATH/$1/Podfile
      touch $XCODE_PATH/$1/Rakefile && echo "require \"stringer\"

task default: :test

task :env do
  @appname = @workspace = @scheme = \"$1\"
  @scheme = ENV[\"scheme\"] if ENV[\"scheme\"]
  @app_id = \"app.$1\"
end

task build: :env do
  @destination_dir = \"build\"
  clean
  build
end

desc \"Run tests\"
task test: :env do
  @build_dir = \"\$(PWD)/build\"
  reset_sim unless fast?
  test
end

desc \"Run genstrings to update the Localizable.strings files\"
task localize: :env do
  folder = File.join(File.dirname(__FILE__), @appname)
  %w(en).each do |locale|
    Stringer.run(locale, files_folder: folder, lproj_parent: folder)
  end
end

desc \"reset the simulator\"
task reset: :env do
  reset_sim
end

desc \"Install and run on the simulator\"
task run: :env do
  @build_dir = \"\$(PWD)/build\"
  xcode_install
end

def clean
  fail \"no destination dir\" unless @destination_dir
  fail \"risky destination dir\" if @destination_dir.start_with? \"/\"
  run \"xcodebuild clean -workspace #{@workspace}.xcworkspace -scheme #{@scheme}\"
  run \"mkdir -p #{@destination_dir}\"
  run \"rm -rf #{@destination_dir}/*\"
end

def build
  pretty_output = \"| xcpretty && exit \${PIPESTATUS[0]}\" unless ci?
  run \"xcodebuild archive -workspace #{@workspace}.xcworkspace -scheme #{@scheme} -archivePath #{@destination_dir}/#{@appname} #{pretty_output}\"
  run \"xcodebuild -exportArchive -exportPath #{@destination_dir}/#{@appname} -archivePath #{@destination_dir}/#{@appname}.xcarchive -exportProvisioningProfile 'Platform iOS App'\"
end

def test
  pretty_output = \"| xcpretty && exit \${PIPESTATUS[0]}\" unless ci?
  run \"xcodebuild test -workspace #{@workspace}.xcworkspace -scheme #{@scheme} SYMROOT=#{@build_dir} OBJROOT=#{@build_dir} -destination 'platform=iOS Simulator,name=iPhone 6' #{pretty_output}\"
end

def xcode_install
  pretty_output = \"| xcpretty && exit \${PIPESTATUS[0]}\" unless ci?
  run \"xcodebuild -workspace #{@workspace}.xcworkspace -scheme #{@scheme} SYMROOT=#{@build_dir} OBJROOT=#{@build_dir} -destination 'platform=iOS Simulator,name=iPhone 6' #{pretty_output}\"
  run \"xcrun simctl boot 'iPhone 6'\" rescue nil
  run \"xcrun simctl install booted #{@build_dir}/Debug-iphonesimulator/$1.app\"
  run \"xcrun simctl launch 'iPhone 6' #{@app_id}\"
  run \"open -a Simulator\"
end

def reset_sim
  run \"killall iOS Simulator\" rescue nil # no sim running
  run \"xcrun simctl shutdown 'iPhone 6'\" rescue nil
  run \"xcrun simctl erase 'iPhone 6'\"
end

def run(command)
  puts \"--> #{command}\"
  system(command) || fail(\"** BUILD FAILED **\")
end

def ci?
  ENV[\"CI\"]
end

def fast?
  ENV[\"fast\"]
end

" > $XCODE_PATH/$1/Rakefile
      touch $XCODE_PATH/$1/Fastfile && echo "# More documentation about how to customize your build
# can be found here:
# https://docs.fastlane.tools
fastlane_version \"1.109.0\"

# This value helps us track success metrics for Fastfiles
# we automatically generate. Feel free to remove this line
# once you get things running smoothly!
generated_fastfile_id \"62ef1bfc-85b0-4c6d-97d9-569eadb2e2ed\"

default_platform :ios

# Fastfile actions accept additional configuration, but
# don't worry, fastlane will prompt you for required
# info which you can add here later
lane :beta do
  # build your iOS app
  gym(
    # scheme: \"YourScheme\",
    export_method: \"ad-hoc\"
  )

  # upload to Beta by Crashlytics
  crashlytics(
    # api_token: \"YOUR_API_KEY\",
    # build_secret: \"YOUR_BUILD_SECRET\"
  )
end" > $XCODE_PATH/$1/Fastfile
      touch $XCODE_PATH/$1/.gitignore && echo ".DS_Store
.gitignore
.travis.yml" > $XCODE_PATH/$1/.gitignore
      touch $XCODE_PATH/$1/.travis.yml && echo "language: objective-c
osx_image: xcode8.3
script:
    - xcodebuild clean test -project $1.xcodeproj -scheme $1 -destination \"platform=iOS Simulator,name=iPhone 7,OS=10.3\" CODE_SIGN_IDENTITY=\"\" CODE_SIGNING_REQUIRED=NO ONLY_ACTIVE_ARCH=NO -quiet" > $XCODE_PATH/$1/.travis.yml
      touch $XCODE_PATH/$1/COPYRIGHT.md && echo "# COPYRIGHT" > $XCODE_PATH/$1/COPYRIGHT.md 
      touch $XCODE_PATH/$1/LICENSE.md && echo "# LICENSE" > $XCODE_PATH/$1/LICENSE.md 
      touch $XCODE_PATH/$1/README.md && echo "# README" > $XCODE_PATH/$1/README.md 
      touch $XCODE_PATH/$1/TODO.md && echo "# TODO" > $XCODE_PATH/$1/TODO.md 
      cd $XCODE_PATH/$1 
      echo ""
      echo "Creating Xcode project in '$XCODE_PATH/$1'..."
      echo ""
      echo ""
      echo "Project created."
      echo ""
      echo ""
      echo "Quick note"
      echo "----------"
      echo "Start by adding content to '$XCODE_PATH/$1/README.md'..."
      echo ""
      echo "Do you have things to do? If 'yes', then start by editing your TODO list"
      echo ""
      echo "See $XCODE_PATH/$1/TODO.md"
      echo ""
      echo ""
      echo "Enjoy!"
    else 
      echo ""
      echo "Xcode project '$1' already exists"
    fi
fi

Continuous Integration (CI) ==> CI is a process of automated built and automated process.

all the developers are sharing their codes from some central reprosatery, so Jenkins or CI are like pull the codes from shared repositery and build it with the helo of built tools what every is being used such as Maven, and after the built is successful  execute the test on that particular built; this is continuous intergration.

CI helps to detect error quickly and lockate them more easily.



"//Installing Jenkins and Configuration//"

tep 1: Check if JDK has been Pre-Installed

In some Mac systems (earlier than Mac OS X 10.7), JDK has been pre-installed. To check if JDK has been installed, open a "Terminal" (Search "Terminal"; or Finder ⇒ Go ⇒ Utilities ⇒ Terminal) and issue this command:

javac -version

If a JDK version number is returned (e.g., JDK x.x.x), then JDK has already been installed. If the JDK version is prior to 1.8, proceed to Step 2 to install the latest JDK; otherwise, proceed to "Step 3: Write a Hello-world Java program".

If message "command not found" appears, JDK is NOT installed. Proceed to the "Step 2: Install JDK".

If message "To open javac, you need a Java runtime" appears, select "Install" and follow the instructions to install JDK. Then, proceed to "Step 3: Write a Hello-world Java program".


Step 2: Download JDK

Goto Java SE download site @ http://www.oracle.com/technetwork/java/javase/downloads/index.html. Under "Java Platform, Standard Edition" ⇒ "Java SE 10.0.{x}" ⇒ Click the JDK's "Download" button.

Check "Accept License Agreement".

Choose your operating platform, i.e., MacOS. Download the installer (e.g, jdk-1.8.0.{x}_osx-x64_bin.dmg - 395MB).


Step 3: Install JDK/JRE

Double-click the downloaded Disk Image (DMG) file. Follow the screen instructions to install JDK/JRE.

Eject the DMG file.

To verify your installation, open a "Terminal" and issue these commands.

// Display the JDK versionjavac -versionjavac 10.0.{x} // Display the JRE versionjava -versionjava version "10.0.{x}"...... // Display the location of Java Compilerwhich javac/usr/bin/javac // Display the location of Java Runtimewhich java/usr/bin/java


Start Jenkins on Mac OS

1. Open terminal and execute command

"java -jar ~/path-to-jenkins-war/jenkins.war -httpPort={Port_Num}" ==> for configurating jenkins.

Example: "java -jar /Users/<username>/Downloads/jenkins.war --httpPort=9090" ==> remember how you assign the port for the jenkins. then run the port and enter the password.

    For password, "cat <location given on http address>" and then you are good to go.


"//On configuration of any project, on built there will be 'Clean Built' you can also add "checkstyle:"checkstyle" for clear code, but then remember? for check style plugins have to be install. when we do check style, we also need to do on Post Built action beside built tab to publish check style analysis result

"//Jenkins Artifacts//"

    1. go in Project=>Configure=>Post-Built-Action=>Archive the artifacts=>
    2. Files to Archive=> i. "**/*" ==> if you want to do all files
               IMP       ii. "**/*.jar" ==> if you want to do only jar => which is most of the time.

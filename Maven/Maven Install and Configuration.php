"//MAVEN Introduction//"
What is Mave? ==> Maven is a built tool, which helps developer in building their project.
What is built tools? ==> built tools is tool that automates everything related to building a software project.
Why we need Maven? ==> one cannot make an application on their own, they depend on third parties for some thing; so when you work on a team and you share your project, the other member of your team could not be able to use your project because they need to download all those dependencies which was established on the original project, so there comes the MAVEN which consist all the dependencies to the project. So, Maven is useful on building a complete project.

"//Configuration of Maven on WINDOWS"
            pre-requist
                i. Java

            Download Maven and extract it

            Add M2_HOME in environment variable

            Add maven path in environment variable

            Verify Maven

    ---"Add JAVA_HOME Environmental Variable"

        Right click on MyComputer -> properties -> Advanced System Settings -> Environment variables -> click new button.

        Put the variable name “JAVA_HOME” .

        Give JAVA SDK value in JAVA_HOME value. For me, it’s – C:\Program Files\Java\jdk1.8.0_31

        Click on “OK” button.


    ---"Add M2_HOME Environmental Variable"

        Right click on MyComputer -> properties -> Advanced System Settings -> Environment variables -> click new button.

        Put the variable name “M2_HOME” or “MAVEN_HOME” .

        The value of M2_HOME should be home directory of maven. For me it’s – C:\apache-maven-3.3.9

        Click on “OK” button.

"//Configuration of Maven on MAC"

    -verify if maven is already installed in the machine;
            "mvn -version"

    -download Maven from official site
    -verify Java version on your machine;
            "java -version"
    -Configure maven on your machine
        -after downloading the file, unzip the file
    -move the unzipped files to application;
        Sample, cd to downloads where your unzip file is then the command,
            "mv apache-maven-3.6.0 /Applications/" ==> will change the place of maven unzipped file from downloads to the applications.
        go to applications and verifu the changes.

    "***CONFIGURATION of BASH FILE"
        -go cd to usersname i.e

        "cd /Users/<Username>/"
        - "ls -a" ==> you will see the .bash_profile there, if not then create it.
        - "open -e .bash_profile" ==> will open the file so you can configure
        -//adding M2_Home and Path//

                export JAVA_HOME=$(/usr/libexec/java_home -v 1.8)  ==> save this on .bash profile
                export M2_Home=/Applications/apache-maven-3.6.1    ==> save this on .bash profile
                export PATH=$PATH:$M2_Home/bin                     ==> save this on .bash profile

        - "cat .bash_profile" for veryfing on terminal.
        - "mvn -version" ==>for checking version to display.



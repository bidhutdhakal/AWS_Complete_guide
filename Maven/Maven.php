-Maven Central Repository ==> where it contain version and dependencies of various application.
- goo in google and open maven central repository there, yoy can find any open source or third party liability which is required for an application.

"//Generate mvn project//"

    "mvn archetype:generate" ==> hit the command on any directories to set that onto maven.

    Sample answer on asked command after above command.

            Define value for property 'groupId': com.testing.sample
            Define value for property 'artifactId': MySAmpleMavenProject
            Define value for property 'version' 1.0-SNAPSHOT: :
            Define value for property 'package' com.testing.sample: :

-"mvn eclipse:eclipse" ==> after creating the maven project; make it compactable with ECLIPSE by                        this command.
"//Validate//" ==> Validate the project is correct and all necessary information is available.

        -"mvn validate"==> this command validate if maven is successfully built on that directory

"//Compile Maven Project//"==> Compile the source code of the project.
        -"mvn compile" ==> helps compile project


"//Test for Maven//"==> Test the compiled source code using a suitable unit testing framework.
        -"mvn test" ==> helps you compile first then lets you know if its tested successfully.

"//Package in maven//"==> Take the compiled code and package it in its distributable format, such                       as JAR.
        -"mvn package"===>complete all and creats the jar files for you.

"//Clean in Maven//"==> after installing dependencies refresh and compile again with command clean.

    "mvn clean package" ==> will compile fresh project after adding dependencies when you upgrade it.

"//POM.xml in Maven//"

    ==>Project Object Model or POM is the fundamental unit of work in MAVEN. It is an xml file that contains information about the project and configuration details. it is a very importain file in any maven project.
    ==> POM is used by maven to built a project.
    ==>All dependencies and support plugins are defined in POM file.
    ==> All dependencies resolved during the compilation, which mentioned in POM file.

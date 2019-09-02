Jenkins ==>

    i. Master=> 1. Schedule Build job
                2. Disphaces Builds to the slave for actual job execution
                3. Monitoring the slave and recording the build results.
                4.

    ii. Salve => 1. Execute Built jobs Dispached by master.


"//Create & Execute Jenkins Job//" ==> Starting with Jenkins on how to open it.

    "java -jar jenkins.war" ==> locate jenkins .war location then exectue the command to start Jenkins. then go to localhost and port to run jenkins.

        "//Install git plugins from Jenkins plugins and install it name , GitHub Integration Plugin." ==> for making compactable with git hub.

"//Configure Jenkins to Work With Java, GIT, Gradle, Maven//"

Jenkins => Manage Jenkins => Global Tools configuration

    for locations,

    "which git" ==> will git git locations
    "which java"==> will give java locations
    "open -e .bash_profile" ==> befor go to user directory. put home location then save.

    "echo $JAVA_HOME" ==> hit the command in terminal and copy the entire location so that the path is verified in the global configuration.

        put all local addresses and save changes.

//  When you run the project and it failed because it could not locate the POM.XML file then go to configure then advanced it and the add the location;

        "$workspace/<NAME OF APPLICATION"

EXAMPLE; "$workspace/java-maven-junit-helloworld-master/pom.xml"



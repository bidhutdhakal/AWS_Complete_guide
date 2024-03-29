"docker login" ==> login into docker
"docker logout" ==> logout from docker.

"///hub.docker.com///" ==> docker official Central Repository for Docker.

"docker container run --publish 80:80 --detach nginx" ==> forcefully give you port 80. (the front 80 of 80:80)

        ==>Force ful give you port 80 as there is --detach
        ==> if on local machine, its gonna be "localhost:80"
        ==>if on ip machine, its gomma be "ip:80"

"docker ps"==> gives you name of container
"docker stop <container id>" ==> stops the container
"docker container ls" ==> shows the running container
"docker container ls-a" ==> shows all container
"docker volume ls" ==> will show the docker container volume.
"docker volume inspect <volume id"==> to see details of volume that is generated by above statement. remember, even if container is delete, vole still exist.
"docker container start <container is>"==> we can start stopped container on its listed port.
"docker container stop <container is>"==> we can stop  container on its listed port.
"docker container run --publish 8080:80 --detach --name <nameYouWantForContainer> nginx" ==> on port 8080. ==> container name as well.
"docker container --publish --"
"docker container logs <container_name>/<container_ID"==> shows logs of specific containers.
"docker container top <container_id>" ==> shows process running inside the container.
"docker container rm <container_id> <container_id> <container_id>"==> removes multiple container.
"docker container rm -f <container_id>"==> remove container forcefully.
"docker container run -d -p 8080:80 --name <container name> <servername>" ==> here -d and -p is to run on background. -d can be written as --detach and --publish for -p

"docker container run -d -p 3306:3306 --name <nameOfContainer> --env MYSQL_RANDOM_ROOT_PASSWORD=yes mysql"==> here for starting mysql data base we have '--env MYSQL_RANDOM_ROOT_PASSWORD=yes' and ' mysql ' at last is its server name.

"docker container logs <container name/id>"==> to see the password of the container that we just created

'Docker Container CLI Monitoring & Inspection'

"docker container top <container id/name>"==> process List in one container.
"docker container inspect <container id/name>"==> Details of one container config.
"docker container stats " ==> performance stats on all container.

"//running container in interactive mode//"

    "docker container run -it"==> run container interactivity.

"docker container run -it --name <name> nginx bash" ==> directly starting inside container, like you have the whole system file like mac on mac. it will stop when we quit.


"docker container exec -it <container id> bash" will open running container bash, i.e mac system.

'same like above'

"docker container exec -it <container id> touch /tmp/bidhut" ==> will create file on that container without being in that container.



"??>>"

"docker container run -p 8080:80 -d nginx" ==> opening container in nginx
"ifconfig eth0" ==> checking ip address to see of container.
"docker container port 713c7a8a3930"==> shows which port is receving and sending.
"docker container inspect 713c7a8a3930"==> shows the container ip address.
"docker container inspect -f '{{.NetworkSettings.IPAddress}}' 713c7a8a3930" ==> if you directly want to find the port where docker container is running.
"ifconfig eth0" ==> here you can find the port of local machine and that you can analyze that the container have its own virtual machine to run its port on as port id is diff on both.



'//DOCKER IMAGE//'
pulling images and different versions from docker hub

"docker pull <name>"=> will pull an image to your disk.
"docker pull <name>:<version>" ==> will pull specific version
"docker images"==> shows images names.
"docker tag <image_name> <new_image_name>"==> helps change the docker images name.
"docker image push <image_name>" pushes images to docker hub.
    'docker login' ==> provide id and password before pushing images to docker.
    'docker logout' ==> For logging out.
    'cat /root/.docker/config.json' ==> for looking credentials.

"docker image tag ubuntu <docker_username>/<file you want to rename>"

    'docker image tag ubuntu dhakal12/ubuntutest' ==> in my case, so it will be pushed to docker hub account.

{because only official name are alloud directly, elst we have to provide our account name before pushing any file.}

"docker image tag dhakal12/ubuntutest dhakal12/ubuntutest:1.0.1" ==> sample for creating an image with tag line at last; 'where dhakal12/ubuntutest' were frem docker images or its name.
"docker image push dhakal12/ubuntutest:1.0.1" ==> will finally push the updted version with tag to the docker hub repository.

"//Create Custom DOcker Image.//"==> See video. 157

    'go to folder and create "Dockerfile"

        and then put instruction in that dockerfile manually.

then execute command.

"docker image build -t customnginx:0.0.1 ." ' "." if its current directory, /root/ if its root directory, or PATH.

THEN;

"docker run -d -p 4444:90 customnginx:0.0.1" ==> remember :90 is what you exposed on your file.
'


'~~~~~~~~~~~~~~~~~~~~//build an image and after that creating docker image.~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~'

".////////////////Creating Docker Image/////////////////"

1.Build a docker image by below
    "docker image build -t python_prog:0.0.1 /Users/bidhutdhakal/Training/mydockerimages" described below.
   "docker image build -t <Name'''''':version> <directory where you want to build it..>"

    ~~~~verify if docker images is being created by- "docker images"

2. to execute the program, "docker container run python_prog:0.0.1" ==> so we can execute the program which we coded.

3. to delete docker images.
"docker image rm -f <imageid> or <imagename:version">
    ~~~~verify if docker images is being deleted by- "docker images"

4. making the docker image file to be able to push to the docker hub, for that we need to rename image file to <username>/file name.

   "docker image build -t dhakal12/python_prog:0.0.1 /Users/bidhutdhakal/Training/mydockerimages
"docker image build -t <DockerHubuserid>/<Name'''''':version> <directory where you want to build it..>" ==> so we will be able to push the image to the docker hub adter logging in; for login, "docker login" where as "docker logout" for logout.

5. Pushing to Docker Hub.
    "docker push dhakal12/python_prog"
    "docker push <username>/<imagename>

6. pulling from Hub to the local machine after deletion or any of the file.
     "docker container run dhakal12/python_prog:0.0.1" ==> running a program which is on the hub, if its not there then it will download them and then open it.

7. 'only confusion are'

        - transfering docker file from working machine to docker ssh login system.
        - loading images to the container and deploying them in docker hub.

'~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Data Volumes~ (Data Management)~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~'
1.  "docker pull mysql" ==> it will pull the latest focker file of my sql.
    "docker pull <imagename>"==> ig you want to pull any thing you like.

2. "docker inspect mysql" ==> this command will verify or inspect if mysql is installed.
    "docker inspect <imagename>"==> this command will inspect if required image is installed or not.

3.  "docker run -d --name mysqldb -e MYSQL_ALLOW_EMPTY_PASSWORD=True mysql" ==> creating the my sql container.
    "docker run -d --name <containerName> -e MYSQL_ALLOW_EMPTY_PASSWORD=True <imagename>" ==> from -e to True is specially because this is my sql.

                *remember container name is always unique in the world*
                *verify with "docker container ps" as if the docker container is running.
                *you can inspect by "docker inspect <containerID or ContainerName>"

4. Volumes command. (Checking volume name after creating a container )

    -  "docker volume ls" ==> will show the docker container volume name.
    - "docker volume inspect <volume id"==> to see details of volume name that is generated by above statement. remember, even if container is delete, vole still exist.

5. creating a container with a container name and a volume name.

    "docker run -d --name mysqldb3 -e MYSQL_ALLOW_EMPTY_PASSWORD=True --mount source=mysql-db,destination=/var/lib/mysql mysql" => volume name is 'mysql-db' to verify 'docker container ps'

    "docker run -d --name <ImageNameSelfGive> -e MYSQL_ALLOW_EMPTY_PASSWORD=True --mount source=<volumeName>,destination=/var/lib/mysql mysql"

            *to see container "docker container ls -a"
            *to see volume name "docker volume ls"

            *by this we will be able to know which volume is related to which container or container image name.
            *when we stop the container we will be able to use the same volume name for another existing container.




'~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Bind Mounts (Data Management)~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~'

1. "docker container run -d --name nginxbind --mount type=bind,source=$(pwd),target=/app nginx" ==> binding current directory with nginx working directory.

    "docker container run -d --name <ContainerImageName> --mount type=bind,source=<Directory>,target=/app nginx"
        *here i am already inside the root folder so i did (pwd) as directory.
        *Verify the container with 'docker ps'
        *Verify the file with 'docker inspect <imagename>' for inspection.
            -go to the mount information and see destination and source location.
        *to get inside the container "docker exec -it <containerIMGname> bash"==> the name will be followed by the number of the container
        *"ls"=> will show the directory, "cd /app" will take inside the app folder as we saw that from 'mount' location described above.
        *open another Terminal and ligin ssh again and ls, then you will see the folder, go inside and when you open and create any file or folder then you can see that file in the container exactly the same on the container numbered on another terminal, which is a real container.. 'because this ls in the new container is the exactly same directory which we created in the container. so when you create any thing here, it will be inside the container.
        *when we ls on the number container from above description, thats exactly location of our local machine where we mounted our location with the container.

to



 '~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Assignments (Data Management)~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

1.  "docker container run --name=mysql-test mysql:8.0" => creating and pulling a docker image of mysql from hub.
    "docker container run --name=<name of image> mysql:8.0"

            *it will throw error but gives hint on my pass format. so actual format would be,
    "docker container run --name=mysql-test -e "MYSQL_ROOT_PASSWORD=mypassword" mysql:8.0"
    "docker container run --name=<ContImgName> -e "MYSQL_ROOT_PASSWORD=<yourpassword>" <ImgNameFrmHub:Version"


2. Creating same container as above but naming the volume as well. the volume destination we got from hub.docker Volume area.

    "docker container run -d --name=mysql-test -e "MYSQL_ROOT_PASSWORD=mypassword" --mount source=mysql-db,destination=/var/lib/mysql mysql:8.0" ==>same as above but then here is volume name as well. and we put -d so we can run the container.as we are adding data on that container.

    "docker container run -d --name=<ContainerName> -e "MYSQL_ROOT_PASSWORD=<password>" --mount source=<volume_name>,destination=<got from hub.docker volumearea> <dockerhub imagename:version"

                *"docker volume ls"==> would show the volume name.
                *"docker inspect <container name>"=> would show detail on mount location, passowrd and evrything

'++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++"
docker container run -d --name=mysql2 -e xMYSQL_ALLOW_EMPTY_PASSWORD=True --mount source=mysql-db,target=/var/lib/mysql mysql:8.0

mysql -u root -h 172.17.0.2 -P 3306

'++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++"


3. Entering the mysql data on the container.

    1. go to "docker inspect mysql-test"
             "docker inspect <container name>" ==> so we can get Find out IP of running container, Running Port, so we can install my sql client pachage.

    2 "mysql -u root -p mypassword -h 172.17.0.2 -P 3306" ==> going inside the mysql data base but error as my sql client package.

      "mysql -u root -p <password> -h <IPaddress> -P <port>" all these instruction we get from the inspecting container name.

    3. "apt-get install mysql-client" ==>installing my sql client pachage so we can run sql on terminal or container.

    MYSQL_ALLOW_EMPTY_PASSWORD=True ==> problem with password, if not password then its taking.


4. entering value in database.

   - "CREATE DATABASE testdb;" ==> creates the database.
     "CREATE DATABASE <databaseName>;" ==> creates the database.
-"show databases;" => shows the databases names.
-"use testdb;"=> uses the named databases.
  "use <dbname>
-"CREATE TABLE persons (
-> PersonID int,
-> LastName varchar(255),
-> FirstName varchar(255),
-> Address varchar(255),
-> City varchar(255)
-> );"

** remember how it opens after table name Persons "()" an closes at last with ");"

-"show tables;" ==> shows the table.

-"INSERT INTO persons (PersonID, LastName, FirstName, Address, City) VALUES (14, 'B. Erichsen', 'TOM', 'Skagen 216', 'Norway'"
-> ");" ==> this must be hit under so the value will be accepted.

 ***Another Data Again.

"INSERT INTO persons (PersonID, LastName, FirstName, Address, City) VALUES (14, 'Dhakal', 'Bidhut', 'Texas 76117', 'Dallas' );"

=> "commit;" ==> to commit the data value is fine.
=>"Select * from persons;" =? will shows the actual table data.
  "Select * from <table name;>"
=>"exit;" ==> Will Exit from the table.



'~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Bind Mounts (Assignments)~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    With the help of bind mount we can change any thing inside the running container.

-   ifconfig to see the ==> to see the IP address if in local machine, IP= 'inet add'

-   docker container run -d --name nginx-test -p 80:80 nginx (will load the nginx image on the port 80.)

- "docker exec -it nginx-test bash" to go inside the running container.
    "docker exec -it <container name> bash" --> go inside any running container.
- "cd /usr/share/nginx/html/" ==> to verify if the web index. html is there in the location.
- "exit" out the container. -> ls container -> stop container, ->remove container.


'!!!!!!!!!!!!!!!!!!Bind Mounts and all the way down to docker Swarn until Kubernatics, Learning left.!!!!!!!!!!!!!!!!'



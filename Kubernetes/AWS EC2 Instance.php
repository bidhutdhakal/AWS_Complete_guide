
https://www.youtube.com/watch?v=hPDL9yIlZEk
https://www.youtube.com/watch?v=hPDL9yIlZEk
https://www.youtube.com/watch?v=hPDL9yIlZEk
https://www.youtube.com/watch?v=hPDL9yIlZEk

s'~~~~Setting up (it is setting a machine on a cloud first.~~~~~~~'

1. Services=> EC2 "comute" ==> "Ubuntu Server free tire" ==> Next 'Condiguration Instance' ==> Next 'Add Tags'==>  'configure security group' Type - All Traffic, Source -anywhere, then Next ==> Lanch.

    * on launch 'Create new key pair'
    *key pair name '<name you want>' ==> Download and SAVE SAFE. ==> Launch.

2.Make a directry and save in safe location the key, in my case, Home/myprojects/keys/'newcluster'

3. "ls -lia" ==> shows read/write info about the files in the directory.

        as now newcluster have its file as 'rw-r-r'

4. "chmod 400 newcluster.pem" ==> makes our file only "r------" so we can use it from terminal directly.

5. go to the recently created instance and click on Connect to get detail info on what to do.
6. Creating Alias so we can connect directly from ssh, from followig cond.

    1. "cd ~"
    2. "ls -lia" ==> to see hidden directory/
    3. "cd .ssh" ==> cd to this directory, if dont have then create.
    4. "touch config"==> create a file named config. if you already have it then just edit.
    5. "vim config" ==> it open the file in vim mode so you can enter the data.

            <In My Condition>
            Host awscluster
                HostName 3.19.71.42
                User ubuntu
                IdentityFile /Users/bidhutdhakal/Myprojects/keys/newcluster.pem

            <Syntax>
                Host <name you want to hit after SSH>
                    HostName <IP Address, go in Description of the Instance and find out,               it starts with 'IPv4 Public IP>
                    User ubuntu
                    IdentityFile <location>/<filename>




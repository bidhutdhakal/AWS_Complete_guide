
"######################### Creating EC2 INSTANCE or 'Ubuntu instance' #############################"

https://www.youtube.com/watch?v=hPDL9yIlZEk

'~~~~Setting up (it is setting a machine on a cloud first.~~~~~~~'

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



"######################### AWS CLI SETUP ################################"
'https://docs.aws.amazon.com/cli/latest/userguide/install-linux.html'

'######### Setup up Python 3 and pip ###########3
LINK 'https://docs.aws.amazon.com/cli/latest/userguide/install-linux.html'



    1. "pip3 --version" check if python is already instance.
    2. "curl -O https://bootstrap.pypa.io/get-pip.py" ==> Curl command to download the installation script.
    3. "sudo apt-get update && sudo apt-get install python-pip" ==> creates updated python.
    3. "sudo apt install python3-pip" ==> install python pip 3 version.
    3. "python3 get-pip.py --user"  ==> Run the script with Python to download and install the latest version of pip and other required support packages.
                    ***When you include the --user switch, the script installs pip to the path ~/.local/bin. ***

                    ***Ensure the folder that contains pip is part of your PATH variable.
                    ***Find your shell's profile script in your user folder. If you're not sure which shell you have, run "echo $SHELL".
    4. "export PATH=~/.local/bin:$PATH" ==> Add an export command at the end of your profile script that's similar to the following example.

        ***This command inserts the path, ~/.local/bin in this example, at the front of the existing PATH variable.
    5. "touch .bash_profile" ==> creating the .bash_profile file there if its not there.

    6. "source ~/.bash_profile" ==> Reload the profile into your current session to put those changes into effect.
            *** if it throws the error then ls and see if there is '.bash_profile', if its not then create the new with "touch .bash_profile"  one and hit the command again. and then finally, check the version***
    7. "python3 --version" ==> finally check the version of the python"

"######################### INSTALL AWS CLI PIP ################################"

    1. "pip3 --version" ==> make sure its install or install with "sudo apt-get update && sudo apt-get install python-pip" so you can execute below command.
    2. "pip3 install awscli --upgrade --user" ==> When you use the --user switch, pip installs the AWS CLI to ~/.local/bin.

    3. "aws --version" ==> Verify that the AWS CLI installed correctly.

"#########################Prepare AWS for Kops###############################"
"#########################  Installing Kops ################################"

    1. curl -Lo kops https://github.com/kubernetes/kops/releases/download/$(curl -s https://api.github.com/repos/kubernetes/kops/releases/latest | grep tag_name | cut -d '"' -f 4)/kops-linux-amd64

    2. chmod +x ./kops

    3. sudo mv ./kops /usr/local/bin/

"#########################Installing Other Dependencies(KubeCtl) ################################"

    1. curl -Lo kubectl https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl

    2. chmod +x ./kubectl

    3. sudo mv ./kubectl /usr/local/bin/kubectl

"################################Setting up IAM###########################################"
-Login in AWS Management console -> Service==> Security,Identity, & Compliance => IAM.
-Go to Users=>AddUsers=><Username> => (Access Type = Programmatic access)=>Next=>CreateGroup => <groupname> => <PolicyName => AdministrativeAccess> => Create => Next:tag => (key 'user') => (Value 'kops') ==> Next ==> Review and <Creat User>

-Save the Key in Folder where safe and never lost.
-go in terminal and command, "aws configure"
-Paste AWS access key and password just received after creating the user and group successfully.
-Defauly region name (None): blank ie. ENTER
-Default output format (NONE): blank ie. ENTER.


By this we have done setup of the machine which can access AWS from the amazon cli.

for configuration,

"ls -lrt ~/.aws" => Credentials and the configuration is done and we have Root access.

"cat ~/.aws/credentials"=> to see access key id and secret access key.


"###########################################################################"
"#####################"'Creating S3 bucker for the KOPS_STATE_STORE'"#####################"
==>KOPS_STATE_STORE is the source of truth for all clusters managed by Kops.
==> Get fastese Region for Deploy the S3 Bucket.
==> https://www.cloudping.info/ to choose the fastest region as per their location.

''''' Setting up''''
-Login in AWS Management console -> Service==>Storage=>S3=>CreateBucker=>BuckerName <kops-storage-1996> ==> region <check fastest from /www.cloudping.info/ ==> NEXT => if you want then Tags <user> <kops> ==> NEXT==> Remove 'block all public access' ==> Review  % CREATE BUCKET.


"#################################Resolve the DNS ISSUES##########################################"
- Kops clusters must be valid DNS names.
-We need so SetUp DNS for Kops Clusters.
-SetUp DNS in AWS
-Users can test the SubDomain.
dig ns subdomain.example.com
-With Kops 1.6.2 or later, then DNS configuration is optional.
- the only requirement to trigger this is to have the cluster name end with '.k8s.local'


''''' Setting up''''
Login in AWS Management console -> Service==>Network & Content Delivery => Rout 53 ==> DNS MANAGEMENT ==> Hosted zone ==> Create Hosted zone <test.bidhutdhakal.com> ==> Create.


"###########################################################################"
"########################"'Kubernetes:Cluster SetUp on AWS'"####################"

-go in terniman and verify is 'kubectl' is installed or not.
-generate SSH keys
ssh-keygen -f .ssh/id_rsa
-verify Public Key
cat .ssh/id_rsa.pub
-rename kops-linux-amd64 to kops for user easy.
sudo mv /usr/local/bin/kops-linux-amd64 /usr/local/bin/kops


''''' Setting up''''
1. "kubectl" ==> if installed we will get all long commands.
2. Generate SSH Key
"ssh-keygen -f .ssh/id_rsa"
Hit ENTER
Hit Enter (this will generate SSH key for us)
"cat .ssh/id_rsa.pub" ==> to verify the public key.
3. Rename kops-linux-amd64 to kops for user easy (if its already kops then DONT RUN THIS COMMAND AS WE ONLY DO THIS IF WE ARE USING OLDER VERSION)
"sudo mv /usr/local/bin/kops-linux-amd64 /usr/local/bin/kops"

kops-linux-amd64 ==> this name is changed to the kops only, so verify the directory, if ls only shows the 'kops' then its alright as we are using updated version. to check.

" cd /usr/local/bin/" then "ls"


"###########################################################################"
"#################################Create Cluster##########################################"

'aws configure' ==> if directly from middle.

'kops create cluster --yes --state=s3://kops-storage-12345 --zones=us-east-2a --node-count=2 --node-size=t2.micro --master-size=t2.micro --name=test.k8s.local'

*****'ops delete cluster test.k8s.local --yes --state=s3://kops-storage-12345' if you want to delete the cluster and have to do it when running old one.

*****'kops update cluster test.k8s.local --yes --state=s3://kops-storage-12345' if you want to update the cluster.


Command if you are using your Domain Name:
kops create cluster --yes --state=<s3://<Define S3 Bucket Name>> --
zones=<One or more Zones> --node-count=<Number of Nodes> --node-
size=<Define Machine Size> --master-size=<Master Node Size>
--name=<Define DNS Name>



Like :
kops create cluster --yes --state=s3://kops-storage-b345987 --
zones=ap-south-1a,ap-southeast-1b,ap-southeast-2c --node-count=2 --
node-size=t2.micro --master-size=t2.micro --name=test.easybix.com


For Non DNS Base Cluster, work with .k8s.local
kops create cluster --yes --state=s3://kops-storage-b345987 --
zones=ap-south-1a,ap-southeast-1b,ap-southeast-2c --node-count=2 --
node-size=t2.micro --master-size=t2.micro --name=test.k8s.local


"###########################################################################"
"~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~DONE~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~"
"###########################################################################"


"################################Validate Cluster###########################################"
1. "kubectl get node" ==> shows the nods.
2. "kops validate cluster --state=s3://kops-storage-12345" ==> validate the cluster
    "kops validate cluster --state=s3://<Bucket Name"
3. "kubectl run hello-minikube --image=k8s.gcr.io/echoserver:1.10 --port=8080" ==> run the image on the s3 bucked.
4. "kubectl expose deployment hello-minikube --type=NodePort" ==> deploy the above downloaded image on the port.
5. "kubectl get services" ==> shows the port, so if we go get our ip from the node, put it in new browser like 'Public IP:PORT>' then we will be able to see the images on the node.
            *** if the page doesnot display then go to the node security setting and put the port there manually by adding.
6. "kops delete cluster --name test.k8s.local --yes --state=s3://kops-storage-12345" after finishing the task, always close the EC2 instance.

"###########################################################################"
"~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~DONE~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~"
"###########################################################################"

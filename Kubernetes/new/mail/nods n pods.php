"++cd /usr/local/bin/+++++++++++++++++++++++++Scalind Pods in Kubernetes with Replication Controller"""""""""""""

1. Create Replication Controller Manifest (YAML) file.
        Segments of manifest file.
        1. API Version
        2. MetaData
        3. Specification
        4. Templete

File sample is coded below;

"apiVersion: v1
kind: ReplicationController
metadata:
name: nginx
spec:
replicas: 3
selector:
app: nginx
template:
metadata:
name: nginx
labels:
app: nginx
spec:
containers:
- name: nginx
image: nginx
ports:
- containerPort: 80"

'~~~~~~~~~~~~~~~~~~~~Setting~~~~~~~~~~~~~~~~~`
((((kubectl get nods))))==> will show you the lists of nodes after you create the cluster.
1. create the cluster and the nods, then ls i.e kops is there.
2. "touch replication.yml" ==> if file is not created see online and get permission and get id write format then later convert it in executable fotmat.
3. "sudo touch replication.yml" ==> forceful creating as its not letting permission.
4. "sudo chmod 777 replication.yml" ==> providing executable permission to the file. ls and see, it will be in green color.
5. "vim replication.yml" ==> paste the above code (Manifest code) and save with ":wq"
6. "kubectl create -f replication.yml" ==> Execute Replication Controller Mnifest File. after this it will create the pods.
    "kubectl create -f <filename>"
7.  "kubectl get pods" ==> shows you the Created Number of pods.
8.  "kubectl describe rc/<rs_name>" ==> Describe Replication Controller.
        (((for this we need kubectl rc name, we can get that through
           "kubectl get rc")))
9.  "kubectl describe pod <pod_name>" ==> Describe Pods.
10. "kubectl delete pod <pod_name>" ==> will delete the pod but see how it auto manage to create the new pod as we describe 3 pods on our replication file. thats auto balancing.
11. "kubectl get pods" ==> shows you the Created Number of pods.
12. "kubectl scale --replicas=<no. of Replicas> rc/<RS_Name>" ==> scaling up or down by the number of replicas.
    "kubectl scale --replicas=10 rc/nginx" ==> get rc name from "kubectl get rc" which will also show the Desired, Current and ready running pods.
13. "kubectl delete rc/<RS_Name>" ==> Delete the replication controller.
    "kubectl delete rc/nginx"


"===========================DONE==============================================================DONE=========================================="

'======================================================================'

"++++++++++++++++++++++++++Replica set++++++++++++++++++++++++++++"
1. create the cluster and the nods, then ls i.e kops is there.
2. "touch replicaset.yml" ==> if file is not created see online and get permission and get id write format then later convert it in executable fotmat.
3. "sudo touch replicaset.yml" ==> forceful creating as its not letting permission.
4. "sudo chmod 777 replicaset.yml" ==> providing executable permission to the file. ls and see, it will be in green color.
5. "vim replicaset.yml" ==> paste the above code (Manifest code) and save with ":wq"
6. "kubectl create -f replicaset.yml" ==> Execute Replication Controller Mnifest File. after this it will create the pods.
"kubectl create -f <filename>"
7. "kubectl get rs" ==> Get running Replica set, remember we use to do rc on Replication Controller.
7.  "kubectl get pods" ==> shows you the Created Number of pods.
8.  "kubectl describe rs/<rs_name>" ==> Describe Replication Controller. (We did rs/<abc>) because we are dealing with replication set this time.
(((for this we need kubectl rc name, we can get that through
   "kubectl get rs")))
9.  "kubectl describe pod <pod_name>" ==> Describe Pods.
10. "kubectl delete pod <pod_name>" ==> will delete the pod but see how it auto manage to create the new pod as we describe 3 pods on our replication file. thats auto balancing.
11. "kubectl get pods" ==> shows you the Created Number of pods.
12. "kubectl scale --replicas=<no. of Replicas> rs/<RS_Name>" ==> scaling up or down by the number of replicas.
"kubectl scale --replicas=10 rc/nginx" ==> get rc name from "kubectl get rc" which will also show the Desired, Current and ready running pods.
13. "kubectl delete rs/<RS_Name>" ==> Delete the replication controller.
"kubectl delete rc/nginx"


 (((If the tier name is same on another replica set when we creat multiple replica set then, that particular set will acquire previous tire and will not creat more pods. so it must be same.)))


"===========================DONE==============================================================DONE=========================================="
'======================================================================'

"+++++++++++++++++++++++++++Deployments in Kubernetes++++++++++++++++++++++

1. create the cluster and the nods, then ls i.e kops is there.
2. "touch webservicedeployment.yml" ==> if file is not created see online and get permission and get id write format then later convert it in executable fotmat.
3. "sudo touch webservicedeployment.yml" ==> forceful creating as its not letting permission.
4. "sudo chmod 777 webservicedeployment.yml" ==> providing executable permission to the file. ls and see, it will be in green color.
5. "vim webservicedeployment.yml" ==> paste the from webservicedeployment file code (Manifest code) and save with ":wq"
6. "kubectl create -f webservicedeployment.yml" ==> Execute Replication Controller Mnifest File. after this it will create the pods.
    "kubectl create -f <filename>"
7. "kubectl get deployments" ==> Get running Replica set, remember we use to do rc on Replication Controller.
7.  "kubectl get pods" ==> shows you the Created Number of pods.
8.  "kubectl describe deployments/<Deployments_name>" ==> Describe Replication Controller. (We did rs/<abc>) because we are dealing with replication set this time.
(((for this we need kubectl rc name, we can get that through
   "kubectl get deployments")))
9.  "kubectl describe pod <pod_name>" ==> Describe Pods.
10. "kubectl delete pod <pod_name>" ==> will delete the pod but see how it auto manage to create the new pod as we describe 3 pods on our replication file. thats auto balancing.
11. "kubectl get pods" ==> shows you the Created Number of pods.
12. "kubectl scale --replicas=<no. of Replicas> rs/<RS_Name>" ==> scaling up or down by the number of replicas.
"kubectl scale --replicas=10 rc/nginx" ==> get rc name from "kubectl get rc" which will also show the Desired, Current and ready running pods.
13. "kubectl delete rs/<RS_Name>" ==> Delete the replication controller.
"kubectl delete rc/nginx"

14. "kubectl get pods --show-labels" ==> To see the labels automatically generated for each Pod.
15. "kubectl get deployments" ==> gives you the deployments name.
15. "kubectl expose deployment <deployment_name> --type=NodePort" ==> Expose Deployment. 
16. "kubectl get service" ==> Get Exposed Service.
17. see your node IP: and then IP:30332 will ur image be deployed.
18. "kubectl set image deployment/<deployment name> appname=<newimage>" ==> Upgrade Service in Deploymets. 
    "kubectl set image deployment/nginx-deployment nginx=anshuldevops/magicalnginx" ==> we are getting image from 'anshuldevops/magicalnginx' which is docker image on docker hub to deploy in our node. thats how we have a connection on docker and kubernetes.
19. "kubectl get deployments" ==> gives you the deployments name.
19. "kubectl rollout status deployment <deployment_name>" ==> Verify Roll-Out Status 
20. "kubectl rollout history deployment <deployment_name>" ==> Verify Rollout History
21. "kubectl rollout undo deployment <deployment_name>" ==> Rollback the changes 
22. "kubectl edit deployment <deployment_name>" ==> Edit Deployment, add Revision History ' here if you open file and increase the replica, the pods will be increased according to the replica number that you inputed there. which can be viewed by
22. "kubectl get pods" => edited replica pods can be viewed from here.

"===========================DONE==============================================================DONE=========================================="

'======================================================================'


"++++++++++++++++++++++++++Labels in Kubernetes++++++++++++++++++++++++++++"
'as on the "lable-pod-yml" code filed descrives the "disk type" as "ssd", the pod is not running after we create the process like above, so
1. "vim podlables.yml" ==> create and paste code from pod-lables yml
2. "chmod 777 podlables.yml"
3. "kubectl create -f podlables.yml"
4. "kubectl get pods" ==> the pod is pending but not running because the disktype ssd is not descrived in our aws cluster. so we follow below command.
5. "kubectl get nodes" ==> will gives you the list of nodes.
6. "kubectl label nodes ip-172-20-51-118.us-east-2.compute.internal disktype=ssd" ==> will add ssd as the port type so it can run in our node as it was not described in our kubernetes before
6. "kubectl label nodes <node_name> <descrive_lable>" ==> making node compactable with lable image  which is described in our code.
7. "kubectl get nodes --show-labels" ==> not we can see 'ssh' as disktype in the lables.
"kubectl get pods" now finally the pods are running.


"===========================DONE==============================================================DONE=========================================="

'======================================================================'

"++++++++++++++++++++++++++(Liveness) Health Check of Applications  in Kubernetes++++++++++++++++++++++++++++"

'** User can execute 2 types of LiveNess
    1. Running Command in Container Periodically. '(type one)
'~~~~~~~~~~~~~~~~~~~~Setting~~~~~~~~~~~~~~~~~`

1. "vim pod-liveness-cmd.yml" ==> paste code named pod-liveness-cmd
2. "chmod 777 pod-liveness-cmd.yml" ==> making it executable format.
3. "kubectl create -f pod-liveness-cmd.yml" ==> Execute Replication Controller Mnifest File. after this it will create the pods.
4.  "kubectl get pods" ==> shows you running and how many restart and health checks for the pods.
5. "kubectl describe pod liveness-exec" ==> detail of the pod which we just created.


    2. Periodic Check on HTTP Request (URL) '(type two)

1. "vim pod-liveness-http.yml" ==> paste code named pod-liveness-cmd
2. "chmod 777 pod-liveness-http.yml" ==> making it executable format.
3. "kubectl create -f pod-liveness-cmd.yml" ==> Execute Replication Controller Mnifest File. after this it will create the pods.
4. "kubectl get pods" ==> shows you running and how many restart and health checks for the pods.
5. "kubectl describe pod liveness-http" ==> detail of the pod which we just created.
6.  "kubectl delete pod <pod_name>" ==> will delete the pod.


"===========================DONE==============================================================DONE=========================================="

'======================================================================'

"++++++++++++++++++++++++++Readiness in Kubernetes+++++++++++++++++++++++++++"
'** Readiness is used to detect if container is ready to accept traffic.
'** Readiness will make sure that at StartUp, the Pod will only receive traffic when Test succeed.
'** Updating deployments without readiness probes can result in downtown as old pods are replaced by new pods. if the new pods are misconfigured or somehow broken, that downtime extends until you detect the problem and rollback.

'*** Basicall readiness is used because even though your container is created, until your application is not ready, it will not ready pod.
'*** When we use only Liveness, Pod was created when the container was created; but now, when we use readiness, the pods will only be ready when the application will be ready although the container is already ready. in real life senario pod may take an hr and more to get ready, so this is what we need readyness of pod before liveness.


'~~~~~~~~~~~~~~~~~~~~Setting~~~~~~~~~~~~~~~~~`

1. "vim pod-readiness.yml" ==> paste code named pod-liveness-cmd
2. "chmod 777 pod-readiness.yml" ==> making it executable format.
3. "kubectl create -f pod-readiness.yml" ==> Execute Replication Controller Mnifest File. after this it will create the pods.
4. "kubectl get pods" ==> shows you running and how many restart and health checks for the pods.
5. "kubectl describe pod liveness-http" ==> detail of the pod which we just created.
6.  "kubectl delete pod <pod_name>" ==> will delete the pod.


"===========================DONE==============================================================DONE=========================================="

'======================================================================'

"++++++++++++++++++++++++++Pod Lifecycle+++++++++++++++++++++++++++"

1. "vi pod-lifecycle-hooks.yml" ==> paste code named pod-lifecycle-hooks.yml.
2. "chmod 777 pod-lifecycle-hooks.yml" ==> making it executable format.
3. "kubectl create -f pod-lifecycle-hooks.yml" ==> Creating the pods.
4. ""kubectl get pods" ==> shows you running and how many restart and health checks for the pods.
5. "kubectl describe pod lifecycle-demo"=> detail of the pod which we just created.
6. "kubectl exec -it lifecycle-demo -- /bin/bash" ==> getting inside the container we just created, ls and see all the comp files.
7. "cat /usr/share/message" ==> inside the Container going inside the message file to see the application or the word we just deployed.
8. "kubectl delete pod <pod_name>" ==> will delete the pod.


"===========================DONE==============================================================DONE=========================================="

'======================================================================'

"++++++++++++++++++++Secrets in Kubernetes+++++++++++++++++++++++++++++++"
'**Secrets used to manage sensitive Data in Kubernetes. Like Password, credentials, keys, authentication tokens etc.
'**User can create secrets, and the system also creates some secrets.
'**A secret can be used with a pod in two ways:
    1. As files in a volume mmounted on ont or more of its containers.
    2. Used by kubelet when pulling images for the pod.

while creating pass special characters such as $, \*, and ! require escaping. for example if yout actual password is S!B\*d$zDsb you should execute the command this way:

    "kubectl create secret generic dev-db-secret --from-literal=username=devuser --from-literal=password=S\!B\\*d\$zDsb"

"kubectl create secret generic db-user-pass --from-<file>=./username=devuser --from-literal=password=S\!B\\*d\$zDsb"



'~~~~~~~~~~~~~~~~~~~~Setting~~~~~~~~~~~~~~~~~`

' Creating Secrets via file, here i create a <filename.txt> for userid and put my user id inside the file and create the another <filename.txt> for password and enter the password inside the file, then.

1. Creating from file.

    "kubectl create secret generic db-cred --from-file=./username.txt --from-file=./password.txt" ==> created userid and password from file, 'username.txt' contain userid and 'password.txt'contain password where 'db-cred' is the name of ur credentials.

2. creating from text on command.

"kubectl create secret generic dn-dred-special --from-literal=username=bidhutdhakal --from-literal=password=S\!B\\*d\$zDsB" ==> here username and password are defined from the command line.

3. "kubectl get secrets" ==> the command will let you see the created secret which we just did from above.

4. Create Secrets via Menifest.

    1.  "echo -n 'bidhutdhakal' | base64" ==> will generate user id code for 'bidhut dhakal'

    2. "echo -n 'Testkubernetes12345' | base64" ==> will generate pass code for password 'Testkubernetes12345'
    3. "vim secrets-maniifest.yml" ==> created the menifest file which will have credentials that we just generated from above commands.
            ***"vim <filename>.yml"
    4. "chmod 777 secrets-maniifest.yml" ==> make this file executable. 'ls' and confirm it.
    5. "kubectl get secrets" ==> will show the credentials that we just created.

5. Describe your secrets ==> as if you may forget id and pass so if you describe it then that will be easy for shortcut.

6. Decode the secret. ==> if you forget your id and pass then how to decode it.
    1. "kubectl get secrets" ==> the command will let you see the created secret which we just did from above.
    2. "kubectl get secret dn-dred-special  -o yaml" ==> the command will show the detail user id and password.
            ***'kubectl get secret <secrets_name>  -o yaml'
    3. "echo 'UyFCXCpkJHpEc0I=' | base64 --decode" ==> past the password which we got from above 'UyFCXCpkJHpEc0I=' which is password on above syantax, command then it will decode and show us the realpassword on next line

            '__==--Same in Jason Format Here__++--"

4. "kubectl get secret <secret_name>  -o json" ==> will give you details on jason format; its same like above but in jason format.
        ***'kubectl get secret db-cred  -o json'
5. "echo '<PASSWORD GOT FROM DETAIL>' | base64 --decode" ==> we will get a password which we mentiioned inside the file.
        ***'echo 'VGVzdEt1YmVybmV0ZXMxMjM0NQo=' | base64 --decode" ==> PASTING THE PASSWOD WHICH WE GET FROM THE DETAIL FILE.


"===========================DONE==============================================================DONE=========================================="

'======================================================================'

"++++++++++++++++++++++eploying Secrets in Pod+++++++++++++++++++++++++++++"

1. "kubectl get secrets" ==> the command will let you see the created secret which we just did from above.
2. "vim pod-volume-secret.yml" ==> create and paste the code here, remember on the code document on the second last line you have described secrets exactly what you gain from kubectl get secrets.
3. " chmod 777 pod-volume-secret.yml" ==> making file ececutable.
4. "kubectl create -f  pod-volume-secret.yml" creating the pod with the menifest file '<pod-volume-secret.yml>.
5. "kubectl get pods"==> shows the number of pods running.
6. "kubectl describe pod mypod-voulmesecret" ==> will descrive the pod, here you can see 'Mounts' where we have saved our username and password in the menifest, so if we open the pod and get inside it and on to the location which is described on the Mounts location, we can view userid and passes from the pod.
7. "kubectl exec -it mypod-voulmesecret -- /bin/bash" ==> getting inside the pod and inside /bin.bash file coz we want to go to our file.
8. "cd /etc/foo/" ==> getting inside the file to see our id and pass.
9. "ls" ==> will now show the user id and pass file we shaved there from the menifest.
10. "cat username" ==> this wil show the username from the file username.
11. "cat password" ==> this will show the password from the file password.

"===========================DONE==============================================================DONE=========================================="

'======================================================================'


"++++++++++++++++++++++Service Discovering Using DNS++++++++++++++++++++++++++++"

1. "vi mysql-database.yml" ==> create 'mysql-database.yml' and enter the value from the file.
2. "chmod 777 mysql-database.yml" ==> converting into an executable form.
3. "kubectl create -f mysql-database.yml" ==> creating the pods.
4. "kubectl get pods" ==> shows us the created pods.
5. "kubectl logs database"==> shows us the logs.
6. "kubectl logs --follow database" ==> shows the details and shows that our database is ready to connect.
7. "kubectl get pods" ==> shows us the created pods.
8. "kubectl exec database -it -- mysql -u root -p" ==> getting inside mysql after we set up the menifest. 'enter password as described in the menifest'
9. "show databases;" shows databases.
10. "use mysql;" ==> use mysql as a current databases.
11. "show tables;" ==> shows the table.
12. 

abc

Kishor Rimal.

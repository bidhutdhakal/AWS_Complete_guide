-Go in git hub and create a repository ==> make sure its public or 7$ is charged.

-make folder in desktop and git it with "git inti" commang then linking to the repository by command,

    :git remote add origin "https://github.com/bidhutdhakal/git-github.git" ==> where the http is link of your repository. if you dont get any error you succeed.

    :git pull origin <branch name from github>==> it will download files from that                                                  branch  to your locall machine.

CODED AND CONCEPTS USED:

1. make changes to files and its on red which is your working directory.
2. "git add ." ==>takes the so file to the staging directory. ie. in GREEN COLOR
3. "git commit -m "this is my first commit"" ==> takes it to Local Reprosatery
4. "git status" / "git diff" ==> shows clean because working directory is empty and every thing is                      in Local directory
5. "git remote add origin "https://github.com/bidhutdhakal/git-github.git"" | ==> where the http is link of your working repository. if you dont get any error you succeed.
5. "git pull origin <branch name from github>" ==> it will download files from that                                                  branch  to your locall machine.
5. "git push origin <branch name>" ==> push everything to the Cloud Directory after                                     authentication.

"//GIT BRANCH//" ~ first setup the net origin from above, i mean the link.

"git branch <branch name>" ==> create new branch on cloud
 "git checkout <branch name>" ==> changes branch to the <branch name addressed verify                     from git status.
"git branch" ==> gives you the list of branch that are in cloud
"git branch -d <branch name>" ==> delete the branch name but you have to be on other branch.
"git merge <branch name>" ==> merging any branch to the desired branch, ie. master or                 any branch, but remember? switch to the branch which you                 want to send info with before executing merge.
"git merge <branchname> -m "add note"" ==> merge both the branches



NOTE: dont forget to push to the cloud to appear changes.
NOTE: to send to the master, first push from the working directory to the master, then pull from master to the desired directory or vice versa.


"// Revert a commit in GIT//"

"git reset HEAD <filename>" ==> revert from staging to working directory
"git reset head~" ==> getting back after sending to the local directory.


"//Fork GitHub Existing Project//"
go to the git page page then click on fork, the status will then change into your account name, then click the link or just download, but when you chose to work through the terminal then the code would be;

"git clone <web_address_that_you_just_copied" ==> if you do this to any directory, the link will automatically be fetched on your local directory.

"//renaming file name//"

    "git mv <oldfilename with extention> <new file name>" ==> rename file name in git.

"//Changing Directory//"

    "git mv <oldfilename with extention> <new directory>" ==> change file location.

"//Find Commit//"

 1. "git log" ==> gives us list of entire changes.
 2. "git log --oneline --graph --decorate" ==> shows more in detail and in short.
 3. "git log --since="2 days ago"" ==> gives us update from specific time.
 4. "git log -- filename" ==> displays changes on particular file.
 5. "git show <commit id number>" ==> showd exactly particular done by user.
 6. "git log --oneline --graph --decorate --all " ==> shows changes on all branch


"//GIT ALIAS==> setting short command for long command so it can be used easily"

    "git config --global alias.<nameYouWantToGive> <complete command except git@ first>"



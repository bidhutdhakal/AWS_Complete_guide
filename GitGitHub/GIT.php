GIT ==> VERSION CONTROL MANAGEMENT TOOLS
GIT HUB ==> Centralize Depository


CODED AND CONCEPTS USED:

 1. make changes to files and its on red which is your working directory.
 2. "git add ." ==>takes the so file to the staging directory. ie. in GREEN COLOR
 3. "git commit -m "this is my first commit"" ==> takes it to Local Reprosatery
 4. "git status" / "git diff" ==> shows clean because working directory is empty and every thing is                      in Local directory



"//Creating Git Respository//"

                    [So basically creating Git Respository is that making a foldet that is git on fir format, after running the command, if we see the files in directory then we can find the directory is a gir Respositery]

go to the particular directory where you want to make get Respository then enter the command,
    "git init"

"//GIT  Commit//"

                    [So basically GIT Commit is that making giles successfully to Git version, if its not then we have to give some codes from below to make sure its in green and then make it git Commit]

    git status" ==> shows on red and tells its not committed if the file is not committed to git.
    git add <filename>" ==> shows on green and confirm fir commit.
    git commit -m "My first Fir Commit"
    git status" ==> Shows Complete GIT Commit.
                {So if i change any text in my git file and save it and check 'get status' then it will Recognize as "modified", in order to make it update, i need to het the command which is below to make it green and updated.}
    git add ." ==> adds all the red files to green.

"// Add Files and Commit Log in GIT//"

    git commit -m "New files from Bidhut" | ==> commit all files which are on directory to git  commit or in green.

        [Basically when you run the above code then it is pushed to the local directory from working directory]


"//Text Editor for GIT - MAC//"


                        [LEARN YOUR SELF> ITS NOT TEACHES IN VIDEO; it explain how youcan directly edit a text and make it git version automatically]

    
"//Verify Changes on GIT//"
                        [basically it helps us to see what is changes on the git files documents]
    git diff"" ==> Helps us to see updated changes on particular files
    git diff --staged"" ==> (Shows the entired differences working and local)

"// Delete Files in GIT //"
diredt delete it from the directory or with rm command, then check git status, it will be in STATUS area, which is green, then;

    git add . "" | It will add to the  staging area in green. then,

    git commit -m "Delete using OS" "" | it will update the git status to complete.

    git commit -am "youe message" ==> this command add to the staging area and commit it at the same time.

                                OR

    git rm <filename [then directly ] "git commit -m "Delete using OS""" should work" and make your local director clean.

"//ignore some files with git loke .DS_Store always//"

    "vim .gitignore" add file name,  and save.


"//Comparing working directory to resporatery//"==>shows diff on files.

    "git diff HEAD"

"//ComparingStage Area to git resporatery//" ==>shows diff on files.

    "git diff --staged HEAD"


"//Compare Commits on gits//"

    "git log -- oneline" ==> shows all
    "git diff <commit id 1> <commit id 2?" ==> Shows diff between 2 commute
    "git diff HEAD HEAD^" ==> last commute - last one.

"//GIT REBASE//" ==> merge by commiting all changes on top of designated branch.

        "git rebase <BranchName>" ==> put all commit changes on top of other branch that we just entered.


"//git rebase conflict//" ==> when ever there is issue in the git rebase always abort. how?

    "git rebase --abort" ==? the command will abort the rebase.


"//GIT STASH//" ==> usen when i need to stop current task and start new task immediately.

"git stash" ==> when need to work on urgent other.
"git stash apply" ==> when applying changes.
"git stash list"==> to see list of git stash
"git stash drop"==> after applying we need to drop it or it will confuse us.


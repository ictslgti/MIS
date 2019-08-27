# mis

###Create a working copy of a local repository:
- **C:\wamp64\www>** git clone https://github.com/ictslgti/mis.git
- **C:\wamp64\www>** cd mis


###Configure the author name and email address to be used with your commits.
- **C:\wamp64\www\mis>** git config --global user.name "achchuthany"
- **C:\wamp64\www\mis>** git config --global user.email achchuthan@slgti.com

###Fetch and merge changes on the remote server to your working directory:
- **C:\wamp64\www\mis>** git pull origin master

###Add one or more files to staging (index):
- **C:\wamp64\www\mis>** git add index.php
###Commit changes to head (but not yet to the remote repository):
- **C:\wamp64\www\mis>** git commit -m "index title changes“
###Send changes to the master branch of your remote repository:
- **C:\wamp64\www\mis>** git push -u origin master



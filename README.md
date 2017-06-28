The project is used for deploying your own cloud platform which is able to provide multiple services like:
 -IAAS
 -PAAS
 -SAAS
 -STAAS
 -CAAS(Container as a service)
 
 The project uses the following technologies. So you need to configure the following ones:
 -RHEL7
 -Docker
 -NFS
 -KVM
 -Virtual-manager (virt-install)
 -Database (Mysql/MariaDB)
 -Apache
 -Sudoers
 -PHP
 -noVNC
 -WebSockify
 -GlusterFs
 -scsi-target-utils
 
 Steps for using the project:
 1. Clone the project in /var/www/storastack
 2. Install PHP and give execution permission to all .php files in /var/www/storastack.
 3. Install Mysql with credentials as (Username:root,Password:redhat)
 4. Create a database named storastack and import the storastack.sql file into it. 
 5. Start the apache server and make the appropriate virtual hosting for the document root.
 6. Go to http://127.0.0.1 and login with the credentials as (Username:testuser123, Password:12345)
 7. Add Apache in sudoers to run commands without a password and comment the requiretty in /etc/sudoers .
 7. For Object Storage, create a volume group of name "vg" and a thin pool named "vg/thin". For the storage, you can use GlusterFS 
     on two servers.
 8. For Block Storage, configure the /etc/tgt/conf.d/ directory and set the write permissions for apache.
 9. For Infrastructure as a service, install a Fedora virtual machine with the path /var/lib/libvirt/images/Fedora.qcow2. This
     file will be used to make a link to other virtual machines while creating vms.
 10. Install virt-install and all the dependencies using yum. Make sure your system has the virtualization enabled in bios. 
 11. Install qrencode for creating qr code for every os. 
 12. WebSocify is already installed and configured to run the operating system in a browser. Every vm will run on a websockify 
    port so that it can be accessed using a web browser, even from a mobile in a network. 
 13. For container service, install docker on your machine and pull the shkatara/gluster image. These images already has 
    shellinabox configured and hence can be accessed using the browser. These machines also have apache server installed on 
     centos 6.
 14.For Software as a service, install firefox, gedit on your system and enable X-Windows forwarding on your machine in 
    /etc/ssh/sshd_config.
 15. For Platform as a service, install python and go language in your system and storastack will compile your code taking it from
    the browser and writing it into a file and then compiling it and giving you the output back. 
 16. The Hadoop module is under construction as of now. I will commit the changes once it is working to a satisfactory level.

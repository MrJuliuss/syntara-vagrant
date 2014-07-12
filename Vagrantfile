# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |vconfig|
    vconfig.vm.box = "trusty64"
    vconfig.vm.box_url = "http://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"

    vconfig.vm.define :site do |config|
        config.vm.network :private_network, ip: "192.168.100.100"
        config.vm.network "forwarded_port", guest: 80, host: 8888
    end

    # Configure shared folders
    vconfig.vm.synced_folder ".",  "/vagrant", id: "vagrant-root", mount_options: ["dmode=777,fmode=777"]
    vconfig.vm.synced_folder "..", "/var/www", id: "application"

    # Provision the box
    vconfig.vm.provision :ansible do |ansible|
        ansible.playbook = "ansible/syntara.yml"
    end
end

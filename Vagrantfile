# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |vconfig|
    vconfig.vm.box = "precise64"
    vconfig.vm.box_url = "http://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"

    vconfig.vm.define :site do |config|
        config.vm.network :private_network, ip: "10.10.10.10"
        config.vm.network "forwarded_port", guest: 80, host: 8888
    end
end

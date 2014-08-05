syntara-vagrant
===============

Run a demo or develop version on Syntara inside a Ubuntu Vagrant VM

# Requirements :

* Vagrant 1.6+ (not tested with lower version)
* Ansible 1.6+ (not tested with lower version)

## Demo version

### Clone repository
```git clone git@github.com:MrJuliuss/syntara-vagrant.git```

```cd syntara-vagrant```

### Choose the demo version

In ```group_var/all``` change ```type``` to ```demo```

### Start vagrant
```vagrant up```

### Hosts

Add this line to your host file (/etc/hosts on a Linux distribution)

```syntara.dev   192.168.100.100```

## Dev version

### Work In Progress

SSHD + PHP-FPM + NGINX under Supervisor in Docker container on localhost: Example task 
-----------------------------------------------------------------------------

- Requires Ansible 2.2+
- Expects Debian/Ubuntu as host
- User which run play-book should be in sudo

Just for example, not for production use 

### Usage

##### run:
    ansible-playbook  provision.yml --ask-become-pass 

##### get container logs:
    sudo docker logs -f web

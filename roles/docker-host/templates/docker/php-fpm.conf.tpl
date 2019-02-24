[www]

pm = dynamic
pm.max_children = 5
pm.start_servers = 2
pm.min_spare_servers = 1
pm.max_spare_servers = 3
clear_env = no

user = $WWW_USER
group = $WWW_GROUP
listen = $PHP_SOCK_FILE
listen.owner = $WWW_USER
listen.group = $WWW_GROUP
listen.mode = $PHP_MODE
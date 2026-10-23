# php-hosting-lab

#Architecture
                   Windows
                      |
              +-------+-------+
              |               |
          app.local        time.local
              |               |
              +-------+-------+
                      |
                 Ubuntu VM
                      |
                  Port 80
                      |
                    NGINX
                   /     \
                  /       \
        app.local          time.local
            |                  |
        :8080                :8081
            |                  |
       PHP App 1           PHP App 2
            |
         MariaDB

Demonstrating Docker Swarm 1.12 new features
############################################

apache-php: base apache (debian jessie based) + mod php5 image
frontend : a simple PHP script displaying the container id and calling a backend
backend : a simple PHP script echoing the container id

RUN
###

You need to use docker swarm (included in docker engine 1.12) cluster.

Then :
$ docker service create ...
$ docker service create ...

Access the service by pointing your browser to the port 8080 of one of your swarm node
(you can change the IP to test it on differents nodes).

The green Id is the id of the frontend container, this illustrates the load-balancing feature
from the nodes to the containers.

The red Id is the id of the backend container, this illustrates the DNS based service discovery
inside the cluster.

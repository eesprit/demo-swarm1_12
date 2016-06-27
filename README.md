Demonstrating Docker Swarm 1.12 new features
============================================

apache-php: base apache (debian jessie based) + mod php5 image


frontend : a simple PHP script displaying the container id and calling a backend


backend : a simple PHP script echoing the container id

RUN
---

You need to use docker swarm (included in docker engine 1.12) cluster.


Then :
```
$ docker network create -d overlay demo_net
$ docker service create --name frontend --constraint "affinity:container!=frontend.*" --replicas 3 -p 8080:80 --network demo_net eesprit/frontend
$ docker service create --name backend --constraint "affinity:container!=backend.*" --replicas 3 --network demo_net eesprit/backend
```

Access the service by pointing your browser to the port 8080 of one of your swarm node
(you can change the IP to test it on differents nodes).


The green Id is the id of the frontend container, this illustrates the load-balancing feature
from the nodes to the containers.


The red Id is the id of the backend container, this illustrates the DNS based service discovery
inside the cluster.


To illustrate the rolling update feature :

Then :
```
$ docker service update --env COLOR=purple --update-delay 30s --update-parallelism 1 frontend 
$ docker service update --env COLOR=orange --update-delay 30s --update-parallelism 1 backend 
```

Then go back to your browser, and see the updating engine in action !

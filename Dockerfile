NAME alexcollin/syns
FROM ubuntu:14.04

RUN apt-get update
RUN apt-get install -y nginx
VOLUME "/var/www/syns.dev" "."
VOLUME "/var/www/admin.syns.dev"
VOLUME "/var/www/client.syns.dev"
VOLUME "/var/www/api.syns.dev"

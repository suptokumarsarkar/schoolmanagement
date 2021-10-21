FROM node:14.8.0-buster-slim

ARG USER_ID

RUN yarn add \
    @symfony/webpack-encore \
    sass-loader \
    node-sass \
    --dev

RUN apt-get update && apt-get install -y \
curl

COPY scripts/initializeYarn.sh /tmp/initializeYarn.sh
RUN ["chmod", "+x", "/tmp/initializeYarn.sh"]

WORKDIR /var/www/html
RUN usermod -u $USER_ID node
USER node

CMD ["/node_modules/.bin/encore", "dev", "--watch"]